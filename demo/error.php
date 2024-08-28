<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warning</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #333333;
      color: #ffffff;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.2);
      width: 400px;
      text-align: center;
    }

    .container h1 {
      color: #f9004d;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .message {
      margin-bottom: 20px;
      color: #f9004d;
      font-weight: bold;
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
  <div class="video-container">
    <video autoplay loop muted>
      <source src="../videoplayback.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <div class="container">
    <h1>Warning! Duplicate Corporate ID!</h1>
    <p class="message">Please check your credentials and try again.</p>
    <a href="audsign.php" style="text-decoration: none; color: #f9004d; font-weight: bold;">Back to Signup</a>
  </div>
</body>
</html>
