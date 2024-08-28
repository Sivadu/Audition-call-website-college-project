<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: ../LOGIN/signup.html");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'audition_calls';
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $project_id = $_POST['project_id'];
    $user_id = $_POST["user_id"];
    echo "user id is".$user_id;

    // Check if the user has already sent a request for this project
    $checkSql = "SELECT * FROM audition_queue WHERE company_id = $project_id AND user_id = $user_id";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        // A request from the same user for the same project already exists
        // You can handle this case as needed, e.g., display an error message or redirect back to the content page.
        echo "You have already sent a request for this project.";
    } else {
        // Insert the request into the project_requests table
        $sql = "INSERT INTO audition_queue (company_id, user_id) VALUES ($project_id, $user_id)";

        if (mysqli_query($conn, $sql)) {
            // Request successfully added to the database
            header("Location: success_page.php"); // Redirect to a success page
            exit();
        } else {
            // Handle the case where the request could not be added
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
