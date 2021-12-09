<?php
require 'dbconnect.php';
date_default_timezone_set("Asia/Colombo");

if (isset($_POST['add_basic_info'])) {
    //name email nic address mobile mbbsid Password
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $nic = $_POST['nic'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];
    $address = $_POST['address'];

    $db = new DbConnect;
    $sql = "INSERT INTO `adults_info`(`first_name`, `last_name`, `age`, `nic`, `guardian_name`, `guardian_contact`, `address`)  VALUES ('$firstname','$lastname','$age','$nic','$guardian_name','$guardian_contact','$address');";

    if (!$conn = $db->connect()) {
        echo '<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../admin_add_new.html"
						</script>';
        exit();
    } else {
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo '<script language="javascript">
                        localStorage.setItem("AdultNIC","' . $nic . '");
                        window.alert("Please add health records")
                        window.location.href = "../admin_add_health.html"
						</script>';
            exit();
        }
    }
}

if (isset($_POST['add_health_records'])) {
    //name email nic address mobile mbbsid Password
    $sugar_level = $_POST['sugar_level'];
    $pressure_level = $_POST['pressure_level'];
    $body_temp = $_POST['body_temp'];
    $BMI = $_POST['BMI'];
    $current_date = date('Y-m-d');
    $adult_nic = $_POST['Adultnic'];
    $rec_status = "0";

    if (140 < number_format($sugar_level) || 100 < number_format($pressure_level) || 38 <= number_format($body_temp)) {
        $rec_status = "1";
    }

    $db = new DbConnect;
    $sql = "INSERT INTO `health_records`(`sugar_level`, `pressure_level`, `body_temp`,`BMI`,`input_date`,`record_status`,`adult_id` )  VALUES ('$sugar_level','$pressure_level','$body_temp','$BMI','$current_date','$rec_status','$adult_nic');";

    if (!$conn = $db->connect()) {
        echo '<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../admin_add_new.html"
						</script>';
        exit();
    } else {
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            echo '<script language="javascript">
                        window.alert("Successfully Added New Member")
                        window.location.href = "../admin_health_records.html"
						</script>';
            exit();
        }
    }
}

/*if(isset($_POST['Update_health_records'])){
    //name email nic address mobile mbbsid Password
    $upsugar_level = $_POST['upsugar_level'];
    $uppressure_level  = $_POST['uppressure_level'];
    $upbody_temp       = $_POST['upbody_temp'];
    $upBMI = $_POST['upBMI'];
    $current_date = date('Y-m-d');
    
    $db = new DbConnect;
    $sql = "INSERT INTO `health_records`(`sugar_level`, `pressure_level`, `body_temp`,`BMI`,`input_date` )  VALUES ('$upsugar_level','$uppressure_level','$upbody_temp','$upBMI','$current_date');";

    if(!$conn = $db->connect()){
        echo'<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../admin_add_new.html"
						</script>';
        exit();
    }
    else {
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            echo '<script language="javascript">
                        window.alert("Successfully Updated New Data")
                        window.location.href = "../admin_health_records.html"
						</script>';
						exit();
        }
    }
}*/

if (isset($_POST['addRecordElderNIC'])) {
    //name email nic address mobile mbbsid Password
    $elder_nic = $_POST['addRecordElderNIC'];
    $upsugar_level = $_POST['sugarL'];
    $uppressure_level = $_POST['pressureL'];
    $upbody_temp = $_POST['bodyT'];
    $upBMI = $_POST['BMI'];
    $current_date = date('Y-m-d');
    $rec_status = "0";

    if (140 < number_format($upsugar_level) || 100 < number_format($uppressure_level) || 38 <= number_format($upbody_temp)) {
        $rec_status = "1";
    }

    $sugarFeedback = "0";
    $pressureFeedback = "0";
    $bodyTempFeedback = "0";
    if (140 < number_format($upsugar_level)) {
        $sugarFeedback = "1"; //Diabetes
    }
    if (90 > number_format($uppressure_level)) {
        $pressureFeedback = "1";  //low pressure
    } else if (140 < number_format($uppressure_level)) {
        $pressureFeedback = "2";   //high pressure
    }
    if (38 < number_format($upbody_temp)) {
        $bodyTempFeedback = "1";
    }

    $db = new DbConnect;
    $sql = "INSERT INTO `health_records`(`sugar_level`, `pressure_level`, `body_temp`,`BMI`,`input_date`,`record_status`,`adult_id`)  VALUES ('$upsugar_level','$uppressure_level','$upbody_temp','$upBMI','$current_date','$rec_status','$elder_nic');";

    if (!$conn = $db->connect()) {
        echo '<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../admin_add_new.html"
						</script>';
        exit();
    } else {
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {

            /*echo '<script language="javascript">
                        window.alert("Successfully Updated New Data")
                        window.location.href = "www.google.lk"
						</script>';*/
        }
    }
    $feedback = array($sugarFeedback, $pressureFeedback, $bodyTempFeedback);
    echo json_encode($feedback);
}
?>