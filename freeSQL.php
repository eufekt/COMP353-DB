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
<h2>DBA mySQL execution</h2>

<!-- forms and triggers -->
<form method="post">
  <label >Get all patients</label>
  <textarea name="query"></textarea>
  <input type="submit" name="submitSql" value="submit">
</form>

<!-- controller to fetch data and render result -->
<?php
if (isset($_POST['submitSql'])) {
  $sql = $_POST['query'];
  $result = execute($sql);
  echo "query executed";

  if($result) { 
    echo $result;
  }
}
?>

<a href="/index.php">Back to home</a>
<?php include "templates/footer.php"; ?>
