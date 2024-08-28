<?php
// Start the session (make sure to call this at the top of your PHP file)
session_start();

// Check if the user is logged in (you can add this check on each protected page)
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle unauthorized access
    header("Location: ../LOGIN/signup.php"); // Redirect to your login page
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CONTENT</title>
    <link rel="stylesheet" type="text/css" href="STYLET.CSS">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
        /* CSS for the popup form */
.popup-form {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1;
}

.form-container {
    background-color: #fff;
    width: 80%;
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    border-radius: 5px;
    position: relative;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
}

/* Add more styles as needed */

    </style>
    <script type="text/javascript">
       
function openForm() {
    document.getElementById("requestForm").style.display = "block";
}

function closeForm() {
    document.getElementById("requestForm").style.display = "none";
}

    </script>
</head>
<body bgcolor="#2f2e2e">
<?php
    // Establish a database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'audition_calls';

    $conn = mysqli_connect($host, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Retrieve data from the database
    $id = $_GET['id'];
    $sql = "SELECT id,project_title,producer_name, description, image FROM auditions WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $project_title = $row['project_title'];
    $producer_name = $row['producer_name'];
    $description = $row['description'];
    $image = $row['image'];

    // Close the database connection
    mysqli_close($conn);
?>
    <header>
        <h2 class="logo">CINEPHILE</h2>
        <nav class="navigation">
            <a href="../index.php">Home<span></span></a>
            <a href="#">About<span></span></a>
            <a href="#">Service<span></span></a>
            <a href="../LOGIN/singnup.php">Sign-in<span></span></a>
        </nav>
    </header>
    <section class="about">
    <div class="video-container">
        <div class="video-overlay"></div>
            <video autoplay loop muted>
                <source src="../videoplayback.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="main">
            <?php echo "<img src='" . $row['image'] . "'>"?>
            <div class="about-text">
                <h1><?php echo $project_title; ?></h1>
                <h5><span><?php echo $producer_name; ?></span></h5>
                <p><?php echo nl2br($description); 
                 ?></p><?php
                 echo "<td><button><a href='demo.php?id=" . $id . "'>Queue</a></button></td>";?>
                 


            </div>
        </div>
    </section>
</body>
</html>