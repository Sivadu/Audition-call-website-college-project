<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$producerName = $_POST['producer_name'];
$projectTitle = $_POST['project_title'];
$category = $_POST['category'];
$description = $_POST['description'];
$auditionDate = $_POST['audition_date'];
$auditionLocation = $_POST['audition_location'];
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

// Move uploaded image to desired location
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
move_uploaded_file($image_tmp, $target_file);

// Insert the audition call into the database
$sql = "INSERT INTO auditions (producer_name, project_title, category, description, audition_date, audition_location,image) 
        VALUES ('$producerName', '$projectTitle', '$category', '$description', '$auditionDate', '$auditionLocation','$target_file')";

if (mysqli_query($conn, $sql)) {
    header('location: prodisplay.php');
    echo "Audition call added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>