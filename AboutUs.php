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
 <nav  style="text-align:center">
	  <a href="WatchMatchesForLancers.php">Watch Matches For Lancers</a>
	  <a href="WatchMatchesForCompanies.php" >Watch Matches For Companies</a>
  </nav>
   <nav  style="text-align:center">
    <a href="MatchCompaniesAndFreeLancers.php">Match Companies And FreeLancers</a>
    <a href="HireAFreeLancer.php" >Hire A Free Lancer</a>
  </nav>
</head>

<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">

 <form name="HEADING" style="text-align:center">
	<h1>About Us</h1>
</form>

<?php 
	require_once 'connect.php';

	$sql = "SELECT * FROM `HeadHunters`";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result) ;

	echo " <b>Company's name: </b>".$row['Name']." <b>Address:</b> ".$row['Address']." <b>AccountNumber:</b> ".$row['AccountNumber']." <b>Email:</b> ".$row['Email']." <b>AccountBalance:</b> ".$row['AccountBalance']." <b>€ NumOfProvidedJobs:</b> ".$row['NumOfProvidedJobs']." <b>NumOfWantedJobs: </b>".$row['NumOfWantedJobs']. " <p> <b>Owners: </b> Xristiana Thliberi , Stratos V-strorm Gelagotis , Zaridakis Alexandros</p>";
?>
</body>
</html>