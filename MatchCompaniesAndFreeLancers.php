<html>
<body>
 <link rel="stylesheet" type="text/css" href="indexcss.css">
  <nav  style="text-align:center">
    <a href="index.php">Home</a>
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
  <?php //matching dates,professions,extra skills,jobs name
  		require_once'connect.php';  	
  	 
      $sqlqqqq = "SELECT * FROM `JobsProvidedByFreelancers`  "; 
      $resultaaaa = mysqli_query($conn,$sqlqqqq);
      $flag = 0 ;
      while($row = mysqli_fetch_assoc($resultaaaa)){       
          $cprofs = array();
          $cskills = array();   
          $profs = array();
          $skills = array();

          $mail2 = $row['Email'];
          $ProvDate = $row['Date'];
          $jobsName = $row['JobsName'];
          
          $last = "SELECT * FROM `Professions`
                   WHERE `Email` = '$mail2' ";
          $lastres = mysqli_query($conn,$last);
      
          $last2 = "SELECT * FROM `ExtraSkills`
                    WHERE `Email` = '$mail2' ";
          $lastres2 = mysqli_query($conn,$last2);

           unset($profs);
            $profs = array();
      while($reslast = mysqli_fetch_assoc($lastres)){  //storing profs and skills of this job
            $prof = $reslast['Profession'];                     
            array_push($profs, $prof);
        }
           unset($skills);
           $skills = array();
      while($reslast2 = mysqli_fetch_assoc($lastres2)){
           $xskills = $reslast2['ExtraSkills'];                    
           array_push($skills, $xskills);
        }

        //now checking the wanted list 
        $sql = "SELECT * FROM `JobsRequestedByCompanies`  "; 
        $result = mysqli_query($conn,$sql);

      while($row2 = mysqli_fetch_assoc($result)){        
           $cprofs = array();
           $cskills = array();            
           $mail = $row2['Email'];
           $jobID = $row2['NumOfJobs'];
           $WantedDate = $row2['dates'];
           $jobsName2 = $row2['JobsName'];

          $last11 = "SELECT * FROM `CProfessions`
                 WHERE `Email` = '$mail' AND `NumOfJobs` = '$jobID' ";
          $lastres11 = mysqli_query($conn,$last11);
    
          $last222 = "SELECT * FROM `CExtraSkills`
                 WHERE `Email` = '$mail' AND `NumOfJobs` = '$jobID' ";
          $lastres222 = mysqli_query($conn,$last222);           

            unset($cprofs) ;
            $cprofs = array();
         while($reslast11 = mysqli_fetch_assoc($lastres11)){  //storing profs and skills of this job          
            $prof22 = $reslast11['CProfessions'];            
            array_push($cprofs, $prof22);
            }
             unset($cskills);
           $cskills = array();
        while($reslast211 = mysqli_fetch_assoc($lastres222)){
           $xskills22 = $reslast211['CExtraSkills'];
           array_push($cskills, $xskills22);
        }

        if($jobsName2===$jobsName && sizeof($cprofs)===sizeof($profs) &&
          sizeof($cskills)===sizeof($skills) &&
          (is_array($cprofs) && is_array($profs) && 
          array_diff($cprofs, $profs) === array_diff($profs, $cprofs))&&
          (is_array($cskills) && is_array($skills) && 
          array_diff($cskills, $skills) === array_diff($skills, $cskills)) &&
          $ProvDate <= $WantedDate
        ){
          echo "<b> Job Matching: JobsNames: </b> ".$jobsName2." <b>FROM:</b> ".$mail." <b> with Free
          Lancer: </b>".$mail2."<b> according to professions ,extra skills and date </b><br><br>";
          $flag=1;
        }
          
      }//while of the wanted jobs

    } // while of the provided jobs

    if(!$flag)
     echo "<p align='center'> <b>Zero Matched Jobs Found this time. </b> </p>";
  ?>

</body>
</html>
	