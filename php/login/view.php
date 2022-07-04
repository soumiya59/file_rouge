<html>
<head>
    <title>View Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    
    <div class="container mt-5 ">
        <div style="display: flex; justify-content:space-between;margin-top:1rem;">
           <h3>USERS</h3>
           <h3>
           <a href="create.php" target="_blank" style="padding-top: 2rem;">Create user</a>
           </h3>
        </div>

    <table class="table mt-4">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>    
        <?php 
        include "DAO.php";
        echo DAO::view("users");
        ?>             
    
    </table>
    </div> 

</body>

</html>