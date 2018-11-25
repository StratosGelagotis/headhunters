<html>
<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">

<head>
	  <nav  style="text-align:center">
		  <a href="index.php">Home</a>
		  <a href="FreeLancerManage.php">FreeLancer Manage</a>
		  <a href="CompanySignUp.php" >Sign up as Company</a>
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
	<h2>Fill the form to complete your registration</h2>
</form>

<form action="LancersSignUpConfirm.php" method="POST" >
                <table align="center">   
                   <tr><td align="left">*First Name:</td><td><input type="text" name="FirstName" align="center" required  /></td> </tr> 
                   <tr><td align="left">*Last Name:  </td><td><input type="text" name ="LastName" align="center" required/></td></tr> 
                   <tr><td align="left">*Address:  </td><td><input type="text" name ="Address" align="center" required/></td></tr> 
                   <tr><td align="left">*Password :</td><td><input type="password" name="Password" align="center" required/></td></tr> 
                   <tr><td align="left">*Email:</td><td><input type="email" name="Email" align="center" required/></td></tr>    
                   <tr><td align="left">*Phone Number:</td><td><input type="text" name="PhoneNumber" align="center" required/></td></tr> 
                   <tr><td align="left">*Bank Account Number: </td><td><input type="text" name ="AccountNumber" align="center" required/></td><tr>   
                   <tr><td align="left">*Credit Card Info:</td><td><input type="text" name="CreditCard" align="center" required/></td></tr> 		
                   <tr><td align="left">*AccountBalance:</td><td><input type="text" name="AccountBalance" align="center" required/></td></tr>     
                </table>				 		
                		<center>
                        <input type="submit" value="Free Lancer Registration(Cost:20€)"  />    </br>  
                        <INPUT TYPE="reset" VALUE="Clear Values">
                      </center>
            </form>    
 </body>
 </html>