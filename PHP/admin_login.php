<?php
require 'dbconnect.php';
date_default_timezone_set("Asia/Colombo");
if(isset($_POST['admin_login'])){
    //name email nic address mobile mbbsid Password
    $passwords = array("name1"   =>"pass1", 
                        "name2"   =>"pass2");
                   
if ($password == $passwords[$username]){
    setcookie("username", $username, time()+1200);
    echo "<H2>Access granted.</H2>";
}else{
    setcookie("username", "", time()-3600);
    echo "<H2>Invalid user name or password: access denied.</H2>";
}
}
?>