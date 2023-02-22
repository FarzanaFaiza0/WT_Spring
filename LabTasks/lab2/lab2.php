<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  
<?php
// defining variables &error variables(err variables will hold err msg) and set to empty values
$NameErr =  $GenderErr = $DegreeErr = $EmailErr  =  $DOBErr = $BloodGroupErr = "";
$Name =  $Gender = $Degree = $Email = $DOB = $BloodGroup= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["Name"])) {
    $NameErr = "( Name is required)";
  } else {
    $Name = ($_POST["Name"]);
    // check if FirstName only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z'. -]*$/",$Name)) {
      $NameErr = "Invalid Name";
    }
    if (!preg_match("/^((\b[a-zA-Z]{2,40}\b)\s*){2,}$/",$Name)) {
      $NameErr = "Invalid Name";
    }
    
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
    if (empty($_POST["Email"])) {
      $EmailErr = "(Email is required)";
    } else {
      $Email= ($_POST["Email"]);
      
      if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $EmailErr = "Invalid Email Address";
      }
    }
    

  if (empty($_POST["Gender"])) {
    $GenderErr = "(Must select one)";
  } else {
    $Gender = ($_POST["Gender"]);
  }
  
  if (empty($_POST["Degree"])) {
    $DegreeErr = "(Degree is required at least two)";
  } 
  
   

  if (empty($_POST["DOB"])) {
    $DOBErr= "(DOB is required)";
  } else {
    $DOB= ($_POST["DOB"]);
  }

  if (empty($_POST["BloodGroup"])) {
    $BloodGroupErr= "(Must select any one group)";
  } else {
    $BloodGroup= ($_POST["BloodGroup"]);
  }
  
}

    ?>
  
  
    <p><span class="error">* Required fields</span></p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
     Name: <input type="text" name="Name">
    <span class="error"> * <?php echo $NameErr;?></span> 
    <br><br>

     Email: <input type="text" name="Email">
    <span class="error"> * <?php echo $EmailErr;?></span>
    <br><br>


    Gender:
    <input type="radio" name="Gender" value="Female">Female
    <input type="radio" name="Gender" value="Male">Male
    <input type="radio" name="Gender" value="Other">Other
    <span class="error">  <?php echo $GenderErr;?></span>
    <br><br>

  
    Degree: 
   <input type="checkbox" name="Degree[]" value="SSC">SSC
   <input type="checkbox" name="Degree[]" value="HSC">HSC
   <input type="checkbox" name="Degree[]" value="BSC">BSC
   <input type="checkbox" name="Degree[]" value="MSC">MSC
   <span class="error">  <?php echo $DegreeErr;?></span>
   <br><br>

    DOB: 
   <input type="date" name="DOB">
   <span class="error"> * <?php echo $DOBErr;?></span>
   <br><br>

    BloodGroup: 
    <input type="text" name="BloodGroup">
    <span class="error">  <?php echo $BloodGroupErr;?></span>
    
    <select name= "BloodGroup">
      <option></option>
      <option value="A+"> A+ </option>
      <option value="A-"> A- </option>
      <option value="B+"> B+ </option>
      <option value="B-"> B- </option>
      <option value="O+"> O+ </option>
      <option value="O-"> O- </option>
      </select>
      <br><br>

      
    <input type="submit" name="submit" value="Submit">  
   
    </form>
  
  <?php

  
  echo "<h2>Your Input:</h2>";
 
  echo $Name;
  echo "<br>";
  echo $Email;
  echo "<br>";
  echo $Gender;
  echo "<br>";

  if (isset($_POST["submit"]))
  {
    if (!empty($_POST["Degree"]))
    {
      echo '  ';
      foreach ($_POST["Degree"] as $Degree)
      {
        echo '<p>'.$Degree. '</p>';
      }
    }
  
  }
  echo "<br>";
  echo $DOB;
  echo "<br>";
  echo $BloodGroup;
  ?>
  
  </body>
  </html>
