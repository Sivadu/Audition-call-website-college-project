<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $adminname = $_POST["adminname"];
    $password = $_POST["password"];

    // Replace these with your actual database connection details
    $db_host = "localhost";
    $db_name = "audition_calls";
    $db_user = "root";
    $db_password = "";

    try {
        // Create a PDO database connection
        $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a SQL query to fetch the user's password and email based on the username
        $sql = "SELECT password, email FROM admin WHERE adminname = :adminname";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":adminname", $adminname);
        $stmt->execute();

        // Fetch the user's stored password hash and email
        $row = $stmt->fetch();
        $hashedPassword = $row["password"];
        $email = $row["email"];
        $id = $row["id"];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, store user data in session
            session_start();
            $_SESSION["adminname"] = $adminname;
            $_SESSION["email"] = $email;
            $_SESSION["id"] = $id;

            // Redirect to categories.php
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect, display an error message
            header("error.php");
        }
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
    
}
?>
