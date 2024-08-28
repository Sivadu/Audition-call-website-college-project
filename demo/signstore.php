<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

// Create a connection to the database
$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($connection, "utf8");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $producer_name = mysqli_real_escape_string($connection, $_POST["producer_name"]);
    $cin = mysqli_real_escape_string($connection, $_POST["cin"]);
    $contact_email = mysqli_real_escape_string($connection, $_POST["contact_email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    // Check if the CIN already exists in the database
    $check_query = "SELECT * FROM auditions WHERE cin = '$cin'";
    $result = mysqli_query($connection, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // CIN already exists, display a warning message
        header("Location: error.php");
    } else {
        // CIN is unique, proceed with the insertion
        // Create and execute the SQL query to insert the registration data into the database
        $insert_query = "INSERT INTO auditions (producer_name, cin, contact_email, password) VALUES ('$producer_name', '$cin', '$contact_email', '$password')";
        
        if (mysqli_query($connection, $insert_query)) {
            // Registration successful, set a session variable8
            session_start(); // Start the session
            $_SESSION['registration_success'] = true;
            // After successful registration
            $_SESSION['user_email'] = $contact_email;
            $_SESSION['compname'] = $producer_name; // Store the company's email in the session

            // Redirect to the audition.php page
            header("Location: audition.php");
            exit();
        } else {
            // Handle the case where the query fails
            echo "Error: " . mysqli_error($connection);
        }
    }
}

// Close the database connection when done
mysqli_close($connection);
?>
