<?php
$servername = "localhost";
$username = "root";
$password = "W7301@jqir#"; // Your database password
$dbname = "mydatabase"; // Your database name
$port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    var_dump($_POST);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password for security

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password for security 
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)"); 
    $stmt->bind_param("sss", $username, $email, $password); 

    if ($stmt->execute()) { 
        echo "Data saved successfully";
     } else { 
        echo "Error: " . $stmt->error;
     } 
     $stmt->close();
    }

$conn->close();
?>
