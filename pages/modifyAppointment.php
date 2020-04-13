<?php
if (isset($_POST['getAllClinics'])) {
    $selected = 'getAllClinics';
    //execute queries
}
?>

<?php include "../templates/header.php"; ?>
<h2>Modify Appointment</h2>


<?php if($selected){ ?>

<h3><?php echo $selected; ?></h3>
<?php }; ?>

<h2>Results will be here at the bottom once you click submit</h2>

<a href="/index.php">Back to home</a>
<?php include "../templates/footer.php"; ?>

