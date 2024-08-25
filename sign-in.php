<?php include 'head.html'; ?>
<?php include 'connect.php'; ?>

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
        <form action="sgin-in.php" method="post">
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