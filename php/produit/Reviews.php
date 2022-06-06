<?php include 'database_review.php';?>

<?php
$sql= 'SELECT * FROM Reviews';
$result = mysqli_query($conn,$sql);
$reviews = mysqli_fetch_all($result,MYSQLI_ASSOC);
?>
<?php if(empty($reviews)): ?>
    <p>There is no data</p>
<?php endif; ?>

<?php echo '<h1>Reviews</h1>' ?>

<?php foreach($reviews as $review) :?>
    <div style="padding:3px 10px;border:1px solid black">
    <p><?php echo $review['nom_reviewer'] . " - ". $review['email_reviewer'];?></p>
    <p><?php echo $review['titre_comment'];?></p>
    <p><?php echo $review['txt_comment'];?></p>
    </div>
<?php endforeach;?>