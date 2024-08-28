<?php
    session_start();

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

// approved
$approvedQuery = "SELECT COUNT(id) as totalapprove FROM auditions WHERE status = 'approved'";
$approvedResult = mysqli_query($conn_audition_calls, $approvedQuery);
$approvedData = mysqli_fetch_assoc($approvedResult);
$totalapprove = $approvedData['totalapprove'];

// Query to get the total number of users
$userQuery = "SELECT COUNT(id) as totalUsers FROM users";
$userResult = mysqli_query($conn_sign, $userQuery);
$userData = mysqli_fetch_assoc($userResult);
$totalUsers = $userData['totalUsers'];

// Query to get the admin name (replace 'your_admin_id' with the actual admin ID)

$adminQuery = "SELECT adminname FROM admin WHERE id = '3'";
$adminResult = mysqli_query($conn_sign, $adminQuery);
$adminData = mysqli_fetch_assoc($adminResult);
$adminname = $adminData['adminname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title> Dashboard </title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="images/logo.jpg">
                    <h2>CINEPHILE</h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="users.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="audition.php">
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>all auditions</h3>
                </a>
                <a href="approve.php" >
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>requests</h3>
                </a>
                <a href="feedbacks.php">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Feedbacks</h3>
                </a>
                
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1>Analytics</h1>
            <!-- Analyses -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <h3>Total Auditions</h3>
                            <h1><?php echo $totalAuditions; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Total Users</h3>
                            <h1><?php echo $totalUsers; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Approved auditions</h3>
                            <h1><?php echo $totalapprove; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Analyses -->

           
            <!-- End of Recent Orders -->

        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Hey, <b><?php echo $_SESSION["adminname"]; ?></b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="images/logo.jpg">
                    <h2>CINEPHILE</h2>
                    <p>Auditions made easy</p>
                </div>
            </div>

            <!--<div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - 12:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div> 

            </div> -->

        </div>


    </div>

    <script src="orders.js"></script>
    <script src="index.js"></script>
</body>

</html>