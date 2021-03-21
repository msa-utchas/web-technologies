<?php
session_start();

include('../control/updatecheck.php');


if (empty($_SESSION["username"])) // Destroying All Sessions
{
  header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>

<body>
  <h2>Profile Page</h2>

  Hii, <h3><?php echo $_SESSION["username"]; ?></h3>
  <br>Your Profile Page.
  <br><br>
  <?php
  $radio1 = $radio2 = $radio3 = "";
  $cbox1 = $cbox2 = $cbox3 = "";
  $firstname = $password = $email = $gender = $address = $dob = $profession = $interests = "";
  $connection = new db();
  $conobj = $connection->OpenCon();

  $userQuery = $connection->CheckUserData($conobj, "student", $_SESSION["username"]);

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while ($row = $userQuery->fetch_assoc()) {
      $firstname = $row["firstname"];
      $email = $row["email"];
      $password = $row["password"];
      $address = $row["address"];
      $profession = $row["profession"];
      // $dob=$row["dob"];
      $datetime = strtotime($row["dob"]);
      $formateddate = date("Y-m-d", $datetime);


      $gender = $row["gender"];
      $profession = $row["profession"];
      $interests = $row["interests"];


      if ($row["gender"] == "female") {
        $radio1 = "checked";
      } else if ($row["gender"] == "male") {
        $radio2 = "checked";
      } else {
        $radio3 = "checked";
      }
      if ($row["interests"] == "music") {
        $cbox1 = "checked";
      }
      if ($row["interests"] == "sports") {
        $cbox2 = "checked";
      }
      if ($row["interests"] == "gardening") {
        $cbox3 = "checked";
      }
    }
  } else {
    echo "0 results";
  }



  ?>
  <form action='' method='post'>
    firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>">
    <br>
    email : <input type='text' name='email' value="<?php echo $email; ?>">
    <br>
    password : <input type='text' name='password' value="<?php echo $password; ?>">
    <br>
    address : <input type='text' name='address' value="<?php echo $address; ?>">
    <br>
    date of birth : <input type='date' name='dob' value="<?php echo $formateddate; ?>">
    <br>
    <!-- profession : <input type='text' name='profession' value="<?php echo $profession; ?>"> -->
    <br>
    <!-- interests : <input type='text' name='interests' value="<?php echo $interests; ?>"> -->
    <br>
    Gender:
    <input type='radio' name='gender' value='female' <?php echo $radio1; ?>>Female
    <input type='radio' name='gender' value='male' <?php echo $radio2; ?>>Male
    <input type='radio' name='gender' value='other' <?php echo $radio3; ?>> Other
    <br>
    profession :
    <br>
    <input name="profession" list="profession" value="<?php echo $profession; ?>">

    <datalist id="profession">
      <option value="Student">
      <option value="Teacher">
      <option value="security">

    </datalist>

    <br>

    <!-- checkbok -->
    <br>
    interests:
    <br>
    <input type="checkbox"  name="interests" value="music" <?php echo $cbox1; ?>>
    <label for="interests">music</label><br>
    <input type="checkbox" name="interests" value="sports" <?php echo $cbox2; ?>>
    <label for="interests">sports</label><br>
    <input type="checkbox" name="interests" value="gardening" <?php echo $cbox3; ?>>
    <label for="interests">gardening</label><br>

    <!-- checkbok -->




    <input name='update' type='submit' value='Update'>
    <br>
    <h3><?php echo $error; ?></h3>
    
    <br>

    <a href="../view/pageone.php">Back </a>

    <a href="../control/logout.php"> logout</a>

</body>

</html>