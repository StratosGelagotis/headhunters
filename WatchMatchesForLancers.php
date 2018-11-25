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

<form name="HEADING" style="text-align:center">
	<h3>Please Enter Email and Password Of your HH Account  </h3>
</form>

<form action="WatchMatchesForLancersConfirm.php" method="POST" >
                <table align="center">   
                   <tr><td align="left">*Email:</td><td><input type="email" name="Email" align="center" required/></td></tr>
                   <tr><td align="left">*Password :</td><td><input type="password" name="Password" align="center" required/></td></tr> 
                </table>				 

                <center>
                    <input type="submit" value="See Companies thay may require you " /> </br>  
                    <INPUT TYPE="reset" VALUE="Clear Values">
                </center>
        </form>   	
</html>