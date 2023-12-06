<?php

#=================================================================================================================

    $db_servername ="localhost";
    $db_username ="root";
    $db_password ="";
    $db_name="parking-system";
    $conn =new mysqli($db_servername, $db_username, $db_password,$db_name);

#=================================================================================================================

	$firstName=$_POST['firstName'];
	$lastName=$_POST['lastName'];
	$dateOfBirth=$_POST['dateOfBirth'];
	$homeAddress=$_POST['homeAddress'];
	$email=$_POST['email'];
	$userPhoneNumber=$_POST['phoneNumber'];
	$gender=$_POST['gender'];

	$userName=$_POST['userName'];		
	$password=$_POST['password'];	
	$passwordConfirm=$_POST['passwordConfirm'];
	$check_user=$_POST['check_user'];

	$talkingName=$firstName.' '.$lastName;

#=================================================================================================================

echo "<!DOCTYPE html><html>
<head>
	<title>Registration</title>
	<meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel='stylesheet' type='text/css' href='../CSS/mainStyle.css'>
	<style>
		th{
			text-align:right;
		}
	</style>
</head>";

echo "<body><center><br>";

function registrationCancelledError(){
	echo "<h3>Opps! Registration Has Cancelled</h3><br>";
	echo "<a href='form.php'><button class='default-button'>Try Again</button></a>";
}

if($password==$passwordConfirm){
if($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}else{

#=====================================================================================================
	
    $userInfoInsertTableName='sys_user_info';
    $userInfoSql="SELECT `userId` from `$userInfoInsertTableName`";

    // create userInfoInsertTableName table if does not excist

	if($conn->query($userInfoSql)==true){
		$userInfoSqlResults=$conn->query($userInfoSql);
		$num_of_old_table=$userInfoSqlResults->num_rows;
		$num_of_old_table++;
	}else{
		$infoTableCreateSql="CREATE TABLE `$db_name`.`$userInfoInsertTableName`( 
			`userId` VARCHAR(16) NOT NULL primary key, 
			`firstName` VARCHAR(32) NOT NULL , 
			`lastName` VARCHAR(32) NOT NULL , 
			`dateOfBirth` DATE NOT NULL , 
			`gender` VARCHAR(8) NOT NULL ,
			`homeAddress` VARCHAR(64) NULL ,
			`email` VARCHAR(32) NULL ,
			`phoneNumber` VARCHAR(16) NULL,  
			`userName` VARCHAR(32) NOT NULL , 
			`password` VARCHAR(32) NOT NULL";
		$conn->query($infoTableCreateSql);

		$userInfoSql="SELECT `userId` from `$userInfoInsertTableName`";
		$userInfoSqlResults=$conn->query($userInfoSql);
		$num_of_old_table =1 ;
	}	
    
#=====================================================================================================
    
    if ($check_user =='CST') {
        $temp_user_id='CST/'.$num_of_old_table;
    }elseif ($check_user =='PPO') {
        $temp_user_id='PPO/'.$num_of_old_table;
    }
	
	$sql="INSERT INTO `$userInfoInsertTableName`
    	(`userId`, `firstName`, `lastName`, `dateOfBirth`, `gender`, `homeAddress`, `email`, `phoneNumber`,`userName`, `password`) 
    	VALUES
    	('$temp_user_id','$firstName','$lastName','$dateOfBirth','$gender','$homeAddress','$email','$userPhoneNumber','$userName','$password')";

    if($conn->query($sql)==true){
		echo "<h2>".$talkingName.' '."You're Registration successfully</h2>";
		echo "<table class='conerRoundTable default-shadow'>";
		echo "<tr><th>User ID : </th><td>".$temp_user_id.'</td></tr>';
		echo "<tr><th>User name : </th><td>".$userName.'</td></tr>';
		echo "</table><br><br>
		<a href='../index.html'><button class='default-button' id='returnToLogin'>Retrun to login form</button></a>";
	}else{
		registrationCancelledError();
	}

}	

}else{
	echo "<h3>Password and confirm password are not same</h3><br>
	<a href='form.php'><button class='default-button'>Try Again</button></a>";
}

$conn->close();
	echo "</center>
	<script src='../Javascript/main.js'></script>
	<script type='text/javascript'>
		themeSettingWithoutButton();
		const returnToLogin= document.getElementById('returnToLogin');
		returnToLogin.onclick= function () {
			alert('Your USER ID,USER NAME and PASSWORD need login to the system,Please save your mind or notedown your book :)');	
		}
	</script>
</body>
</html>";

?> 