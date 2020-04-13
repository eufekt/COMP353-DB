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
<h2>Create Patient</h2>

<form method="post">
    <div class="input">
        <label for="patient id">patient id</label>
        <input type="text" name="patientId" id="patient id" />
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

<?php
if (isset($_POST['createPatient'])) {
    $sql = sprintf("INSERT INTO patientAccount (PID, firstName, lastName, address)
    VALUES(%s, '%s', '%s', '%s')", $_POST['patientId'],$_POST['firstName'],$_POST['lastName'], $_POST['address']);
    $result = execute($sql);
    echo sprintf("new patient with id %s created", $_POST['patientId']);
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
