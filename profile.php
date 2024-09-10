<?php
include 'connect.php';
session_start();

// Ensure user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: sign-up.php');
    exit;
}

$loggedInUsername = $_SESSION['username'];

if (isset($_GET['username'])) {
    $username = trim($_GET['username']);
    $sql = "SELECT username, display_name, email, signup_date FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "No username specified.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <?php include 'head.php'; ?>
</head>
<body>
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-left">
                <div class="profile-image">
                    <img src="img/default_php.png" alt="Profile Image">
                </div>
                <button class="follow-button">Follow</button>
            </div>
            <div class="profile-info">
                <h1><?php echo htmlspecialchars(!empty($user['display_name']) ? $user['display_name'] : $user['username']); ?></h1>
                <h3>@<?php echo htmlspecialchars($user['username']); ?> <span class="verified-badge">✔️</span></h3>
                <p>Joined <?php echo date('F j, Y', strtotime($user['signup_date'])); ?></p>
                <div class="social-icons">
                    <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="img/facebook-logo.png" alt="Facebook"></a>
                    <a href="#"><img src="img/x.png" alt="Twitter"></a>
                </div>
                <div class="profile-actions">
                    <!-- Conditionally display the edit button if viewing own profile -->
                    <?php if ($username === $loggedInUsername): ?>
                        <button class="edit-button" onclick="window.location.href='edit_profile.php?username=<?php echo urlencode($username); ?>'">Edit Profile</button>
                    <?php endif; ?>
                    <button class="block-button">Block</button>
                    <button class="report-button">Report</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="profile-gallery">
            <img src="img/question-marks.png" alt="Gallery Image">
            <!-- Add more gallery images if necessary -->
        </div>
    </div>
</body>
</html>
