<?php
	session_start();
	if(isset($_SESSION['id'])){
		//create connection with database
		$conect = mysqli_connect("localhost","root","","dbblood");

		//sql query to find user information from database
		$sqlquery = "SELECT * FROM `tbdonor` WHERE `tbdonor`.`id` = '$_SESSION[id]'";

		//take data from database
		$data = mysqli_query($conect, $sqlquery);

		//convert 2D array to 1D array
		$row = mysqli_fetch_array($data);
?>
		<!DOCTYPE html>
		<html>
			<head>
				<title> <?php echo $row["dname"];?>'s Profile page </title>
				<style>
					body {margin:01px;padding:02px;border:02px;background:lightgray;line-height:30px;}
					label {margin:01px;padding:05px;border:02px;width:90px;font-weight:bold;display:inline-block;}
					.container {margin:01px 2vw;padding:05px;border:01px;background:white;}
					.subheader {margin:01px;padding:05px;border:02px;width:150px;font-weight:bold;display:inline-block;}
					.button {margin:01px;padding:05px;border:01px;border-radius:08px;}
					a {text-decoration:none;font-weight:bold;}
				</style>
			</head>
			<body>
				<div class="container">
					<div class="subheader"> Your information </div>
					<button class="button" onclick="return permit1()">
						<?php echo "<a href='profileupdate.php'> Edit </a>"; ?>
					</button>
					<button class="button" onclick="return permit2()">
						<?php echo "<a href='delete.php'> Delete </a>"; ?>
					</button>
					<button class="button" style="float:right;" onclick="return permit3()">
						<?php echo "<a href='logout.php'> Log out </a>"; ?>
					</button>
				</div>
				<div class="container">
					<?php
						echo "<img src='http://localhost/blood-donation/pimage/$row[image]' width='150px;' alt=image>";
						echo "<br/> <label> Donor ID</label>: ", $row["id"];
						echo "<br/> <label> Name</label>: ", $row["dname"];
						echo "<br/> <label> Gender</label>: ", $row["sex"];
						echo "<br/> <label> Mobile</label>: ", $row["dnumber"];
						echo "<br/> <label> E-mail</label>: ", $row["demail"];
						echo "<br/> <label> Address</label>: ", $row["daddress"];
						echo "<br/> <label> Blood Group</label>: ", $row["dblood"];
						echo "<br/> <label> Last Donate</label>: ", $row["lddate"];
					?>
				</div>
				<script>
					function permit1(){
						if(!confirm("Sure to Edit?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit2(){
						if(!confirm("Sure to Delete?")){
							return false;
						}
						else{
							return true;
						}
					}
					function permit3(){
						if(!confirm("Sure to Log out?")){
							return false;
						}
						else{
							return true;
						}
					}
				</script>
			</body>
		</html>
<?php
	}
	else{
		header("location:http://localhost/blood-donation/log/login.php");
	}
?>