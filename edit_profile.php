<?php
include 'connect.php';
session_start();


if (!isset($_SESSION['username'])) {
    header('Location: sign-up.php');
    exit;
}

$loggedInUsername = $_SESSION['username'];

// Ensure 'username' is set and matches the logged-in user
if (isset($_GET['username']) && $_GET['username'] === $loggedInUsername) {
    $username = trim($_GET['username']);
    
    // Prepare and execute the query to fetch user data by username
    $sql = "SELECT username, display_name, email FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "You do not have permission to edit this profile.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $display_name = $_POST['display_name'];
    $email = !empty($_POST['email']) ? $_POST['email'] : null; // Email can be null

    // Prepare and execute the query to update user data
    $sql = "UPDATE users SET display_name = :display_name" . ($email !== null ? ", email = :email" : "") . " WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':display_name', $display_name, PDO::PARAM_STR);
    if ($email !== null) {
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    }
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="profile.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <div class="edit-profile-card">
        <h1>Edit Profile</h1>
        <form action="edit_profile.php?username=<?php echo urlencode($username); ?>" method="POST">
            <label for="display_name">Display Name:</label>
            <input type="text" name="display_name" value="<?php echo htmlspecialchars($user['display_name']); ?>" required><br>
            
            <label for="email">Email (Optional):</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"><br>
            
            <input type="submit" value="Save Changes">
        </form>
        <a href="profile.php?username=<?php echo urlencode($username); ?>">Back to Profile</a>
    </div>
</body>
</html>
