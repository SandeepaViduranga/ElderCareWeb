<?php

require 'dbconnect.php';
date_default_timezone_set("Asia/Colombo");

if (isset($_POST['loadElder'])) {
    $Elder_ID = $_POST['loadElder'];
    $db = new DbConnect;
    $conn = $db->connect();
    $getdate = date("Y-m-d", strtotime("yesterday"));

    $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND health_records.input_date >= \"" . $getdate . "\";");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    /*if($result = $stmt1->fetchAll(PDO::FETCH_ASSOC)){
        $PID;
        foreach ($result as $rows) {
            $PID = $rows['Project_ID'];
            $stmt2 = $conn->prepare("SELECT * FROM `projects` WHERE `Project_ID`='$PID';");
            $stmt2->execute();
            $result2 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

            //echo json_encode($result);
            echo json_encode($result2);
        }*/
    echo json_encode($result);

}

if (isset($_POST['criticalElders'])) {
    $Elder_ID = $_POST['criticalElders'];
    $db = new DbConnect;
    $conn = $db->connect();
    $current_date = date('Y-m-d');

    $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND health_records.input_date = \"" . $current_date . "\" AND health_records.record_status = '1';");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

}

?>