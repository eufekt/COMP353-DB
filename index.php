
<?php
$dbname = "hvc353_4";
$servername = "hvc353.encs.concordia.ca";
$username = "hvc353_4";
$password = "technica";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//sql to create table

//$sql = "CREATE TABLE MyGuests (
//id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//firstname VARCHAR(30) NOT NULL,
//lastname VARCHAR(30) NOT NULL,
//email VARCHAR(50),
//reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
//)";


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

echo "connection successful";



//if ($conn->query($sql) === TRUE) {
//  echo "Table MyGuests created successfully";
//} else {
//    echo "Error creating table: " . $conn->error;
//}

$conn->close();
?>
 
