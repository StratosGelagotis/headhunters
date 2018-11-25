<html>
<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">


<?php 
	require_once 'connect.php';
?>

<form name="HEADING" style="text-align:center">
	<h1><a href="index.php">Welcome to HeadHunters</a></h1>
</form>

  <nav  style="text-align:center">
	  <a href="LancersSignUp.php">Sign up as Free Lancer</a>
	  <a href="CompanySignUp.php" >Sign up as Company</a>
	  <a href="FreeLancerManage.php">FreeLancer Manage</a>
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
   
   <p align="center"><a href="AboutUs.php">About US</a></p> 

</body>
</html>
