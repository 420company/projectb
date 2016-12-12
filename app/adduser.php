<?php

include 'config.php';


$username = $_POST["username"];
$email = $_POST["email"];

$options = [
    'cost' => 12,
];

$password = password_hash ($_POST["password"] , PASSWORD_BCRYPT , $options);
var_dump($username);
var_dump($email);
var_dump($password);


/* mysql table structure
CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
pass VARCHAR(30) NOT NULL
)   
*/


$sql = "INSERT INTO Users (username, email, pass)
VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>