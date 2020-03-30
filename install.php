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
    $connection = new PDO($dsn, $username, $password, $options);

    // $new_user = array(
    // "firstname" => $_POST['firstname'],
    // "lastname"  => $_POST['lastname'],
    // "email"     => $_POST['email'],
    // "age"       => $_POST['age'],
    // "location"  => $_POST['location']
    // );

    $sql = "INSERT INTO hvc353_4.MyGuests (id, firstname, lastname, email) values (456, 'nichita', 'hariton', 'nh@hotmail.com')";

    $connection->exec($sql);

  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
  $connection = null;


?>
