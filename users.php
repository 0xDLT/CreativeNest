
<?php include 'head.php'; ?>
<?php
require 'connect.php';

//list of users who have signed up on the website
try{
    $sql = 'SELECT username FROM users';
    $stmt = $pdo->query($sql);

    // Check if there are results
    if ($stmt->rowCount() > 0) {
        // Output data of each row
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $username = htmlspecialchars($row["username"]); // Use htmlspecialchars to prevent XSS
            echo "<li><a href='profile.php?username=$username'>$username</a></li>";
        }
        echo "</ul>";
    } else {
        echo "No users found.";
    }
}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}