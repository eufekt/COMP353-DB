<?php
if (isset($_POST['getAllClinics'])) {
    $result = 'getAllClinics';
    //execute queries
}

if (isset($_POST['getOther'])) {
    $result = 'getOther';
    //execute queries
}
?>

<?php include "../templates/header.php"; ?>
<h2>Appointments</h2>


<label for="1">Get appointments for a given <b>dentist</b> for a specific <b>week</b></label>
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



<label for="2">Get appointments in a <b>clinic</b> by <b>date</b></label>
<form id="2" method="post">
    <div class="input">
        <label for="clinicId">clinic id</label>
        <input type="text" name="clinicId" id="clinicId" />
    </div>
    <div class="input">
        <label for="date">date</label>
        <input type="text" name="date" id="date" />
    </div>
    <input type="submit" name="apptsByClinicAndDate" value="submit">
</form>



<label for="3">Get appointments for a <b>patient</b></label>
<form id="3" method="post">
    <div class="input">
        <label for="patientId">patient id</label>
        <input type="text" name="patientId" id="patientId" />
    </div>
    <input type="submit" name="apptsByPatient" value="submit">
</form>

<label for="4">Get patients and their missed appointments </label>
<form id="4" method="post">
    <input type="submit" name="patientAndMissedAppts" value="submit">
</form>


<?php if($selected){ ?>
<h3><?php echo $selected; ?></h3>
<?php }; ?>

<h2>Results will be here at the bottom once you click submit</h2>

<a href="/index.php">Back to home</a>
<?php include "../templates/footer.php"; ?>