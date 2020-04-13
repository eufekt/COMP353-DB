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

<!-- forms and buttons to fetch data -->
<form method="post">
  <input type="submit" name="getAllClinics" value="get all clinics">
</form>

<!-- controller that fetches data and shows the result -->
<?php
if (isset($_POST['getAllClinics'])) {
    $sql = "SELECT * FROM hvc353_4.clinic";
    $result = execute($sql);
    echo $result;

    if ($result && $statement->rowCount() > 0) { ?>
      <h2>Results</h2>
  
      <table>
        <thead>
          <tr>
            <th>clinic id</th>
            <th>name</th>
            <th>address</th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($result as $row) { ?>
        <tr>
              <td><?php echo $row["CID"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["address"]; ?></td>
        </tr>
      <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
      > No results found for.
    <?php }
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
