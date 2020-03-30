<?php

require "./config.php";

    try {
    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "INSERT INTO hvc353_4.MyGuests (id, firstname, lastname, email) values (756, 'nichita', 'hariton', 'nh@hotmail.com')";

    $connection->exec($sql);

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
  $connection = null;


?>
