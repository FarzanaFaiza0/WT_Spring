<!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// define variables and set to empty values
$FirstName = $LastName= $Gender = $Degree = $UNIVERSITY = $CreditCompleted = $DOB = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $FirstName = test_input($_POST["FirstName"]);
  $LastName = test_input($_POST["LastName"]);
  $Gender = test_input($_POST["Gender"]);
  $Degree  = test_input($_POST["Degree"]);
  $UNIVERSITY = test_input($_POST["UNIVERSITY"]);
  $CreditCompleted  = test_input($_POST["CreditCompleted"]);
  $DOB = test_input($_POST["DOB"]);
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
  <br><br>
  Last Name: <input type="text" name="LastName">
  <br><br>
  Degree: 
  <input type="radio" name="Degree" value="SSC">SSC
  <input type="radio" name="Degree" value="HSC">HSC
  <input type="radio" name="Degree" value="BSC">BSC
  <br><br>
  University: <input type="text" name="UNIVERSITY">
  <br><br>
  Credit Completed: <input type="number" name="CreditCompleted">
  <br><br>
  DOB: <input type="date" name="DOB">
  <br><br>
  
  Gender:
  <input type="radio" name="Gender" value="Female">Female
  <input type="radio" name="Gender" value="Male">Male

  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $FirstName;
echo "<br>";
echo $LastName;
echo "<br>";
echo $Degree;
echo "<br>";
echo $UNIVERSITY;
echo "<br>";
echo $CreditCompleted;
echo "<br>";
echo $DOB;
echo "<br>";
echo $Gender;
echo "<br>";

?>

</body>
</html>