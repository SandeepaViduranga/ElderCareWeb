<?php
	
	if(isset($_POST['log_in']))
	{
		require 'dbconnect.php';
		
		$username = $_POST['uname'];
		$password = $_POST['pword'];

		if(empty($username) || empty($password))
		{
			echo'<script language="javascript">
						window.alert("Please fill the empty fields")
						window.location.href = "../doctor_login.html"
						</script>';
						exit();
		}
		else{
			$sql = "SELECT * FROM login WHERE Username=\"" . $username . "\"";

			$db = new DbConnect;

			if(!$conn = $db->connect())
				
			{
				echo'<script language="javascript">
						window.alert("SQL ERROR. Please check the SQL code ")
						window.location.href = "../doctor_login.html"
						</script>';
						exit();
			}
			else
			{
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				
				if($result = $stmt->fetchAll(PDO::FETCH_ASSOC))
				{
					//$pwdcheck = password_verify($password, $row['fname']);
					$passveri;
					$ID;
					$Sts;
					foreach ($result as $rows) {
                                                 $passveri = $rows['Password'];
                                                 $ID = $rows['LID'];
                                                 $Sts = $rows['Type'];
                                                }
					$pwdcheck = false;
					if(password_verify($password, $passveri)){
						$pwdcheck = true;
					}
					if($pwdcheck == false)
					{
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../doctor_login.html"
						</script>';
						exit();
						
					}else if($pwdcheck == true)
					{
						$status = $Sts;
						switch ($status) {
							
							case '0':

                                //SQL query for fetch organization data
                                $SQLsub = "SELECT `Username` FROM `login` WHERE LID = " . $ID . "";
                                $stmt = $conn->prepare($SQLsub);
                                $stmt->execute();

                                if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {

                                    $AdminUsername;

                                    foreach ($result as $rows) {
                                        $AdminUsername = $rows['Username'];
                                    }

                                    echo '<script language="javascript">
                                    localStorage.setItem("AdminID","' . $ID . '");
                                    localStorage.setItem("AdminUsername","' . $AdminUsername . '");
                                    window.location.href = "../admin_health_records.html"
                                    </script>';
                                        exit();
                                }else
                                {
                                    echo'<script language="javascript">
										window.alert("Error fetching data from database!!")
										window.location.href = "../main.html"
										</script>';
                                    exit();
                                }
								break;

							case '1':

								//SQL query for fetch organization data
								$SQLsub = "SELECT `DID`,`Name` FROM `doctor` WHERE LID = " . $ID . "";
								$stmt = $conn->prepare($SQLsub);
								$stmt->execute();
	
								if($result = $stmt->fetchAll(PDO::FETCH_ASSOC)) {
	
									$DocID;
									$DocName;
	
									foreach ($result as $rows) {
										$DocID = $rows['DID'];
										$DocName = $rows['Name'];
									}
	
									echo '<script language="javascript">
										localStorage.setItem("DID","' . $DocID . '");
										localStorage.setItem("Name","' . $DocName . '");
										localStorage.setItem("LID","' . $ID . '");
										window.location.href = "../doctor_health_records.html"
										</script>';
									exit();
								}else
								{
									echo'<script language="javascript">
										window.alert("Error fetching data from database!!")
										window.location.href = "../main.html"
										</script>';
									exit();
								}
	
								break;
	
							default:
								echo'<script language="javascript">
								window.alert("Error")
								window.location.href = "../doctor_login.html"
								</script>';
								exit();
								break;
						}
				
					}else
					{
						echo'<script language="javascript">
						window.alert("You entered a Wrong Password !")
						window.location.href = "../doctor_login.html"
						</script>';
						exit();							
						
					}
				}else
				{
					echo'<script language="javascript">
						window.alert("Username incorrect! Please check the username and try again..")
						window.location.href = "../doctor_login.html"
						</script>';
						exit();
				}
			}
		}
	}	
	else
	{
		echo'<script language="javascript">
		window.alert("Wrong connection")
		window.location.href = "../doctor_login.html"
		</script>';
		exit();

	}
	
?>