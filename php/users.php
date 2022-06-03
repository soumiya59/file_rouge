<?php include 'database.php';?>

<?php
$sql= 'SELECT * FROM login';
$result = mysqli_query($conn,$sql);
$login = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

<?php if(empty($login)): ?>
    <p>There is no data</p>
<?php endif; ?>


<?php foreach($login as $user) :?>
    <div style="padding:8px;border:1px solid black">
    <p><?php echo $user['email'];?></p>
    <p><?php echo $user['password'];?></p>
    <p> at : <?php echo $user['date'];?></p>
    </div>
<?php endforeach;?>

