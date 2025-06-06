<?php

session_start();
include_once 'dbh.php';

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

unset($_SESSION['alerts']);
//session_unset();

if($name !== null) $_SESSION['name'] = $name;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="homepage.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>
</head>
<body>
    <header>
        <a href="#" class="logo" style="color:black;">Ani</a><a href="#" class="logo" style="color:red;">Mate</a>
        <div class="searchbar">
            <input type="text" id="search_anime" placeholder="Search Anime">
        </div>
        <nav>
            <a href="#"><i class='bx  bx-bookmark-heart'  ></i> </a>
            <a href="#"><i class='bx  bxs-history'  ></i> </a>
            <a href="#"><i class='bx  bxs-menu-filter'  ></i> </a>
        </nav>

        <div class="user-auth">
            <?php if(!empty($name)): ?>
            <div class="profile-box">
                <div class="avatar-circle"><?= strtoupper($name[0]); ?></div>
                <div class="dropdown">
                    <a href="dashboard.php">My Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <?php else: ?>
            <button type="button" class="login-btn-modal" >Login</button>
            <?php endif; ?>    
        </div>
    </header>

    <section> 
            <div class="genre-slider" id="genre-slider"></div>
            <br>

            <h2>Uploaded Videos</h2>
            <div class="public-video-gallery">
                <?php
                $sqlPublicVideos = "SELECT v.*, u.name as uploader FROM videos v JOIN users u ON v.user_id = u.id ORDER BY v.id DESC";
                $resultPublicVideos = mysqli_query($conn, $sqlPublicVideos);

                if ($resultPublicVideos && mysqli_num_rows($resultPublicVideos) > 0) {
                    while ($video = mysqli_fetch_assoc($resultPublicVideos)) {
                        $videoFile = htmlspecialchars($video['name']);
                        $videoTitle = htmlspecialchars($video['title']);
                        $uploaderName = htmlspecialchars($video['uploader']);
                        $videoPath = "uploads/" . $videoFile;

                        echo "<div class='public-video-item'>
                                <video controls width='320'>
                                    <source src='$videoPath' type='video/mp4' />
                                    Your browser does not support the video tag.
                                </video>
                                <p class='video-title'>$videoTitle</p>
                                <p class='video-uploader'>Uploaded by: $uploaderName</p>
                            </div>";
                    }
                } else {
                    echo "<p>No Uploaded videos available yet.</p>";
                }
                ?>
            </div>

            <br>
            <!-- <h2 class="watch-now-title">Top Anime</h2> -->
            <div class="anime-container" id="anime-container"></div>
    </section>

    <?php if(!empty($alerts)): ?>
    <div class="alert-box" >
        <?php foreach($alerts as $alerts): ?>
        <div class="alert <?= $alerts['type']; ?>">
            <i class='bx  <?= $alerts['type'] === 'success' ? 'bxs-check-circle' : 'bxs-x-circle' ?>'  ></i> 
            <span><?= $alerts['message']; ?></span>
        </div>
        <?php endforeach; ?>  
    </div>
    <?php endif; ?>    

    



    <div class="auth-modal <?= $active_form === 'register' ? 'show slide' : ($active_form === 'login' ? 'show' : ''); ?>">
        <button type="button" class="close-btn-modal"><i class='bx  bxs-x' ></i> </button>

        <div class="form-box login">
            <h2>LOGIN</h2>
            <form action="auth_process.php" method = "POST">
                <div class="input-box">
                    <input type="text" name="name" placeholder="Name" required>
                    <i class='bx  bxs-envelope'  ></i> 
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx  bxs-lock'  ></i> 
                </div>

                <button type="submit" name="login_btn" class="btn">Login</button>
                <p>Dont have an account? <a href="#" class="register-link">Register</a></p>
            </form>
        </div>

        <div class="form-box register">
            <h2>REGISTER</h2>
            <form action="auth_process.php" method = "POST">
                <div class="input-box">
                    <input type="text" name="name" placeholder="Name" required>
                    <i class='bx  bxs-user'  ></i>  
                </div>

                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required>
                    <i class='bx  bxs-envelope'  ></i> 
                </div>

                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx  bxs-lock'  ></i> 
                </div>

                <button type="submit" name="register_btn" class="btn">Register</button>
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="apis.js"></script>

</body>
</html>