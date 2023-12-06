<?php

#-------------------------------------------------------------------------------------------------------

	$db_servername ="localhost";
	$db_username ="root";
	$db_password ="";
	$db_name="parking-system";
	$conn =new mysqli($db_servername, $db_username, $db_password,$db_name);

#-------------------------------------------------------------------------------------------------------

echo"<!DOCTYPE html><html>
<head>
	<title>Registration Form</title>
	<meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<link rel='stylesheet' type='text/css' href='../CSS/mainStyle.css'>
	<style>
		:root{
			--caption-button-color: black;
			--caption-button-background-color: white;
			--caption-button-border-color: black;
			--caption-button-change-border-color: white;
			--caption-button-hover-color: white;
			--caption-button-hover-background-color: black;
			--caption-button-hover-border-color: black;
		}
		.userThemeDark{
			--caption-button-color: white;
			--caption-button-background-color: #445760;
			--caption-button-border-color: white;
			--caption-button-change-border-color: white;
			--caption-button-hover-color: black;
			--caption-button-hover-background-color: white;
			--caption-button-hover-border-color: white;
		}
		#captionArea{
			margin: auto;
			width:50%;
		}
		#captionData{
			display: flex;
		}
		.captionDataLi{
			flex: 1;
			border: 2px solid var(--caption-button-border-color);
			padding: 5px 10px;
			margin: 0px 1px;
			border-radius: 5px;
			color: var(--caption-button-color);
			background-color: var(--caption-button-background-color);
			border-bottom: var(--caption-button-change-border-color);
			cursor: pointer;
		}
		.captionDataLi:hover{
			color: var(--caption-button-hover-color);
			background-color: var(--caption-button-hover-background-color);
			border-color: var(--caption-button-hover-border-color);
			border-bottom-left-radius: 0px;
			border-bottom-right-radius: 0px;
		}
		.second-div{
			width: 80%;
			padding-bottom: 80px;
		}
		.conerRoundTable{
			width: 60%
		}
		th{
			text-align: right;
		}
		.form-row{
			display:flex;
			margin: 5px 0px;
		}
		.form-row-name,form-row-value{
			padding: auto;
		}
		.inputTypeSelect{
			max-width: 95%;
		}
		.inputTypeText, .inputTypeSelect{
			margin-left: 5px;
			padding: 5px 5px;
		}

		#formGeneral{
			display: block;
		}
		#formSchool, #formInstitute, #formPersonal{
			display: none;
		}		
		#teacherSecurityKeyGeneral, #teacherSecurityKeySchool, #teacherSecurityKeyInstitute{
			display: none;
			margin-top: 5px;
		}

		/*	Responsive	======================================*/
		@media (max-width:720px) {
            #captionArea{
				width: 65%;
			}
			.second-div{
				width: 90%;
				padding: 30px 10px;
			}
			.conerRoundTable{
				width: 80%
			}
        }
        @media (max-width:450px) {
            #captionArea{
				width: 90%;
			}
			.second-div{
				width: 100%;
				padding: 30px 5px;
			}
			.conerRoundTable{
				width: 100%
			}
			.form-row{
				display: block;
			}
        }
	</style>
	
</head>";

#------------------------------------------------------------------------------------------------------

function getPersonalData(){
	echo "<h3>Personal Data</h3>
	<table class='conerRoundTable default-shadow'>
		<tr><th>First Name </th>
			<td><input class='inputTypeText' type='text' name='firstName'  required></td></tr>
		<tr><th>Last Name </th>
			<td><input class='inputTypeText' type='text' name='lastName' required></td></tr>
		<tr><th>Date Of Birth </th>
			<td><input class='inputTypeText' type='date' name='dateOfBirth' required></td></tr>
		<tr><th>Home Address </th>
			<td><input class='inputTypeText' type='text' name='homeAddress'></td></tr>
		<tr><th>Email </th>
			<td><input class='inputTypeText' type='email' name='email'></td></tr>
		<tr><th>Phone number </th>
			<td><input class='inputTypeText' type='number' name='phoneNumber' placeholder='+94'></td></tr>
		<tr><th rowspan='2'>Gender </th>
			<td><input type='radio' name='gender' value='male' required>Male</td></tr>
			<td><input type='radio' name='gender' value='female' required>Female</td></tr>
	</table>";
}

function getLoginData(){
	echo "<h3>Login Data</h3>
	<table class='conerRoundTable default-shadow'>
		<tr><th>User Name </th>
			<td><input class='inputTypeText' type='text' name='userName' required/></td></tr>
		<tr><th>Set Password </th>
			<td><input class='inputTypeText' type='password' name='password' required/></td></tr>
		<tr><th>Confirm Password </th>
			<td><input class='inputTypeText' type='password' name='passwordConfirm' required/></td></tr>
	</table>";
}

#------------------------------------------------------------------------------------------------------

echo"
<body><center>
	<table width='100%'><tr>		
		<td class='align-right'>
			<button class='default-button' id='userInterfaceThemeIcon'>Dark</button>
			<a href='../index.html'>
				<button class='default-button'>Back</button>
			</a>
		</td></tr>
	</table><br>";

#------------------------------------------------------------------------------------------------------

echo"<div class='default-shadow second-div' id='formGeneral'>";

	echo"<h1>Registration form for Parking system </h1>
	<form action='result.php' method='post'>";

		echo "<div class='third-div default-shadow'>
            For customer
            <input type='radio' id='radioForCustomer' name='check_user' value='CST' required checked><br>
			For parking palce owner
			<input type='radio' id='radioForPlaceOwner' name='check_user' value='PPO' required >
		</div>";

		getPersonalData();
		getLoginData();

		echo "<br><input type='checkbox' name='userInputSystemType' value='general' required>
		Accpet Terms And Conditions<br><br>
		<input class='default-button' type='submit' value='Register'><br><br>";	

	echo"</form>";

echo"</div>";

#-------------------------------------------------------------------------------------------------------

echo"<div class='bottom-div' id='bottom-div'></div></center>

	<script src='../Javascript/main.js'></script>
	<script type='text/javascript'>
		themeSettingWithButton();
	</script>

</body>

</html>";
		
?>