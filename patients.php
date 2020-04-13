<?php
if (isset($_POST['getAllPatients'])) {
    $selected = 'getAllPatients';
    //execute queries
}

if (isset($_POST['getAllPatientsAndMissedApp'])) {
    $selected = 'getAllPatientsAndMissedApp';
    //execute queries
}
?>

<?php include "templates/header.php"; ?>
<h2>Patients</h2>

<form method="post">
  <input type="submit" name="getAllPatients" value="get all patients">
</form>

<form method="post">
  <input type="submit" name="getAllPatientsAndMissedApp" value="get all patients and missed appointments">
</form>


<?php if($selected){ ?>
<h3><?php echo $selected; ?></h3>
<?php }; ?>

<h2>Results will be here at the bottom once you click submit</h2>

<a href="/index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
