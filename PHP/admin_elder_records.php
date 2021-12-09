<?php

    require 'dbconnect.php';
    if(isset($_POST['Elders_Health_records'])) {
        $Elder_ID = $_POST['Elders_Health_records'];
        $db = new DbConnect;
        $conn = $db->connect();
        $getdate = date("Y-m-d", strtotime("yesterday"));

        $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND health_records.input_date = \"". $getdate."\";");
        $stmt1->execute();
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);

    }

    if(isset($_POST['Update_Rec'])) {
        $AdultID = $_POST['Update_Rec'];
        $db = new DbConnect;
        $conn = $db->connect();

        $stmt1 = $conn->prepare("UPDATE `health_records` SET record_status ='1' WHERE nic = " . $AdultID. ";");
        $stmt1->execute();
    }

    if(isset($_POST['ElderID'])) {
        $AdultNIC = $_POST['ElderID'];
        $db = new DbConnect;
        $conn = $db->connect();

        $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND adults_info.nic=\"". $AdultNIC."\";");
        $stmt1->execute();
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }

 ?>