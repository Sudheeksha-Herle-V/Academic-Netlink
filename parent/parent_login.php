<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>PARENT LOGIN</h2>
        <form action="parent_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>
<?php
session_start();
require_once('../db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password' AND role='parent'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: parent_dashboard.php");
    } else {
        echo "<script>alert('Invalid username or password'); window.location='../index.php';</script>";
    }
}
?>