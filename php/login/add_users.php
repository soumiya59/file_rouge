<?php include 'database_login.php';?>

<?php
// Set vars to empty values
$firstName = $lastName = $email = $pswd = '';

  // Validate input
  if (!empty($_POST['firstName'])) {
    $firstName = filter_input(INPUT_POST,'firstName',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['lastName'])) {
    $lastName = filter_input(INPUT_POST,'lastName',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['email'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  }
  if (!empty($_POST['pswd'])) {
    $pswd = filter_input(INPUT_POST,'pswd',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
  // add to database
   $sql = "INSERT INTO users (firstName,lastName,email,pswd) VALUES ('$firstName','$lastName','$email', '$pswd')";
   if (mysqli_query($conn, $sql)) {
     // success
     header('Location: ../../homepage2.html');
   } else {
     // error
     echo 'Error: ' . mysqli_error($conn);
   }


?>