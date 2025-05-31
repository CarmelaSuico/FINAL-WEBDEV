<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: ../index.php'); 
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>User Feedback</title>
    <link rel="stylesheet" href="feedback.css" />
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
</head>
<body>

<header class="topbar">
    <a href="Homepage.php" class="logo" style="color:black;">Ani</a><a href="Homepage.php" class="logo" style="color:red;">Mate</a>

    <div class="help">
        <button id="helpBtn">Help</button>
    </div>
</header>

<div class="feedback-container">
    <aside class="sidebar">
        <div class="profile">
            <div class="avatar-circle"><?= strtoupper($name[0]) ?></div>
            <h2>Your Otaku Studio</h2>
            <p><?= htmlspecialchars($name) ?></p>
        </div>
        <nav class="sidebar-nav">
            <a href="dashboard.php">Dashboard</a>
            <a href="#">Settings</a>
            <a href="feedback.php">Feedback</a>
        </nav>
    </aside>

    <div class="helppara">
        <p>
            Help — About AniMate <br>
            <br>
            AniMate is a web-based platform created for anime enthusiasts who want to enjoy, <br> share, and engage with anime content. Whether you're a casual viewer or a passionate creator, <br>AniMate provides a space for you to experience the anime world in your own way.
            <br><br>
            With AniMate, users can watch curated anime videos from trusted sources like Muse Asia and Ani-One <br>Asia, all organized by genres to make browsing easy and enjoyable. If you're a content creator, <br>you can upload your own anime-related videos to share with the community. Your uploads will appear <br>on your dashboard, where you can also manage playlists and view a summary of your content.
            <br><br>
            The website would like to include an analytics section that helps you understand how your videos are <br>performing. You can track the number of views, watch time, and subscribers you've gained over <br>time. For those looking to turn their passion into profit, AniMate offers a simple reward system — <br>for every 500 views your videos receive, you earn $1. With your help and contribution, we can make <br>it happen.
            <br><br>
            AniMate woudl also like to includes a community section where you can join anime groups and connect <br>with fellow fans. Whether you want to discuss your favorite series or collaborate on content, this <br>is the place to interact with others who share your interests.
            <br><br>
            If you ever have suggestions, encounter issues, or just want to share your thoughts, the feedback <br>section lets you send your message directly to the development team. Your input helps improve <br>AniMate and shape its future.
        </p>
    </div>
    
</div>

</body>
</html>
