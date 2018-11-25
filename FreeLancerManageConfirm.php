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
</head>

<?php
// 130849040  aegean member code
	require_once 'connect.php';

	$Email     		  = $_POST['Email'];
	$Password  		  = $_POST['Password'];
	$Diploma  		  = $_POST['Diploma'];
	$WorkingScedule   = $_POST['WorkingScedule'];	
	$WorkingTown      = $_POST['WorkingTown'];
	$ForeignLanguages = $_POST['ForeignLanguages'];
	$Date 			  = $_POST['Date'];
	$Solary			  = $_POST['Solary'];
	$JobsName         = $_POST['JobsName'];
	$Date  			  = $_POST['Date'];

	$sql = "SELECT `Email` ,`Password`,`AccountBalance`
			FROM `Freelancers` 
			WHERE `Email` = '$Email'";
	$result = mysqli_query($conn,$sql);

	$flag = 0 ;
	$row = mysqli_fetch_assoc($result);

	if($Date==NULL)
		$Date = date('Y-m-d H:i:s');

	if($row['Email'] == $Email && $row['Password'] == $Password){ //  check mail and pass for existing FreeLancer account
		$flag = 1 ;
		if($row['AccountBalance']<10){
			echo "<p align='center'><b>You dont have enough money</b> </p>";
			die();
		}
		$money = $row['AccountBalance'];
	 if( isset($_POST['Date']) || $_POST['Date'] != '' ){
	 	$sql = "INSERT INTO `JobsProvidedByFreelancers` (`JobsName`,`Email`, `Diploma`,`ForeignLanguages`,
						`Town`,`Solary`,`WorkingSchedule`,`Date`)
				VALUES('$JobsName','$Email','$Diploma','$ForeignLanguages','$WorkingTown','$Solary','$WorkingScedule','$Date' ) ";
				$result = mysqli_query($conn,$sql);
		}
	else{
		$sql = "INSERT INTO `JobsProvidedByFreelancers` (`JobsName`,`Email`, `Diploma`,`ForeignLanguages`,
							`Town`,`Solary`,`WorkingSchedule`,`Date`)
		VALUES('$JobsName','$Email','$Diploma','$ForeignLanguages','$WorkingTown','$Solary','$WorkingScedule',NOW() ) ";
		$result = mysqli_query($conn,$sql);
	}

	foreach ($_POST['Professions'] as $names){      
       	 $sql1 = "INSERT INTO `Professions` (`Email`, `Profession`)
				  VALUES('$Email','$names') ";
		$result = mysqli_query($conn,$sql1);
		}
	foreach ($_POST['ExtraSkills'] as $names2){      	
      	   	 $sql2 = "INSERT INTO `ExtraSkills` (`Email`,`ExtraSkills`)
				  VALUES('$Email','$names2') ";
      	  $result = mysqli_query($conn,$sql2);
		}		

	echo "<p align='center'>Your application added sucesfully with 10€  </p>";	
	
	$sqlBal = "SELECT `AccountBalance`
	    	   FROM `HeadHunters` ";
			
	$resultBal = mysqli_query($conn,$sqlBal);
	$rowBal = mysqli_fetch_assoc($resultBal);
	$del = 10 ;

	$update = "UPDATE `HeadHunters`
			SET `AccountBalance` = (`AccountBalance` + '$del' )   ";
	$resultUp = mysqli_query($conn,$update);	

	$del2 = 1;
	$update2 = "UPDATE `HeadHunters`
			SET `NumOfProvidedJobs` = (`NumOfProvidedJobs` + '$del2' )   ";
	$resultUp2 = mysqli_query($conn,$update2);	

	$remove = $money-10;
	$uplast = "UPDATE `Freelancers` 
			SET `AccountBalance` = '$remove'
			WHERE `Email` = '$Email' ";
	$run = mysqli_query($conn,$uplast);		

}//ths prwths if
	if(!$flag){
		echo "<p align='center'>Use an existing account please ( email , Password)</p>";		
		echo "<p align='center'>Redirection to Refill the form in 3seconds...</p>";
		header( "refresh:3;url=FreeLancerManage.php" );
		die();
	}
?>
</html>