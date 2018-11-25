<html>
 <head>
 <link rel="stylesheet" type="text/css" href="indexcss.css">
	  <nav  style="text-align:center">
		  <a href="index.php">Home</a>
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
  <nav>
   <a href="MatchCompaniesAndFreeLancers.php">Match Companies And FreeLancers</a>
    <a href="HireAFreeLancer.php" >Hire A Free Lancer</a>
  </nav>
</head>

<?php
	require_once 'connect.php';

	$jobsName    =  $_POST['JobsName'];
	$LancerMail  =  $_POST['LancerMail'];
	$CompanyMail =  $_POST['CompanyMail'];
	$jobID       =  $_POST['jobID'];

	$delsql = "DELETE  FROM `JobsProvidedByFreelancers`
				WHERE `Email` = '$LancerMail' ";
	$delres = mysqli_query($conn,$delsql);

	$ena = 1;   // updateding headhunters
	$update2 = "UPDATE `HeadHunters`
			SET `NumOfProvidedJobs` = (`NumOfProvidedJobs` - '$ena' )  ";
	$resultUp2 = mysqli_query($conn,$update2);

	//remove from professions
	$del2 = "DELETE  FROM `Professions` 
			WHERE `Email` = '$LancerMail' ";
	$del2res = mysqli_query($conn,$del2);

	//remove from extra ExtraSkills
	$del3 = "DELETE  FROM `ExtraSkills` 
			WHERE `Email` = '$LancerMail' ";
	$del3res = mysqli_query($conn,$del3);

	$delcomp = "DELETE  FROM `JobsRequestedByCompanies`
				WHERE `Email` = '$CompanyMail' AND `NumOfJobs` = '$jobID' " ;
	$compres = mysqli_query($conn,$delcomp);	
	
	$update = "UPDATE `HeadHunters`
			SET `NumOfWantedJobs` = (`NumOfWantedJobs` - '$ena' )  ";
	$resultUp = mysqli_query($conn,$update);

	$update1 = "UPDATE `HeadHunters`
			SET `NumOfMatchedJobs` = (`NumOfMatchedJobs` + '$ena' )  ";
	$resultUp1 = mysqli_query($conn,$update1);

	//remove from cProfessions 
	$cprof = "DELETE  FROM `CProfessions`
			WHERE `Email` = '$CompanyMail' AND `NumOfJobs` = '$jobID' AND `JobsName` = '$jobsName'  ";
	$cprofdel = mysqli_query($conn,$cprof);		

	//remove from cExtraSkills
	$cskills = "DELETE  FROM `CExtraSkills`
			WHERE `Email` = '$CompanyMail' AND `NumOfJobs` = '$jobID' AND `JobsName` = '$jobsName'  ";
	$cskillsDEl = mysqli_query($conn,$cskills);		

	echo "<p align='center'><b>Your request successfully applied</b><br></p>";
	echo "<p align='center'><b>Redirection to main menu in 3seconds...</b></p>";
	header( "refresh:3;url=index.php" );
	die();

?>





</html>