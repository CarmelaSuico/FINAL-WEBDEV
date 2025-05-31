<?php

session_start();

$name = $_SESSION['name'] ?? null;
$alerts = $_SESSION['alerts'] ?? [];
$active_form = $_SESSION['active_form'] ?? '';

session_unset();

if($name !== null) $_SESSION['name'] = $name;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animate</title>
    <link rel="stylesheet" href="frontend and backend/style.css">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet'>

</head>
<body>
    <header>
        <a href="#" class="logo" style="color:black;">Ani</a><a href="#" class="logo" style="color:red;">Mate</a>

        <nav>
            <a href="#">HOME</a>
            <a href="#about">ABOUT</a>
            <a href="#Contact">CONTACT</a>
        </nav>

        <div class="user-auth">
            <?php if(!empty($name)): ?>
            <div class="profile-box">
                <div class="avatar-circle"><?= strtoupper($name[0]); ?></div>
                <div class="dropdown">
                    <a href="frontend and backend/dashboard.php">My Account</a>
                    <a href="frontend and backend/logout.php">Logout</a>
                </div>
            </div>
            <?php else: ?>
            <button type="button" class="login-btn-modal" >Login</button>
            <?php endif; ?>    
        </div>
    </header>
    
    <section> </section>

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
            <form action="frontend and backend/auth_process.php" method = "POST">
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
            <form action="frontend and backend/auth_process.php" method = "POST">
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

    <section id="about" class="info-section">
        <img src="frontend and backend/profile.jpg" alt="">
        <h2>About AniMate</h2>
        <p>AniMate is a platform where anime fans can watch curated anime videos using public APIs like Muse Asia and Ani-One Asia. Our goal is to provide easy access to legal anime content while building a fun and interactive otaku community.</p><br>
        <p>The platform isn't just about watching—users can log in, upload videos, track performance, interact with communities, and even earn rewards through engagement. AniMate also supports playlist creation and analytics, giving users better control over their anime experience.</p><br>
        <p>AniMate is built with a strong commitment to promoting legal anime streaming and fostering a friendly, safe, and inclusive community for anime lovers around the world.</p><br>
        <p>AniMate continues to grow with feedback from its users, aiming to improve the platform with every update. Whether you're a casual viewer or a dedicated content creator, AniMate offers tools that are simple to use yet powerful enough to enhance your anime journey. With smooth navigation, community features, and exciting rewards, AniMate is more than just a streaming site — it's a home for every anime fan.</p>
    </section>

    <section></section>

    <footer id="Contact" class="footer-section">
            <div class="section-content">
                <p class="copyright-text">Contact Us</p>

                <div class="social-link-list">
                    <a href="#" class="social-link"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fa-brands fa-twitter"></i></a>
                </div>

                <p class="policy-text">
                    <a href="#" class="policy-link">Carmela Gil G. Suico</a>
                    <a href="#" class="policy-link">24101113@usc.edu.ph</a>

                    <span class="separator">*</span>
                    <a href="#" class="policy-link">Hannah Niah Layese</a>
                    <a href="#" class="policy-link">24104955@usc.edu.ph</a>
                </p>
            </div>
    </footer>

    <script src="frontend and backend/script.js"></script>
</body>
</html>