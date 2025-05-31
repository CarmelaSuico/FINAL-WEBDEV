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
        <button id="helpBtn"><a href="help.php">Help</a></button>
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
            <a href="feedback.php" class="active">Feedback</a>
        </nav>
    </aside>

    <section class="contact-section" id="contact">
            <div class="container">
                <div class="row">
                    <div class="contact-left">
                        <h1 class="subtitle">Send Us Your Feendback</h1>
                        <h4>Please wait for it to send, it will take a while</h4>
                    </div>
                    <div class="contact-right">
                        <form name="submit-to-google-sheet">
                            <input type="text" name="Name" placeholder="Your Name" required>
                            <input type="email" name="Email" placeholder="Your Email" required>
                            <textarea name="Message" rows="6" placeholder="Your Message"></textarea>
                            <button type="submit" class="btn btn2">Submit</button>
                        </form>
                        <span id="msg"></span>
                    </div>
                </div>
            </div>
        </section>
        
        <script>
            const scriptURL = 'https://script.google.com/macros/s/AKfycby2AL3UeUJXKNathkqgej-STGPiwdmx-9yb5fNmRtEO-qZm_AcD0wTdZaRWB86HUXBi/exec'
            const form = document.forms['submit-to-google-sheet']
            const msg = document.getElementById("msg")
          
            form.addEventListener('submit', e => {
              e.preventDefault()
              fetch(scriptURL, { method: 'POST', body: new FormData(form)})
                .then(response => {
                    msg.innerHTML = "Message sent succssfully"
                    setTimeout(function(){
                        msg.innerHTML = ""
                    }, 5000);
                    form.reset()
                })
                .catch(error => console.error('Error!', error.message))
            })
          </script>
</div>

</body>
</html>
