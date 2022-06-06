<?php include 'database_review.php';?>

<?php
// Set vars to empty values
$nom_reviewer = $email_reviewer = $titre_comment = $txt_comment = '';

  // Validate input
  if (!empty($_POST['nom_reviewer'])) {
    $nom_reviewer = filter_input(INPUT_POST, 'nom_reviewer', FILTER_SANITIZE_EMAIL);
  }
  if (!empty($_POST['email_reviewer'])) {
    $email_reviewer = filter_input(INPUT_POST,'email_reviewer',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['titre_comment'])) {
    $titre_comment = filter_input(INPUT_POST,'titre_comment',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  if (!empty($_POST['txt_comment'])) {
    $txt_comment = filter_input(INPUT_POST,'txt_comment',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  }
  
   // add to database
   $sql = "INSERT INTO Reviews (nom_reviewer,email_reviewer,titre_comment,txt_comment) VALUES ('$nom_reviewer', '$email_reviewer', '$titre_comment', '$txt_comment')";
   if (mysqli_query($conn, $sql)) {
     // success
     header('Location: ../../ficheprod.html');
    //  header('Location: Reviews.php');
   } else {
     // error
     echo 'Error: ' . mysqli_error($conn);
   }


?>