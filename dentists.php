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
<h2>Dentists</h2>

<!-- forms and buttons to fetch data -->
<form method="post">
  <label >(a) get details of all dentists in all clinics</label>
  <input type="submit" name="getAllDentists" value="get all dentists">
</form>

<!-- controller that fetches data and shows the result -->
<?php
if (isset($_POST['getAllDentists'])) {
    $sql = "SELECT employee.EID, firstName,lastName, clinicID FROM employee, dentist Where employee.EID = dentist.EID";
    $result = execute($sql);

    if ($result) { ?>
      <h2>Results</h2>
  
      <table>
        <thead>
          <tr>
            <th>employee id</th>
            <th>first name</th>
            <th>last name</th>
            <th>clinic id</th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($result as $row) { ?>
        <tr>
              <td><?php echo $row["EID"]; ?></td>
              <td><?php echo $row["firstName"]; ?></td>
              <td><?php echo $row["lastName"]; ?></td>
              <td><?php echo $row["clinicID"]; ?></td>
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
