<?php
$db_host = "localhost";
$db_name = "audition_calls";
$db_user = "root";
$db_password = "";

// Create a connection to the 'sign' database
$conn_sign = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn_sign) {
    die("Connection failed: " . mysqli_connect_error());
}

$db_name = "audition_calls";

// Create a connection to the 'audition_calls' database
$conn_audition_calls = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if (!$conn_audition_calls) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the total number of auditions
$auditionQuery = "SELECT COUNT(id) as totalAuditions FROM auditions";
$auditionResult = mysqli_query($conn_audition_calls, $auditionQuery);
$auditionData = mysqli_fetch_assoc($auditionResult);
$totalAuditions = $auditionData['totalAuditions'];

// Query to get the total number of users
$userQuery = "SELECT COUNT(id) as totalUsers FROM users";
$userResult = mysqli_query($conn_sign, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$totalUsers = $userData['totalUsers'];

// Query to get the admin name (replace 'your_admin_id' with the actual admin ID)
$adminId = 1; // Replace with the actual admin ID
$adminQuery = "SELECT adminname FROM admin WHERE id = $adminId";
$adminResult = mysqli_query($conn_sign, $adminQuery);
$adminData = mysqli_fetch_assoc($adminResult);
$adminname = $adminData['adminname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
</head>
<style type="text/css">
    /* styles.css */

/* Reset some default styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f0f0;
}

/* Header styles */
header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px;
}

/* Card styles */
.card-container{
    display: flex;
    justify-content: space-between;
    align-items: stretch;
    padding: 20px;
}
.card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    padding: 20px;
    margin: 20px;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex: 1;
}

.card h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.card p {
    font-size: 24px;
    font-weight: bold;
    color: #333;
}

/* Add more styles as needed */

</style>
<body>
    <header>
        <h1>Welcome, <?php echo $adminname; ?>!</h1>
    </header>
    <main>
        <div class="card-container">
        <div class="card" style="margin-right: 20px;">
            <h2>Total Auditions</h2>
            <p><?php echo $totalAuditions; ?></p>
        </div>
        <div class="card" style="margin-left: 20px;">
            <h2>Total Users</h2>
            <p><?php echo $totalUsers; ?></p>
        </div>
    </div>
        <!-- Add more content for the dashboard here -->
    </main>
</body>
</html>
