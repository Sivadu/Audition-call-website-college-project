<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $db_host = "localhost"; // e.g., "localhost"
    $db_name = "audition_calls"; // Replace with your actual database name
    $db_user = "root"; // Replace with your database username
    $db_password = ""; // Replace with your database password

    // Create a PDO database connection
    try {
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }

    // Get data from the form
    $adminname = $_POST["adminname"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    // Insert data into the database
    $sql = "INSERT INTO admin (adminname, email, password) VALUES (:adminname, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":adminname", $adminname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: Admin registration failed.";
    }
}
?>
