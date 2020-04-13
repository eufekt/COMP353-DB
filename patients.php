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
  $sql = "SELECT * FROM hvc353_4.patientAccount";
  $result = execute($sql);
  if($result) { ?>
  <table>
    <thead>
      <tr>
          <th>PID</th>
          <th>firstName</th>
          <th>lastName</th>
          <th>address</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($result as $row) { ?>
    <tr>
          <td><?php echo $row["PID"]; ?></td>
          <td><?php echo $row["firstName"]; ?></td>
          <td><?php echo $row["lastName"]; ?></td>
          <td><?php echo $row["address"]; ?></td>
    </tr>
  <?php } ?>
    </tbody>
</table>
  <?php }
} ?>

<?php
if (isset($_POST['getAllPatientsAndMissedApp'])) {
   $sql = sprintf("SELECT AID, COUNT(*) as count
   FROM appointment
   WHERE wasMissed = 1
   GROUP BY AID
   HAVING count > 0");
    $result = execute($sql);
    if($result) { ?>
    <table>
      <thead>
        <tr>
            <th>AID</th>
            <th>count</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($result as $row) { ?>
      <tr>
            <td><?php echo $row["AID"]; ?></td>
            <td><?php echo $row["count"]; ?></td>
      </tr>
    <?php } ?>
      </tbody>
  </table>
    <?php }
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
