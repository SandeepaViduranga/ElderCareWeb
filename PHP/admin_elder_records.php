<?php

require 'dbconnect.php';
if (isset($_POST['Elders_Health_records'])) {
    $Elder_ID = $_POST['Elders_Health_records'];
    $db = new DbConnect;
    $conn = $db->connect();
    $getdate = date("Y-m-d", strtotime("yesterday"));

    $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND health_records.input_date = \"" . $getdate . "\";");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}

if (isset($_POST['Update_Rec'])) {
    $AdultID = $_POST['Update_Rec'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt1 = $conn->prepare("UPDATE `health_records` SET record_status ='1' WHERE nic = " . $AdultID . ";");
    $stmt1->execute();
}

if (isset($_POST['ElderID'])) {
    $AdultNIC = $_POST['ElderID'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt1 = $conn->prepare("SELECT * FROM `adults_info`,`health_records` WHERE adults_info.nic = health_records.adult_id AND adults_info.nic=\"" . $AdultNIC . "\";");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

if (isset($_POST['loadRiskCount'])) {
    $AID = $_POST['loadRiskCount'];
    $db = new DbConnect;
    $conn = $db->connect();
    $date = date("Y-m-d", strtotime("yesterday"));

    $stmt1 = $conn->prepare("SELECT COUNT(distinct adult_id) as riskCount FROM health_records WHERE record_status = '1' AND input_date = \"" . $date . "\";");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}

if (isset($_POST['goodHealth'])) {
    $AID = $_POST['goodHealth'];
    $db = new DbConnect;
    $conn = $db->connect();
    $date = date("Y-m-d", strtotime("yesterday"));

    $stmt1 = $conn->prepare("SELECT COUNT(distinct adult_id) as goodCount FROM health_records WHERE record_status = '0' AND input_date = \"" . $date . "\";");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}

if (isset($_POST['totalAdults'])) {
    $AID = $_POST['totalAdults'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt1 = $conn->prepare("SELECT COUNT(distinct id) as adultCount FROM adults_info;");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

}

?>