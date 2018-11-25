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
	require_once 'connect.php';
	// θα το κάνω να ελέγχει αν ταιριάζει μόνο το jobs name αλλιώς θα βγει ίδιο με την "παύλα" 3 που πρέπει να ελέγχει skills&Professions
	$Email     		  = $_POST['Email'];
	$Password  		  = $_POST['Password'];

	$sql = "SELECT `Email`,`Password`
			FROM `Freelancers`
			WHERE `Email` = '$Email' ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$flag = 0 ;
	$flag2 = 0;
	
	//if Lancer exists in HH
	if($row['Email'] == $Email && $row['Password'] == $Password){
		$flag = 1;

	$sql2 = "SELECT `JobsName`
			 FROM `JobsProvidedByFreelancers`
			 WHERE `Email` = '$Email' ";
	$res2 = mysqli_query($conn,$sql2); 
	$row2 = mysqli_fetch_assoc($res2);
	$tmpJobName = $row2['JobsName'];

	$sql = "SELECT `Email`,`Diploma`, `ForeignLanguages`,`Town`
			FROM `JobsRequestedByCompanies`
			WHERE `JobsName` = '$tmpJobName'";
	$res2 = mysqli_query($conn,$sql);
	$myarray = array();	 //used for preventing double printing the same job from the same company
	while($row = mysqli_fetch_assoc($res2)){
		if($tmpJobName !== '')
				$flag2=1;
			
		$mail = $row['Email'];
		$Diploma = $row['Diploma'];
		$ForeignLanguages = $row['ForeignLanguages'];
		$Town = $row['Town'];

		if( in_array($mail, $myarray) ) 
			continue;
		
		array_push($myarray, $mail);

		$run = "SELECT `Email` , `Address` ,`PhoneNumber`,`Name`
				FROM `Companies`
				WHERE `Email`= '$mail'";
		$runRes = mysqli_query($conn,$run);	
		$last = mysqli_fetch_assoc($runRes);
		$comName = $last['Name'];
		$comMail = $last['Email'];
		$comAddress = $last['Address'];
		$comPhone = $last['PhoneNumber'];

		echo "<b> Your job: </b> ".$tmpJobName." <b> May be required By The Company:</b> ".$comName." <b>Email:</b> ".$comMail." <b> Address:</b> "
		.$comAddress." <b>PhoneNumber: </b> ".	$comPhone." <b>Town: </b>".$Town. "<br><br>";

	}//ths while

	}//ths if

	if($flag==0){
		echo "<b> FreeLancer with $Email does not exist in HH or You enter wrong Email/Password</b>";
		die();
	}
	if($flag2==0 && $flag == 1){
		echo "<b>Currently Your are  offering any jobs </b>";
		die();
	}
?>

</html>