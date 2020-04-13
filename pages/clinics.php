<?php
if (isset($_POST['getAllClinics'])) {
    $selected = 'getAllClinics';
    //execute queries
}
?>

<?php include "templates/header.php"; ?>
<h2>Clinics</h2>

<form method="post">
  <input type="submit" name="getAllClinics" value="get all clinics">
</form>

<?php if($selected){ ?>
<h3><?php echo $selected; ?></h3>
<?php }; ?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
