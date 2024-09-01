<?php session_start(); ?>

<pre>
<?php
if (isset($_SESSION)) {
    print_r($_SESSION);
} else {
    echo "Session is not started.";
}
?>
</pre>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website for artists with login and post functionalities.">
    <link rel="stylesheet" href="head.css">
    <link rel="icon" href="img/default-pfp-2.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="container">
            <h1>ARTISTS HUB</a></h1>
            <nav>
                <ul>
                <?php if (!isset($_SESSION['username'])): ?>
                        <li><a href="sign-in.php">Login</a></li>
                    <?php else: ?>
                        <li><a href="profile.php">Profile</a></li>
                    <?php endif; ?>
    
                <li><a href="posts.php">Posts</a></li>
                <li><a href="artists.html">Artists</a></li>
                <li><a href="tags.html">Tags</a></li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="sign-out.php">Sign-out</a></li>
                <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
