<?php
require 'dbconnect.php';
date_default_timezone_set("Asia/Colombo");
if (isset($_POST['Admin_req'])) {
    $Elder_ID = $_POST['Admin_req'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt1 = $conn->prepare("SELECT * FROM `doctor` WHERE doc_status = '0';");
    $stmt1->execute();
    $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);

}

if (isset($_POST['doctor_Update_Status'])) {
    $Doc_ID = $_POST['doctor_Update_Status'];
    $db = new DbConnect;
    $conn = $db->connect();

    $stmt1 = $conn->prepare("UPDATE doctor SET doc_status ='1' WHERE nic = \"" . $Doc_ID . "\";");
    $stmt1->execute();
    //Done
}

?>