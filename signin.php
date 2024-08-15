<?php
// Start the session
session_start();

// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'signin');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conpassword = $_POST['conpassword'];

    // Simple validation
    if ($password == $conpassword) {
        // Hash the password before saving it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the data into the `sigin` table
        $sql = "INSERT INTO signin (username, email, password, conpassword) VALUES ('$username', '$email', '$hashed_password', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to the home page after successful registration
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>