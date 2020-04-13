<?php
if (isset($_POST['createPatient'])) {
    $selected = 'getAllClinics';
    //execute queries
}
?>

<?php include "templates/header.php"; ?>
<h2>Create Patient</h2>

<form method="post">
    <div class="input">
        <label for="patient id">patient id</label>
        <input type="text" name="patient id" id="patient id" />
    </div>
    <div class="input">
        <label for="firstName">first name</label>
        <input type="text" name="firstName" id="firstName" />
    </div>
    <div class="input">
        <label for="lastName">last name</label>
        <input type="text" name="lastName" id="lastName" />
    </div>
    <div class="input">
        <label for="address">address</label>
        <input type="text" name="address" id="address" />
    </div>
    <input type="submit" name="createPatient" value="submit">
</form>

<?php if($selected){ ?>
<h3><?php echo $selected; ?></h3>
<?php }; ?>
<h2>Results will be here at the bottom once you click submit</h2>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
