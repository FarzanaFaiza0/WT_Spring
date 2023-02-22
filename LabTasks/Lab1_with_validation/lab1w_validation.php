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
$FirstNameErr = $LastNameErr= $GenderErr = $DegreeErr = $UNIVERSITYErr = $CreditCompletedErr = $DOBErr = "";
$FirstName = $LastName= $Gender = $Degree = $UNIVERSITY = $CreditCompleted = $DOB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["FirstName"])) {
    $FirstNameErr = "(First Name is required)";
  } else {
    $FirstName = test_input($_POST["FirstName"]);
    // check if FirstName only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$FirstName)) {
      $FirstNameErr = "Only letters and white space allowed";
    }
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
    if (empty($_POST["LastName"])) {
      $LastNameErr = "(Last Name is required)";
    } else {
      $LastName = test_input($_POST["LastName"]);
      // check if LastName only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$LastName)) {
        $LastNameErr = "Only letters and white space allowed";
      }
    }


  if (empty($_POST["Gender"])) {
    $GenderErr = "(Gender is required)";
  } else {
    $Gender = test_input($_POST["Gender"]);
  }
  
  if (empty($_POST["Degree"])) {
    $DegreeErr = "(Degree is required)";
  } else {
    $Degree = test_input($_POST["Degree"]);
  }

  if (empty($_POST["UNIVERSITY"])) {
    $UNIVERSITYErr = "(UNIVERSITY is required)";
  } else {
    $UNIVERSITY = test_input($_POST["UNIVERSITY"]);
  }
  if (empty($_POST["CreditCompleted"])) {
    $CreditCompletedErr= "(Completed Credit is required)";
  } else {
    $CreditCompleted= test_input($_POST["CreditCompleted"]);
  }

  if (empty($_POST["DOB"])) {
    $DOBErr= "(DOB is required)";
  } else {
    $DOB= test_input($_POST["DOB"]);
  }

}

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
    ?>
  
  
  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    First Name: <input type="text" name="FirstName">
    <span class="error">  <?php echo $FirstNameErr;?></span> 
    <br><br>

    Last Name: <input type="text" name="LastName">
    <span class="error">  <?php echo $LastNameErr;?></span>
    <br><br>

    University: <input type="text" name="UNIVERSITY">
    <span class="error">  <?php echo $UNIVERSITYErr;?></span>
    <br><br>

    Credit Completed: <input type="number" name="CreditCompleted">
    <span class="error">  <?php echo $CreditCompletedErr;?></span>
    <br><br>

    Gender:
    <input type="radio" name="Gender" value="Female">Female
    <input type="radio" name="Gender" value="Male">Male
    <span class="error">  <?php echo $GenderErr;?></span>
    <br><br>

  
  
    Degree: 
   <input type="checkbox" name="Degree" value="SSC">SSC
   <input type="checkbox" name="Degree" value="HSC">HSC
   <input type="checkbox" name="Degree" value="BSC">BSC
   <span class="checkbox">  <?php echo $DegreeErr;?></span>
   <br><br>

    DOB: 
   <input type="date" name="DOB" value="1953-01-01" min="1953-01-01" max="1998-12-31">
   <span class="error">  <?php echo $DOBErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit">  
   </form>
  
  <?php
  echo "<h2>Your Input:</h2>";
  echo $FirstName;
  echo "<br>";
  echo $LastName;
  echo "<br>";
  echo $UNIVERSITY;
  echo "<br>";
  echo $CreditCompleted;
  echo "<br>";
  echo $Gender;
  echo "<br>";
  echo $Degree;
  echo "<br>";
  echo $DOB;
  ?>
  
  </body>
  </html>
