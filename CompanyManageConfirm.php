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

	$Email     		  = $_POST['Email'];
	$Password  		  = $_POST['Password'];
	$Diploma  		  = $_POST['Diploma'];
	$WorkingScedule   = $_POST['WorkingScedule'];	
	$WorkingTown      = $_POST['WorkingTown'];
	$ForeignLanguages = $_POST['ForeignLanguages'];
	$Date 			  = $_POST['Date'];
	$Solary			  = $_POST['Solary'];
	$Date  			  = $_POST['Date'];
	$JobsName         = $_POST['JobsName'];
	$finally;

	$sql = "SELECT `Email`,`Password`,`GivenJobs`,`AccountBalance`
			FROM `Companies`
			WHERE `Email` = '$Email' ";
	$result = mysqli_query($conn,$sql);

	$flag = 0 ;
	$row = mysqli_fetch_assoc($result);

	if($Date==NULL)
		$Date = date('Y-m-d H:i:s');

	if($row['Email'] == $Email && $row['Password'] == $Password){ //  check mail and pass for existing Company account
		$GivenJobs = $row['GivenJobs'];
		$money = $row['AccountBalance'];
		//givenjobs ++
		$res;
		$GivenJobs = $GivenJobs + 1;
		echo "$GivenJobs";
		if($GivenJobs >= 3)  // checking for any discounts
			$res = 18;
		if($GivenJobs >=5 )
			$res = 16;
		if($GivenJobs <3 )
			$res = 20;			

		if($row['AccountBalance']<$res){
			echo "<p align='center'><b>You dont have enough money</b> </p>";
			die();
		}

		$money = $money - $res;
		$lola = 1;
		$add = $GivenJobs ;
		$tmp = "UPDATE `Companies`
			SET `GivenJobs` = '$add' 
			WHERE `Email` = '$Email'";
		$tmpLast = mysqli_query($conn,$tmp);

		$lola = " UPDATE `Companies`
				 SET `AccountBalance` = '$money'
				 WHERE `Email` = '$Email'";
		$lolarun = mysqli_query($conn,$lola);


		$flag = 1 ;
		if( isset($_POST['Date']) || $_POST['Date'] != '' ){
	 	$sql = "INSERT INTO `JobsRequestedByCompanies` (`JobsName`,`Email`, `Diploma`,`ForeignLanguages`,
						`Town`,`Solary`,`WorkingSchedule`,`dates`)
				VALUES('$JobsName','$Email','$Diploma','$ForeignLanguages','$WorkingTown','$Solary','$WorkingScedule','$Date' ) ";
				$result = mysqli_query($conn,$sql);
				$finally = mysqli_insert_id($conn);
		}
	else{
		$sql = "INSERT INTO `JobsRequestedByCompanies` (`JobsName`,`Email`, `Diploma`,`ForeignLanguages`,
							`Town`,`Solary`,`WorkingSchedule`,`dates`)
		VALUES('$JobsName','$Email','$Diploma','$ForeignLanguages','$WorkingTown','$Solary','$WorkingScedule',NOW() ) ";
		$result = mysqli_query($conn,$sql);
		$finally = mysqli_insert_id($conn);	
	}

	//taking NumOfJobs with the given email
	$test = "SELECT `NumOfJobs`,`JobsName`   
			 FROM `JobsRequestedByCompanies` 
			 WHERE `Email` = '$Email' AND `NumOfJobs` = '$finally' ";
	$testRES = mysqli_query($conn,$test);

	$row2 = mysqli_fetch_assoc($testRES);
	$JubNO = $row2['NumOfJobs'];
	$JobsName = $row2['JobsName'];

	foreach ($_POST['Professions'] as $names){  //  
       	 $sql1 = "INSERT INTO `CProfessions` (`NumOfJobs`,`Email`, `CProfessions`,`JobsName`)
				  VALUES('$JubNO','$Email','$names','$JobsName') ";
		$result = mysqli_query($conn,$sql1);
		}

	foreach ($_POST['ExtraSkills'] as $names2){
      	   	 $sql2 = "INSERT INTO `CExtraSkills` (`NumOfJobs`,`Email`,`CExtraSkills`,`JobsName`)
				  VALUES('$JubNO','$Email','$names2','$JobsName') ";
      	  $result = mysqli_query($conn,$sql2);
		}	

	$sqlBal = "SELECT `AccountBalance`
	    	   FROM `HeadHunters` ";
			
	$resultBal = mysqli_query($conn,$sqlBal);
	$rowBal = mysqli_fetch_assoc($resultBal);
	$del = 0 ;

	$update = "UPDATE `HeadHunters`
			SET `AccountBalance` = (`AccountBalance` + '$res' )   ";
	$resultUp = mysqli_query($conn,$update);	

	$del2 = 1;
	$update2 = "UPDATE `HeadHunters`
			SET `NumOfWantedJobs` = (`NumOfWantedJobs` + '$del2' )   ";
	$resultUp2 = mysqli_query($conn,$update2);	
		
		echo "<p align='center'><b>Your application added sucesfully with COST $res € </b></p>";		

}//ths prwths if
	if(!$flag){
		echo "<p align='center'><b>Use an existing account please ( email , Password)</b> </p>";		
		echo "<p align='center'><b>Redirection to Refill the form in 3seconds...</b></p>";
		header( "refresh:3;url=CompanyManage.php" );
		die();
	}
?>			

</html>