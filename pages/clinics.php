<?php 
  if($readyToExecute) {
    try {
      require "../config.php";

      $connection = new PDO($dsn, $username, $password, $options);
      $statement = $connection->prepare($sql);
      $statement->execute();
      $result = $statement->fetchAll();
      $readyToExecute = false;
  
    } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
    }
  }

?>

<?php
if (isset($_POST['getAllClinics'])) {
    $sql = "SELECT * FROM hvc353_4.MyGuests";
    $readyToExecute = true;
}
?>

<?php
if (isset($_POST['getMatch'])) {
    $sql = "SELECT * FROM hvc353_4.match";
    $readyToExecute = true;
}
?>

<?php include "../templates/header.php"; ?>
<h2>Clinics</h2>

<form method="post">
  <input type="submit" name="getAllClinics" value="get all clinics">
</form>

<form method="post">
  <input type="submit" name="getMatch" value="get matche">
</form>

<?php if($result){ ?>
<div><?php echo $result; ?></div>
<?php }; ?>

<a href="/index.php">Back to home</a>
<?php include "../templates/footer.php"; ?>