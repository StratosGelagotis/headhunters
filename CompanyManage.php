<html>
<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">

<head>
	  <nav  style="text-align:center">
	  	 <a href="Index.php">Home</a>
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
</head>

<form name="HEADING" style="text-align:center">
	<h3>Fill the form to express your interest  </h3>
</form>

<form action="CompanyManageConfirm.php" method="POST" >
            <table align="center">   
              <tr><td align="left">*Companie's Email:</td><td><input type="email" value="Used as Username" name="Email" align="center" required/></td></tr>    
              <tr><td align="left">*Companie's Password :</td><td><input type="password" name="Password" align="center" required/></td></tr> 
              <tr><td align="left">*Jobs Name:</td><td><input type="text" name="JobsName" align="center" required /></td></tr>    
		      <tr><td align="left">*Required Diploma:</td><td><input type="text" name="Diploma" align="center" required /></td></tr> 
		      <tr><td align="left">*Foreign Languages:</td><td><input type="text" name="ForeignLanguages" align="center" required/></td></tr> 
		      <tr><td align="left">*Required Working Town:</td><td><input type="text" name="WorkingTown" align="center" required /></td></tr> 
		      <tr><td align="left">*Required Solary(€):</td><td><input type="number" name="Solary" align="center" required/></td></tr> 
		      <tr><td align="left">*Required Working Scedule(hours):</td><td><input type="number" name="WorkingScedule" align="center" required /></td></tr><tr><td align="left">
		      <tr><td align="left">Dates Availabe:</td><td><input type="date" name="Date" align="center"  value="Y/M/D H/M/S Or empty"/></td></tr>
		      	 <TR>
		        <TD class = "select" >*Profession 
		       
		      <select name="Professions[]" size="5" multiple="multiple" tabindex="1" required>
			        <option value="Chef">Chef</option>
			        <option value="Musician">Musician</option>
			        <option value="Teacher">Teacher</option>
			        <option value="Trainer">Trainer</option>
			        <option value="ComputerScience">ComputerScience</option>
			        <option value="Physicist">Physicist</option>
			        <option value="Pilot">Pilot</option>
			        <option value="Captain">Captain</option>
			        <option value="Photographer">Photographer</option>
			        <option value="Priest">Priest</option>
			        <option value="Doctor">Doctor</option>
			    </select>
			 <TD ALIGN="center"></TD>
		        </TD>   
		    </TR> 
		     <TR>
		        <TD class = "select" >*Extra Skills 

		     <select name="ExtraSkills[]" size="5" multiple="multiple" tabindex="1" required>
			        <option value="CoffeMaker">CoffeMaker</option>
			        <option value="Cleaner">Cleaner</option>
			        <option value="Driver">Driver</option>
			        <option value="Baker">Baker</option>
			        <option value="Director">Director</option>
			        <option value="ECDL">ECDL</option>
			        <option value="Sports">Sports</option>
			        <option value="WineTester">WineTester</option>
			        <option value="Camper">Camper</option>
			        <option value="Secretary">Secretary</option>
			        <option value="ITAssistance">ITAssistance</option>
			        <option value="FirstAidKnowledge">FirstAidKnowledge</option>
			        <option value="LamberJacks">LamberJack</option>

			    </select>
			 <TD ALIGN="center"></TD>
		        </TD>   
		    </TR> 

                </table>				 
                		<center>
                        <input type="submit" value="Publish Job Opening(Normal Cost:20€)"/></br>  
                        <INPUT TYPE="reset" VALUE="Clear Values">
                      </center>
            </form>    
</body>
</html>