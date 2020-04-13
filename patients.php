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
<h2>Patients</h2>

<!-- forms and triggers -->
<form method="post">
  <label >Get all patients</label>
  <input type="submit" name="getAllPatients" value="get all patients">
</form>

<form method="post">
  <label >(e) Get all patients with at least 1 missed appointement</label>
  <input type="submit" name="getAllPatientsAndMissedApp" value="get ">
</form>

<!-- controller to fetch data and render result -->
<?php
if (isset($_POST['getAllPatients'])) {
  $sql = "SELECT * FROM hvc353_4.patients";
  $result = execute($sql);
  echo $result;
}

if (isset($_POST['getAllPatientsAndMissedApp'])) {
  $sql = "getAllPatients and their missed App";
  $result = execute($sql);
  echo $result;
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
