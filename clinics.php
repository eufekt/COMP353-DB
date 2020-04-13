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
<h2>Clinics</h2>

<form method="post">
  <input type="submit" name="getAllClinics" value="get all clinics">
</form>

<form method="post">
  <input type="submit" name="getMatch" value="get matche">
</form>

<?php
if (isset($_POST['getAllClinics'])) {
    $sql = "SELECT * FROM hvc353_4.MyGuests";
    $result = execute($sql);
    echo $result;
}
?>

<?php
if (isset($_POST['getMatch'])) {
    $sql = "SELECT * FROM hvc353_4.match";
    $result = execute($sql);
    echo $result;
}
?>


<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
