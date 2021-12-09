<?php
require 'dbconnect.php';

function creat_user($Username,$Password,$type){
    $db = new DbConnect;
    $hashed = password_hash($Password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO `login`(`Username`, `Password`, `Type`) VALUES ('$Username','$hashed','$type')";

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

if(isset($_POST['addDoctor'])){
    //name email nic address mobile mbbsid Password
    $name = $_POST['name'];
    $email  = $_POST['email'];
    $mobile  = $_POST['mobile'];
    $nic = $_POST['nic'];
    $mbbsid = $_POST['mbbsid'];
    $address  = $_POST['address'];
    $Password = $_POST['Password'];
    $docStatus = "0";


    $LID = creat_user($email,$Password,1);
    $db = new DbConnect;
    $sql = "INSERT INTO `doctor`(`Name`, `email`, `mobile`, `nic`, `mbbsid`, `address`, `LID`, `doc_status`)  VALUES ('$name','$email','$mobile','$nic','$mbbsid','$address','$LID','$docStatus');";

    if(!$conn = $db->connect()){
        echo'<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../doctor_register.html"
						</script>';
        exit();
    }
    else {
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo '<script language="javascript">
                                localStorage.setItem("DID","' . $nic . '");
						        localStorage.setItem("Name","' . $name . '");
								window.location.href = "../doctor_health_records.html"
								</script>';
								exit();
        }
    }
}

if(isset($_POST['addAdmin'])){
    //name email nic age phone gender Password
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $age  = $_POST['age'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $Password = $_POST['Password'];


    $LID = creat_user($email,$Password,0);
    $db = new DbConnect;
    $sql = "INSERT INTO `member`(`name`, `email`, `nic`, `age`, `phone`, `gender`, `LID`)  VALUES ('$name','$email','$nic','$age','$phone','$gender','$LID');";

    if(!$conn = $db->connect()){
        echo "SQL Error";
        exit();
    }
    else {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $myObj3 = new \stdClass();
        $myObj3->Status = "1";
        $myObj3->LID = $LID;
        $myJSON3 = json_encode($myObj3);
        echo "$myJSON3";
    }
}

?>