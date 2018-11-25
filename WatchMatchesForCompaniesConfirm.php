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
   <a href="MatchCompaniesAndFreeLancers.php">Match Companies And FreeLancers</a>
    <a href="HireAFreeLancer.php" >Hire A Free Lancer</a>
  </nav>
</head>

<?php
	require_once 'connect.php';
	// θα το κάνω να ελέγχει αν ταιριάζει μόνο το jobs name αλλιώς θα βγει ίδιο με την "παύλα" 3 που πρέπει να ελέγχει skills&Professions
	$Email     		  = $_POST['Email'];
	$Password  		  = $_POST['Password'];

	$sql = "SELECT `Email`,`Password`
			FROM `Companies`
			WHERE `Email` = '$Email' ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$flag = 0 ;
	$flag2 = 0;
	
	//if company exists in HH
	if($row['Email'] == $Email && $row['Password'] == $Password){
		$flag = 1;
		// for each job opening check for available freelancers
		$sql2 = "SELECT `JobsName` , `dates`
				 FROM `JobsRequestedByCompanies`
				 WHERE `Email` = '$Email' ";
		$res2 = mysqli_query($conn,$sql2); 	
		
		while($row2 = mysqli_fetch_assoc($res2)){
			$tmpJobName = $row2['JobsName'];
			$tmpJobDate = $row2['dates'];
			if($tmpJobName !== '')
				$flag2=1;

			$run = "SELECT `Email` ,`Diploma`, `Date`,`Diploma`, `ForeignLanguages`, `Town`,`JobsName`
					FROM   `JobsProvidedByFreelancers`
					WHERE `JobsName` = '$tmpJobName'";
			$runRes = mysqli_query($conn,$run);
			$tmpName =mysqli_fetch_assoc($runRes);
			$lola = $tmpName['Email'];
			$Date = $tmpName['Date'];
			$Diploma = $tmpName['Diploma'];
			$ForeignLanguages = $tmpName['ForeignLanguages'];
			$Town = $tmpName['Town'];

			if($Town == ''){
				echo "<b>Currently their no Available FreeLancer Providing the job of:  $tmpJobName  </b><br>";
				die();
			}

			$mail = "SELECT `Freelancer_Fname` , `Freelancer_Lname`,`Address`,`PhoneNumber`
					FROM `Freelancers`
					WHERE `Email` = '$lola'";
			$mailRes = 	mysqli_query($conn,$mail);
			$mailLast = mysqli_fetch_assoc($mailRes);
			$name = $mailLast['Freelancer_Fname'];
			$lname = $mailLast['Freelancer_Lname'];
			$Address = $mailLast['Address'];
			$PhoneNumber = $mailLast['PhoneNumber'];
			//echo "ta names einai : $name $lname <br>";
			
		echo "<b>Job:  </b>".$tmpJobName. "  <b>Of Your Company be Matched with FreeLancer: </b>" .$mailLast['Freelancer_Fname']." ".$mailLast['Freelancer_Lname']." , ".$lola. " <b>Address:</b> ".$Address." <b>PhoneNumber:</b> ".$PhoneNumber. 
		    " <b>Diploma: </b>".$Diploma." <b>ForeignLanguages: </b>".$ForeignLanguages." <b>Working Town: </b>".$Town.  "<br> <br>";				
		    
		}	//ths while
				
	}//ths if

	if($flag==0){
		echo "<b> Company with $Email does not exist in HH or You enter wrong Email/Password</b>";
		die();
	}
	if($flag2==0 && $flag == 1){
		echo "<b>Currently Your are not Asking for jobs </b>";
		die();
	}

	?>
</html>