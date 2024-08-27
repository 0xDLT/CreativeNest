<?php include 'head.html'; ?>


<?php
require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    // Retrieve form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Prepare SQL query to select user
    $sql = "SELECT password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    // Fetch the stored password
    $storedPassword = $stmt->fetchColumn();
    
    if ($storedPassword && $password === $storedPassword) {
        // Password is correct, start session and redirect
        session_start();
        $_SESSION['username'] = $username;
        
        header('Location: welcome.php');
        exit;
    } else {
        echo "<h1 style='color: red;'>Invalid username or password.</h1>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <title>Sign-in</title>
</head>
<body>
    <dev class="main">
        <form action="sign-in.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p>


            <button type="submit">SignIn >:3</button>
        </form>
    </dev>
</body>
</html>