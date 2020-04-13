<?php 
  function execute($sql) {
      try {
        require "config.php";
        $connection = new PDO($dsn, $username, $password, $options);
        $statement = $connection->prepare($sql);
        $statement->execute();
        $result = $statement->fetchAll();
    
      } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
      }
      return $result;
    }
?>

<?php include "templates/header.php"; ?>
<h2>Appointments</h2>

<!-- forms and triggers -->
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

<!-- controllers and results -->
<?php
if (isset($_POST['apptsByDentist&Week'])) {
    $sql = "";
    $result = execute($sql);
    echo $result;
}

if (isset($_POST['apptsByClinicAndDate'])) {
    $sql = "";
    $result = execute($sql);
    echo $result;
}

if (isset($_POST['apptsByPatient'])) {
    $sql = "";
    $result = execute($sql);
    echo $result;
}

if (isset($_POST['patientAndMissedAppts'])) {
    $sql = "";
    $result = execute($sql);
    echo $result;
}
?>

<a href="/index.php">Back to home</a>
<?php include "/templates/footer.php"; ?>