<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password)
    {
          // Insert data into database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password');";

    if ($conn->query($sql) === TRUE) 
    {
        echo "New record created successfully";
        exit();
    } 
    else
     {
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }
    } 
    else
    {
        echo "Password and Confirm Password doesn't match!!!";
        echo "<br>Error putting the entry";

    } 
}

// Close database connection
$conn->close();
?>
