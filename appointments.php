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
<label for="1">(b) Get appointments for a given <b>dentist</b> for a specific <b>week</b></label>
<form id="1" method="post">
    <label for="dentistId">dentist id</label>
    <input type="text" name="dentistId" id="dentistId" />
    <label for="week">week</label>
    <input type="text" name="week" id="week" />
    <input class="submit" type="submit" name="apptsByDentist&Week" value="get">
</form>


<label for="2">(c) Get appointments in a <b>clinic</b> by <b>date</b></label>
<form id="2" method="post">
    <label for="clinicId">clinic id</label>
    <input type="text" name="clinicId" id="clinicId" />
    <label for="date">date</label>
    <input type="text" name="date" id="date" />
    <input type="submit" name="apptsByClinicAndDate" value="get">
</form>


<label for="3">(d) Get appointments for a <b>patient</b></label>
<form id="3" method="post">
    <label for="patientId">patient id</label>
    <input type="text" name="patientId" id="patientId" />
    <input type="submit" name="apptsByPatient" value="get">
</form>


<label for="4">Get patients and their missed appointments </label>
<form id="4" method="post">
    <input type="submit" name="patientAndMissedAppts" value="get">
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