<?php include 'database_login.php';?>

<?php
$sql= 'SELECT * FROM users';
$result = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php if(empty($users)): ?>
    <p>There is no data</p>
<?php endif; ?>

<?php echo '<h1>Users</h1>' ?>

<?php foreach($users as $user) :?>
    <div style="padding:3px 10px;border:1px solid black">
    <p><?php echo $user['id'] .' - '. $user['firstName'] .' '. $user['lastName'];?></p>
    <p><?php echo $user['email'];?></p>
    <p><?php echo $user['pswd'];?></p>
    </div>
<?php endforeach;?>

