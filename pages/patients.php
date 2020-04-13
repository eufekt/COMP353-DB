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

<label for="1">Create a new patient</label>
<form id="1" method="post">
    <div class="input">
        <label for="dentistId">dentist id</label>
        <input type="text" name="dentistId" id="dentistId" />
    </div>
    <div class="input">
        <label for="week">week</label>
        <input type="text" name="week" id="week" />
    </div>
    <input class="submit" type="submit" name="apptsByDentist&Week" value="submit">
</form>

<?php if($selected){ ?>
<h3><?php echo $selected; ?></h3>
<?php }; ?>

<a href="/index.php">Back to home</a>

<?php include "templates/footer.php"; ?>
