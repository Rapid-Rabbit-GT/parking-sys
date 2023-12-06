<?php

session_start();

#database info---------------------------------------------------------------------------------------------

$db_servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "parking-system";
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

#form info---------------------------------------------------------------------------------------------

$logId = $_POST['userId'];
$logUserName = $_POST['userName'];
$logPassword = $_POST['password'];

#------------------------------------------------------------------------------------------------------

function bodyTags() {
    echo "<!DOCTYPE html><html>
        <head>		
	        <title>login</title>
	        <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
	        <link rel='icon' type='image/x-icon' href='Images/favicon.ico'>
	        <link rel='stylesheet' type='text/css' href='CSS/mainStyle.css'>
	        <style>
		        .third-div{
			        min-width: 50%;
			        margin-top: 30px;
			        text-align: left;
		        }
	        </style>
        </head>

        <body>
	    <center>
	    <div class='mid-space-div'></div>";
}

#-------------------------------------------------------------------------------------------------------

$userInfoTableName = 'sys_user_info';

$sql = "SELECT `userName`,`password` from `$userInfoTableName` where `userId`='$logId'";
if ($conn->query($sql) == true) {
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['userName'];
            $password = $row['password'];
        }

        if ($logUserName == $username and $logPassword == $password) {

            $_SESSION['userId'] = $logId;

            $_SESSION['db_servername'] = $db_servername;
            $_SESSION['db_username'] = $db_username;
            $_SESSION['db_password'] = $db_password;
            $_SESSION['db_name'] = $db_name;

            $this_year = 2023;
            $_SESSION['thisYear'] = $this_year;

            include "homepage.html";
            
        }else{
            bodyTags();

            echo "<br><h2>You are not registered or invalid Data</h2>
		    <a href='index.html' target='_top'>
		    <button class='default-button'>Try again</button></a>";
        }
    } else {

        bodyTags();

        echo "<br><h2>You are not registered or invalid Data</h2>
		<a href='index.html' target='_top'>
		<button class='default-button'>Try again</button></a>";
    }
} else {

    bodyTags();
    echo "<br><h2>You are not registered or invalid Data</h2>
	<a href='index.html' target='_top'>
		<button class='default-button'>Try again</button></a>";
}

$conn->close();

echo "</center>

	<script src='Javascript/main.js'></script>
	<script type='text/javascript'>
		themeSettingWithoutButton();
	</script>
</body>
</html>";

#uploading---------------------------------------------------------------------------------------------------

$_SESSION['check_main_panel'] = 1;
$_SESSION['frame_value'] = 0;
