<?php include 'database_login.php';?>

<?php
// Set vars to empty values
$user_first_name = $user_last_name = $user_email = $user_password = '';

  // Validate input
  if (!empty($_POST['user_first_name'])) {
    $user_first_name = filter_input(INPUT_POST,'user_first_name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['user_last_name'])) {
    $user_last_name = filter_input(INPUT_POST,'user_last_name',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['user_email'])) {
    $user_email = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
  }
  if (!empty($_POST['user_password'])) {
    $user_password = filter_input(INPUT_POST,'user_password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
  // add to database
   $sql = "INSERT INTO users (user_first_name,user_last_name,user_email,user_password) VALUES ('$user_first_name','$user_last_name','$user_email', '$user_password')";
   if (mysqli_query($conn, $sql)) {
     // success
     header('Location: ../../homepage2.html');
   } else {
     // error
     echo 'Error: ' . mysqli_error($conn);
   }


?>