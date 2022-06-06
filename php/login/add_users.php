<?php include 'database_login.php';?>

<?php
// Set vars to empty values
$user_email = $user_password = '';

  // Validate input
  if (!empty($_POST['user_email'])) {
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
  }
  if (!empty($_POST['user_password'])) {
    $user_password = filter_input(INPUT_POST,'user_password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
  // add to database
   $sql = "INSERT INTO users (user_email,user_password) VALUES ('$user_email', '$user_password')";
   if (mysqli_query($conn, $sql)) {
     // success
     header('Location: users.php');
   } else {
     // error
     echo 'Error: ' . mysqli_error($conn);
   }


?>