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
                <a href="index.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="users.php" >
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>
                <a href="audition.php" >
                    <span class="material-icons-sharp">
                        receipt_long
                    </span>
                    <h3>all auditions</h3>
                </a>
                <a href="approve.php" class="active">
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
            
            
            <!-- End of Analyses -->

            <!-- New Users Section -->
            

            
            <div class="recent-orders">
                <h2>Auditions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Company CIN</th>
                            <th>Location</th>
                            <th>E-mail</th>
                            <th>Deadline</th>
                            <th>Category</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user information from the database
$query = "SELECT id, producer_name, cin, audition_location, contact_email, audition_date, category FROM auditions WHERE status = 'pending'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['producer_name'] . "</td>";

        // Fetch cin if it's empty
        if (empty($row['cin'])) {
            $cin_query = "SELECT cin FROM auditions WHERE producer_name = '{$row['producer_name']}' AND cin IS NOT NULL LIMIT 1";
            $cin_result = mysqli_query($conn, $cin_query);
            $cin_row = mysqli_fetch_assoc($cin_result);
            if ($cin_row) {
                $row['cin'] = $cin_row['cin'];
            }
        }

        echo "<td>" . $row['cin'] . "</td>";

        // Fetch contact_email if it's empty
        if (empty($row['contact_email'])) {
            $email_query = "SELECT contact_email FROM auditions WHERE producer_name = '{$row['producer_name']}' AND contact_email IS NOT NULL LIMIT 1";
            $email_result = mysqli_query($conn, $email_query);
            $email_row = mysqli_fetch_assoc($email_result);
            if ($email_row) {
                $row['contact_email'] = $email_row['contact_email'];
            }
        }

        echo "<td>" . $row['audition_location'] . "</td>";
        echo "<td>" . $row["contact_email"] . "</td>";
        echo "<td>" . $row["audition_date"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td><a href='action.php?id=" . $row["id"] . "'>Approve</a></td>";
        echo "<td><a href='reject.php?id=" . $row["id"] . "'>Reject</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No audition calls found.</td></tr>";
}

// Close the connection
mysqli_close($conn);



            ?>
                    </tbody>
                </table>
                
            </div>
        
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

    
    <script src="index.js"></script>
</body>

</html>