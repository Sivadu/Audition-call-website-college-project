<?php
// Start the session (make sure to call this at the top of your PHP file)
session_start();

// Check if the user is logged in (you can add this check on each protected page)
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: ../LOGIN/signup.html"); // Redirect to your login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cards Page</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #333333;
      color: #ffffff;
      font-family: Arial, sans-serif;
    }

    header {
      background-color: #1f1f1f;
      padding: 15px 0;
      text-align: center;
    }

    .logo {
      font-size: 2em;
      color: #fff;
    }

    .navigation {
      margin-top: 20px;
    }

    .navigation a {
      text-decoration: none;
      color: #fff;
      font-weight: 600;
      margin-left: 20px;
      padding: 6px 15px;
      transition: .3s;
    }

    .navigation a:hover {
      background-color: #f9004d;
      border-radius: 5px;
    }

    .card-grid {
        align: center;
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping onto a new line */
    justify-content: space-between; /* Distribute cards evenly */
    align-items: center;
    max-width: var(--width-container);
    width: 100%;
    margin-top: 30px;
  }

  .card {
  background-color: rgba(32, 32, 32, 0.5); /* Adjust the alpha (last) value as needed */
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
  margin: 20px;
  width: 300px;
}


    .card__background {
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      height: 200px;
    }

    .card__content {
      margin-top: 10px;
      text-align: center;
    }

    .card__category {
      color: #fcfcfc;
      font-size: 0.9rem;
      text-transform: uppercase;
    }

    .card__heading {
      color: #fff;
      font-size: 1.5rem;
      margin-top: 10px;
    }
    @media (max-width: 768px) {
      .card-grid {
        flex-direction: column;
        align-items: center;
      }

      .card {
        margin: 20px 0;
      }
    }
    .card a {
  text-decoration: none; /* Remove the underline */
  color: inherit; /* Inherit the color from parent, or set your own color */
}
.video-container {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: -1;
}

video {
  object-fit: cover;
  width: 100%;
  height: 100%;
}

  </style>
</head>
<body>
  <header>
    <h2 class="logo">CINEPHILE</h2>
    <nav class="navigation">
      <a class="navigation" href="../HOME/index.php">Home</a>
      <a class="navigation" href="#">About</a>
      <a class="navigation" href="#">Service</a>
      <a class="navigation" href="../HOME/LOGIN/signup.html">Sign-in</a>
    </nav>
  </header>
  <div class="video-container">
    <video autoplay loop muted>
      <source src="../videoplayback.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <div class="card-grid">
    <div class="card">
    <a class="card" href="display1.php">
      <div class="card__background" style="background-image:url(actor.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">ACTING</h3>
      </div></a>
    </div>

    <div class="card">
    <a class="card" href="display1.php">
      <div class="card__background" style="background-image: url(singer.jpeg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">SINGING</h3>
      </div></a>
    </div>

    <div class="card">
    <a class="card" href="display1.php">
      <div class="card__background" style="background-image: url(dubbing.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">DUBBING</h3>
      </div></a>
    </div>

    <div class="card">
    <a class="card" href="display1.php">
      <div class="card__background" style="background-image: url(model.jpg)"></div>
      <div class="card__content">
        <p class="card__category">Category</p>
        <h3 class="card__heading">MODELING</h3>
      </div></a>
    </div>
  </div>
</body>
</html>
