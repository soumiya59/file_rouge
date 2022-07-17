<?php
    include "./php/login/DAO.php";
    $email = $_GET['useremail'];
    $info = DAO::userinfo("users",$email);
    $firstname = $info[0];
    $lastname = $info[1];
    $email = $info[2];
    $pswd = $info[3];
    $id = $info[4];
?>
<html>
   <head>
        <title>Account</title>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="icon" href="img/icon.jpg" type="image/x-icon" />
        <script>
        $(function(){
               $("#header").load("./include/Header.html");
               $("#footer").load("./include/Footer.html");
        });
        </script>
        <style>
            table{
                border: 1px solid gray;
            }
            tr{
                padding: 2rem;
            }
        </style>

   </head>

    <body>

        <div id="header"></div>

        <div class="container my-4 ban " style="min-height:700px ;">
        <h2 class="fw-bold">Bonjour <?php echo $firstname ?> </h2>
        <form action="" method="POST" class="row mt-4">
        <div class="col-4 py-4 text-center">
            <button class="border-0 bg-light py-2 mb-2 fs-5" id="profile" name="Profile">Profile</button><br>
            <button class="border-0 bg-light py-2 mb-2 fs-5" id="orders" name="Orders">Orders</button><br>
            <button class="border-0 bg-light py-2 mb-2 fs-5 " id="wishlist" name="Wishlist">Wishlist</button><br>
            <button class="border-0 bg-light py-2 mb-2 fs-5 " id="logout" name="logout">logout</button>
        </div>
        <div class="col ps-4 pt-4" style="border-left: 1px solid grey;">
                <?php
                    if(isset($_POST['Profile'])){
                        echo '<table class="w-100 fs-5 " >
                            <tr>
                              <td class="py-3 ps-3 fw-bold">First Name: </td><td class="fw-light">'.$firstname.'</td>
                            </tr>

                            <tr>
                            <td class="py-3 ps-3 fw-bold">Last Name: </td><td class="fw-light">'.$lastname.'</td>
                            </tr>

                            <tr>
                            <td class="py-3 ps-3 fw-bold"> Email: </td><td class="fw-light">'.$email.'</td>
                            </tr>

                            <tr>
                            <td class="py-3 ps-3 fw-bold"> Password: </td><td class="fw-light">'.$pswd.'</td>
                            </tr>
                            <tr>
                            <td></td>
                            <td class="py-3 ps-3"><a href="./php/login/update.php?id='.$id.'" class="red float-end pe-4">Modifier</a>  </td>
                            </tr>
                            </table>' ;
                        echo '<script>document.querySelector("#profile").style.color= "#9e121b";
                            document.querySelector("#profile").style.fontWeight= "bold"
                            </script>';
                    }
                    if(isset($_POST['Orders'])){
                        echo '<h5>You have no orders yet</h5>';
                        echo '<script>document.querySelector("#orders").style.color= "#9e121b";
                        document.querySelector("#orders").style.fontWeight= "bold"
                        </script>';
                    }
                    if(isset($_POST['Wishlist'])){
                        echo '<h5>Your wishlist is empty</h5>';
                        echo '<script>document.querySelector("#wishlist").style.color= "#9e121b";
                        document.querySelector("#wishlist").style.fontWeight= "bold"
                        </script>';
                    }
                    if(isset($_POST['logout'])){
                        header('location:./php/login/logout.php');
                    }
                ?>
        </div>
        </form>
        </div>

        <div id="footer"></div>




    </body>

</html>