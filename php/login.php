<?php include 'php/database.php';?>

<?php
    session_start();
   
   $email = filter_input(INPUT_POST,'txt_email',
   FILTER_SANITIZE_EMAIL);
   $password= $_POST['txt_password'];

    if($email=='somaya@gmail.com' && $password =='password'){
       $_SESSION['txt_email']=$email;
       $_SESSION['txt_password']=$password;
       echo '<h1>Welcome ' . 'Admin !' .'</h1>';
       echo '<a href="users.php">Users</a><br/>' ;
       echo '<a href="logout.php">logout</a>' ;
    } else{
       echo '<h1>Welcome Guest</h1>';
       echo '<a href="login.html">Home</a>';   
  }

?>
<!-- // Set vars to empty values
$txt_email = $txt_password = '';

if (isset($_POST['submit'])) {
  // Validate email
  if (!empty($_POST['txt_email'])) {
    $txt_email = filter_input(INPUT_POST, 'txt_email', FILTER_SANITIZE_EMAIL);
  }
  // Validate password
  if (!empty($_POST['txt_password'])) {
    $txt_password = filter_input(INPUT_POST,'txt_password',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }

   // add to database
   $sql = "INSERT INTO users (email,password) VALUES ('$txt_email', '$txt_password')";
   if (mysqli_query($conn, $sql)) {
     // success
     header('Location: users.php');
   } else {
     // error
     echo 'Error: ' . mysqli_error($conn);
   }
} -->