<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Company Sign Up</title>
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
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 40px;
      box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.2);
      width: 400px;
      text-align: center;
    }

    .container h2 {
      color: #f9004d;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .input-field {
      margin-bottom: 20px;
    }

    .input-field label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-field input {
      width: 100%;
      padding: 10px;
      border: none;
      border-bottom: 1px solid #f9004d;
      background-color: transparent;
      color: #ffffff;
    }

    .input-field input::placeholder {
      color: #999999;
    }

    .submit-button {
      background-color: #f9004d;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.3s ease;
    }

    .submit-button:hover {
      background-color: #ff3366;
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

    .content {
      position: relative;
      z-index: 1;
      padding: 20px;
      color: #fff;
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
    <h2>Step:1 Register your Company</h2>
    <form action="signstore.php" method="post">
      <div class="input-field">
        <label for="producer_name">Production Company name</label>
        <input type="text" id="producer_name" name="producer_name" placeholder="Enter your Company's name" required>
      </div>
      <div class="input-field">
        <label for="cin">Company's Corporate Identification Number</label>
        <input type="text" id="cin" name="cin" placeholder="Enter your Company's CIN" required>
      </div>
      <div class="input-field">
        <label for="contact_email">Email</label>
        <input type="email" id="contact_email" name="contact_email" placeholder="Enter your email" required>
      </div>
      <div class="input-field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter a unique password" required>
      </div>
      <button type="submit" class="submit-button">Submit</button>
    </form>
    <p>Already have an account? <a href="audlog.php">Login</a></p>
  </div>
</body>
</html>
