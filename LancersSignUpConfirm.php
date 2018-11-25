<html>

 <head>
 <link rel="stylesheet" type="text/css" href="indexcss.css">
	  <nav  style="text-align:center">
		  <a href="index.php">Home</a>
		  <a href="LancersSignUp.php">Sign up as Free Lancer</a>
		  <a href="CompanySignUp.php" >Sign up as Company</a>
		  <a href="FreeLancerManage.php">FreeLancer Manage·</a>
		  <a href="CompanyManage.php">Company Manage</a>
	  </nav>
	  <nav  style="text-align:center">
		  <a href="SeeRegisterdFreeLancers.php">See Registerd FreeLancers</a>
		  <a href="SeeRegisterdCompanies.php" >See Registerd Companies</a>
		  <a href="SeeProvidedJobs.php">See Provided Jobs</a>
		  <a href="SeeWantedJobs.php">See Wanted Jobs</a> 
	  </nav>
</head>

<?php
	require_once 'connect.php';
	//retrieving the values from the freelancer registration form 	
	
	$FirstName 	    =  $_POST['FirstName'];
	$LastName 	    =  $_POST['LastName'];
	$Password 	    =  $_POST['Password'];
	$Address 	    =  $_POST['Address'];
	$Email		    =  $_POST['Email'];
	$PhoneNumber    =  $_POST['PhoneNumber'];
	$CreditCard     =  $_POST['CreditCard'];
	$AccountNumber  =  $_POST['AccountNumber'];
	$AccountBalance =  $_POST['AccountBalance'];

	//check if he is already registered	
	$sql = "SELECT  `Email` FROM `Freelancers`
					WHERE `Email` = '$Email'";
					
			$result = mysqli_query($conn,$sql);
						
			while($row = mysqli_fetch_assoc($result))
			{
				$mail = $row['Email'];
				if($mail == $Email){
						echo "<p align='center'>Email:  '$mail'  already exist, choose another one please</p>";
						die();
				}
				if(!mysqli_query($conn,$sql))
					die("Error at FreeLancersignupconfirm " .mysqli_error($conn));
			}

	if($AccountBalance<20){
		echo "<p align='center'>You dont have enough money to join HH .</p>";
		die();
	}	
	$last = $AccountBalance-20;	
	$sql = "INSERT INTO `Freelancers` (`Freelancer_Fname`, `Freelancer_Lname`, `Address`, `PhoneNumber`,
					`Email`,`AccountNumber`,`CreditCardNumber`,`Password`,`AccountBalance`)
	VALUES('$FirstName','$LastName','$Address','$PhoneNumber','$Email','$AccountNumber','$CreditCard','$Password','$last') ";

	$result = mysqli_query($conn,$sql);

	echo "<p align='center'> Freelancer  <b>$FirstName $LastName  $Password $Email</b> added to HeadHunters COST 20€ </br> </p>";

	$sqlBal = "SELECT `AccountBalance`
			FROM `HeadHunters` ";
			
	$resultBal = mysqli_query($conn,$sqlBal);
	$rowBal = mysqli_fetch_assoc($resultBal);
	$del = 20 ;

	$update = "UPDATE `HeadHunters`
			SET `AccountBalance` = (`AccountBalance` + '$del' )   ";
	$resultUp = mysqli_query($conn,$update);
			
	echo "<p align='center'>Redirection to main menu in 2 seconds...</p>";
	header( "refresh:2;url=index.php" );

	?>

	</html>