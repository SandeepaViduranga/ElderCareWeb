<?php
require 'dbconnect.php';

function creat_user($nic,$Password){
    $db = new DbConnect;
    $hashed = password_hash($Password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO  `login`( `Username`, `Password`, `Type`) VALUES ('$nic','$hashed',1)";

    if(!$conn = $db->connect()){
        echo "SQL Error";
        exit();
    }
    else {
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        return $last_id;
    }
}

if(isset($_POST['type'])){

    if($_POST['type']=="login"){
        $username =  $_POST['Username'];
        $password =  $_POST['Password'];
        if(empty($username) || empty($password)){
            echo "Empty fields";
        }
        else {
            $sql = "SELECT * FROM `login` WHERE Username='$username' and type=1";
            $db = new DbConnect;
            if(!$conn = $db->connect())
            {
                echo 'SQL Error';
                exit();
            }
            else {
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $UID ="";
                $myObj2 = new \stdClass();
                if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
                {
                    foreach ($result as $rows) {
                        $UID =$rows['LID'];
                        $tempPass =$rows['Password'];
                    }

                    if(password_verify($password, $tempPass)){
                        $myObj2->Status = "1";
                        $myObj2->LID = $UID;
                    }else{
                        $myObj2->Status = "0";
                    }
                }
                else {
                    $myObj2->Status = "0";
                    //echo "Invalid Credentials 0";
                }
                $myJSON2 = json_encode($myObj2);
                echo "$myJSON2";
            }

        }
    }

    if($_POST['type']=="addDoctor"){
        //name email nic age phone gender Password
        $Name = $_POST['Name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $nic  = $_POST['nic'];
        $mbbsid  = $_POST['mbbsid'];
        $address  = $_POST['address'];
        $Password = $_POST['password_user'];


        $LID = creat_user($email,$Password);
        $db = new DbConnect;
        $sql = "INSERT INTO `doctor`(`Name`, `email`, `mobile`, `nic`, `mbbsid`, `address`, `LID`, `doc_status`)  VALUES ('$Name','$email','$mobile','$nic','$mbbsid','$address','$LID',0);";

        if(!$conn = $db->connect()){
            echo "SQL Error";
            exit();
        } else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $myObj3 = new \stdClass();
            $myObj3->Status = "1";
            $myObj3->LID = $LID;
            $myJSON3 = json_encode($myObj3);
            echo "$myJSON3";
        }
    }

    if($_POST['type']=="load_records"){

        $sql = "SELECT `health_records`.id,`first_name`, `last_name`, `age`, `nic`, `sugar_level`, `pressure_level`, `body_temp`, `BMI`, `input_date`, `record_status` FROM `adults_info`,`health_records` WHERE `adults_info`.`nic`=`health_records`.`adult_id`;";
        $db = new DbConnect;
        if(!$conn = $db->connect())
        {
            echo 'SQL Error';
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $trs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($trs);
        }
    }

    if($_POST['type']=="load_current_records"){

        $sql = "SELECT `health_records`.id,`first_name`, `last_name`, `age`, `nic`, `sugar_level`, `pressure_level`, `body_temp`, `BMI`, `input_date`, `record_status` FROM `adults_info`,`health_records` WHERE `adults_info`.`nic`=`health_records`.`adult_id` AND `input_date` = CURRENT_DATE();";
        $db = new DbConnect;
        if(!$conn = $db->connect())
        {
            echo 'SQL Error';
            exit();
        }
        else {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $trs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($trs);
        }
    }


}

?>