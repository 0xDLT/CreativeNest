<?php include 'head.html'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
    <div class="profile-card">
        <div class="profile-header">
            <div class="profile-left">
                <div class="profile-image">
                    <img src="img/defualt_php.png" alt="Profile Image">
                </div>
                <button class="follow-button">Follow</button>
            </div>
            <div class="profile-info">
                <h1 >NAME</h2>
                <h3>@USERNAME <span class="verified-badge">✔️</span></h3>
                <p>Joined 1 day ago</p>
                <div class="social-icons">
                    <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="img/facebook-logo.png" alt="Facebook"></a>
                    <a href="#"><img src="img/x.png" alt="Twitter"></a>
                </div>
                <div class="profile-actions">
                    
                    <button class="block-button">Block</button>
                    <button class="report-button">Report</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="profile-gallery">
            <img src="img/question-marks.png" alt="Gallery Image">
            <img src="img/question-marks.png" alt="Gallery Image">
            <img src="img/question-marks.png" alt="Gallery Image">
            <img src="img/question-marks.png" alt="Gallery Image">
            <img src="img/question-marks.png" alt="Gallery Image">
            <img src="img/question-marks.png" alt="Gallery Image">
        </div>
    </div>
</body>
</html>
