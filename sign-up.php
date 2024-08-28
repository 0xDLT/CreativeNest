<?php include 'head.html'; ?>


<?php
require 'connect.php';

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        // Retrieve form data
        $username = trim($_POST['username']);
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $pass = trim($_POST['password']);
        
        
        // Check if username already exists
        $checkSql = "SELECT COUNT(*) FROM users WHERE username = :username";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':username', $username);
        $checkStmt->execute();
        $userExists = $checkStmt->fetchColumn();

        if ($userExists) {
            echo "<h1 style='color: red';>Username already exists.</h1>";
        } else {

            // Prepare SQL query
            $sql = "INSERT INTO users (username, email, password, signup_date) VALUES (:username, :email, :password, NOW())";
            $stmt = $pdo->prepare($sql);

            // Bind parameters
            $email = $email === '' ? null : $email;
            $stmt->bindParam(':email', $email, PDO::PARAM_NULL);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $pass);

            // Execute query
            if ($stmt->execute()) {
                // Redirect to a confirmation page or the same page
                header('Location: sign-up.php');
                
                exit;
            } else {
                echo "Sign-up failed. Please try again.";
            }
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
        <form action="sign-up.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="email">Email(Optional)</label>
            <input type="email" name="email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <p>Already have an account? <a href="sign-in.php">Sign In</a></p>

            <button type="submit">SignUp :3</button>
        </form>
    </dev>
</body>
</html>