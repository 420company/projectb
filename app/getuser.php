<?php

error_reporting(E_ERROR);

session_start(); // Starting Session




include 'config.php';


/* mysql table structure
CREATE TABLE Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
pass VARCHAR(30) NOT NULL
)   
*/
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["username"] == $username ) {
            /*echo $row["username"];*/
            header("Location: ../admin/dashboard.html");
        }
        if ($row["pass"] == $password) {
            header("Location: ../admin/dashboard.html");
        }
       
        /*echo "id: " . $row["id"]. " - Username: " . $row["username"]. " " . $row["email"]. "<br>";*/
    }
    
    }
     if ($row["pass"] !== $password) {
            echo "WRONG PASSWORD OR USER NAME";
        
} else {
    echo "0 results";
}

$conn->close();

?>