<?php
    require 'dbconnect.php';

    if(isset($_POST['Admin_req'])) {
        $Elder_ID = $_POST['Admin_req'];
        $db = new DbConnect;
        $conn = $db->connect();

        $stmt1 = $conn->prepare("SELECT * FROM `doctor` WHERE doc_status = '0';");
        $stmt1->execute();
        $result = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);

    }

    if(isset($_POST['DocID'])) {
        $Doc_ID = $_POST['DocID'];
        $db = new DbConnect;
        $conn = $db->connect();

        $stmt1 = $conn->prepare("UPDATE doctor SET doc_status='1' WHERE nic = " . $Doc_ID. ";");
        $stmt1->execute();
    }

 ?>