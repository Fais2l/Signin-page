<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Hellow world, <?php echo $_SESSION['username']; ?>!</h1>
    <p>finally you did it xf you are the best just few days and you will be better</p>

    <form action="logout.php">
    <button type="submit">Logout</button>
    </form>
</body>
</html>