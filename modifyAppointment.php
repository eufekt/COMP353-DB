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
<h2>Modify Appointment</h2>

<!-- form -->
<form method="post">
    <div class="input">
        <label for="appointmentId">appointment id</label>
        <input type="text" name="appointmentId" id="appointmentId" />
    </div>
    <div class="input">
        <label for="patientId">patient id</label>
        <input type="text" name="patientId" id="patientId" />
    </div>
    <div class="input">
        <label for="from">from</label>
        <input type="date" name="from" id="from" />
    </div>
    <div class="input">
        <label for="to">to</label>
        <input type="date" name="to" id="to" />
    </div>
    <div class="input">
        <label for="recorderBy">recorded by</label>
        <input type="text" name="recordedBy" id="recordedBy" />
    </div>
    <div class="input">
        <label for="supervisorId">supervisor id</label>
        <input type="text" name="supervisorId" id="supervisorId" />
    </div>
    <input type="submit" name="modifyAppointment" value="modify">
</form>

<?php
if (isset($_POST['modifyAppointment'])) {
    $sql = "";
    $result = execute($sql);
    echo $result;
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>

