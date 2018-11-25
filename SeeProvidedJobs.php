<html>
<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">

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
  <nav  style="text-align:center">
	  <a href="WatchMatchesForLancers.php">Watch Matches For Lancers</a>
	  <a href="WatchMatchesForCompanies.php" >Watch Matches For Companies</a>
  </nav>
  <nav  style="text-align:center">
	  <a href="MatchCompaniesAndFreeLancers.php">Match Companies And FreeLancers</a>
	  <a href="HireAFreeLancer.php" >Hire A Free Lancer</a>
  </nav>
</head>

<?php
	require_once 'connect.php';

	$sql = "SELECT * FROM `JobsProvidedByFreelancers`  "; 
	$result = mysqli_query($conn,$sql);
	$flag=0;

	while($row =mysqli_fetch_assoc($result)){  
		$mail2 = $row['Email'];

		$last = "SELECT * FROM `Professions`
				WHERE `Email` = '$mail2' ";
		$lastres = mysqli_query($conn,$last);
		
		$last2 = "SELECT * FROM `ExtraSkills`
				WHERE `Email` = '$mail2' ";
		$lastres2 = mysqli_query($conn,$last2);
		
		echo " <b>Provided Job's Description: </b>";
		echo "<p><b>Jobs Name:</b> ".$row['JobsName']." ,<b>Diploma:</b> ".$row['Diploma']." 
				 <b>ForeignLanguages:</b> ".$row['ForeignLanguages']." ,<b>WorkingTown:</b> ".$row['Town']." ,<b>Solary:</b> ".$row['Solary']."
				  <b>WorkingSchedule</b>: ".$row['WorkingSchedule']." ,<b>Date Available</b> ".$row['Date']." 
				</p>";
		echo "<b>Professions : </b>";
		while($reslast = mysqli_fetch_assoc($lastres)){
			echo "  " .$reslast['Profession'].", ";
		}
		echo "<p></p>";
		echo "<b>ExtraSkills:</b> ";
		while($reslast2 = mysqli_fetch_assoc($lastres2)){
			echo " " .$reslast2['ExtraSkills'].", ";
		}
		$mail = $row['Email'];		
		
		$test = "SELECT `Freelancer_Fname`,`Freelancer_Lname`,`Address`,`PhoneNumber`,`Email`,`AccountNumber`  
				 FROM `Freelancers`
				 WHERE `Email` = '$mail' ";
		$testres = mysqli_query($conn,$test);

		$res = mysqli_fetch_assoc($testres);
	echo "<p><b>From FreeLancer:</b> " .$res['Freelancer_Fname']. " " .$res['Freelancer_Lname']." , BankAccountNumber: ".$res['AccountNumber'].
		" , Email: ".$res['Email']. ", Address: " .$res['Address']. " , PhoneNumber: ".$res['PhoneNumber']."</p>";		
		$flag=1;
	}
	if($flag==0)
		echo "<p align='center'> <b>Provided Jobs List is empty</b>  </p>";
	?>
	</body>
	</html>