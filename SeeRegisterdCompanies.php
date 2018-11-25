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
  <nav>
   <a href="MatchCompaniesAndFreeLancers.php">Match Companies And FreeLancers</a>
    <a href="HireAFreeLancer.php" >Hire A Free Lancer</a>
  </nav>
</head>

<?php
	require_once 'connect.php';

	$sql = "SELECT * FROM `Companies` "; 
	$result = mysqli_query($conn,$sql);

		$flag=0;

	while($row =mysqli_fetch_assoc($result)){  
		echo "<p align='center'> <b>Name: ".$row['Name']." , Email: ".$row['Email']." , Address: ".$row['Address']." , AccountBalance: ".$row['AccountBalance']."€ </b>  </p>";
		$flag=1;
	}
	if(!$flag)
		echo "<p align='center'> <b>Companies List is empty</b> </p>";

	?>
</body>
</html>