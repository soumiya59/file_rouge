<?php 
   include 'database_login.php';

   session_start();
   $email = $_POST['email'];
   $password= $_POST['pswd'];
   $_SESSION['email'] = $email;
   $_SESSION['pswd'] = $password;

   if($email=='somaya@gmail.com' && $password =='password'){
       header('Location:../../admin.php');
   }else{
         $sql = "SELECT * FROM users";
         $result = mysqli_query($conn,$sql);
         $users = mysqli_fetch_all($result,MYSQLI_ASSOC);
         if(!empty($users)){
               foreach($users as $user){
                  if($user['email'] == $_SESSION['email'] and $user['pswd'] == $_SESSION['pswd']){
                     $useremail= $user['email'];
                     header("Location: ../../account.php?useremail=$useremail");
                  }
               } 
               foreach($users as $user){
                  if($user['email'] != $_SESSION['email'] or $user['pswd']!= $_SESSION['pswd']){
                     $notfound = true;
                  }
               }
         }
   }

   if($notfound){
      echo '<script>alert("User not exist")</script>';
   }

?>
