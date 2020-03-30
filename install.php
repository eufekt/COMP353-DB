<?php

$host       = "hvc353.encs.concordia.ca";
$username   = "hvc353_4";
$password   = "technica";
$dbname     = "hvc353_4"; // will use later
$dsn        = "mysql:host=$host;dbname=$dbname"; // will use later
$options    = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
              );

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    // $sql = file_get_contents("data/init.sql");
    // $connection->exec($sql);
   
    echo "Database and table users created successfully.";

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }

?>
