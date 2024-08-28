<?php
// Start the session (make sure to call this at the top of your PHP file)
session_start();

// Check if the user is logged in (you can add this check on each protected page)
// if (!isset($_SESSION['username'])) {
//     // Redirect to the login page or handle unauthorized access
//     header("Location: ../LOGIN/signup.php"); // Redirect to your login page
//     exit();
// }
if (isset($_SESSION['username'])) {
  echo '<script>';
  echo 'document.addEventListener("DOMContentLoaded", function() {';
  echo '  document.getElementById("popup").classList.add("show");';
  echo '});';
  echo '</script>';
}
?>


<html>
<head>
  <title>card</title>
  <link rel="stylesheet" href="cd.css">
</head>
<body>
  <header>
      <h2 class="logo">CINEPHILE</h2>
      <nav class="navigation">
          <a href="../index.php" class="active">Home<span></span></a>
          <a href="#">About<span></span></a>
          <a href="#">Service<span></span></a>
          <a href="../LOGIN/signup.php">Sign-in<span></span></a>

      </nav>
  </header>
</body>
<body2>
  <div id="popup" class="popup">
  <span class="popup-content">Success: You are logged in!</span>
</div>


<section class="hero-section">
<div class="video-container">
            <video autoplay loop muted>
                <source src="../videoplayback.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
  <div class="card-grid">
    <a class="card" href="../demo/display1.php">
      <div class="card__background" style="background-image:url(actor.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">ACTING</h3>
      </div>
    </a>
    <a class="card" href="../demo/display2.php">
      <div class="card__background" style="background-image: url(singer.jpeg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">SINGING</h3>
      </div>
    </a>
    <a class="card" href="../demo/display3.php">
      <div class="card__background" style="background-image: url(dubbing.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">DUBBING</h3>
      </div>
    </li>
    <a class="card" href="../demo/display4.php">
      <div class="card__background" style="background-image: url(model.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">MODELING</h3>
      </div>
    </a>
  <div>
</section>
</body2>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var popup = document.getElementById("popup");
    if (popup) {
      popup.classList.add("show");
      setTimeout(function() {
      popup.classList.remove("show");
    }, 5000);
    }
  });
</script>
</html>