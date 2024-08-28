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

$actingQuery = "SELECT COUNT(id) as totalacting FROM auditions WHERE category = 'acting'";
$actingResult = mysqli_query($conn_audition_calls, $actingQuery);
$actingData = mysqli_fetch_assoc($actingResult);
$totalacting = $actingData['totalacting'];

$singQuery = "SELECT COUNT(id) as totalsing FROM auditions WHERE category = 'singing'";
$singResult = mysqli_query($conn_audition_calls, $singQuery);
$singData = mysqli_fetch_assoc($singResult);
$totalsing = $singData['totalsing'];

$dubQuery = "SELECT COUNT(id) as totaldub FROM auditions WHERE category = 'dubbing'";
$dubResult = mysqli_query($conn_audition_calls, $dubQuery);
$dubData = mysqli_fetch_assoc($dubResult);
$totaldub = $dubData['totaldub'];

$mQuery = "SELECT COUNT(id) as totalm FROM auditions WHERE category = 'modelling'";
$mResult = mysqli_query($conn_audition_calls, $mQuery);
$mData = mysqli_fetch_assoc($mResult);
$totalm = $mData['totalm'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
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
                <a href="audition.php" class="active">
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
            <h1>Categories</h1>
            <!-- Analyses -->
            <div class="analyse" >
                <div class="sales" >
                    <div class="status">
                        <div class="info">
                            <h3>Acting</h3>
                            <h1><?php echo $totalacting; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <h3>Singing</h3>
                            <h1><?php echo $totalsing; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Dubbing</h3>
                            <h1><?php echo $totaldub; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <h3>Modelling</h3>
                            <h1><?php echo $totalm; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- End of Analyses -->

            <!-- New Users Section -->
            

            
            <div class="recent-orders">
                <h2>Auditions</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>E-mail</th>
                            <th>Deadline</th>
                            <th>Category</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            // Establish a database connection
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "audition_calls";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user information from the database and sort by producer_name
$query = "SELECT id, producer_name, project_title, audition_location, contact_email, audition_date, category, status FROM auditions ORDER BY producer_name";
$result = mysqli_query($conn, $query);

// Create an array to store email addresses for each producer_name
$emailMap = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $producerName = $row['producer_name'];

        // If contact_email is empty, try to fetch from the emailMap
        if (empty($row['contact_email']) && isset($emailMap[$producerName])) {
            $row['contact_email'] = $emailMap[$producerName];
        }

        // Display the row
        echo "<tr>";
        echo "<td>" . $producerName . "</td>";
        echo "<td>" . $row['project_title'] . "</td>";
        echo "<td>" . $row['audition_location'] . "</td>";
        echo "<td>" . $row["contact_email"] . "</td>";
        echo "<td>" . $row["audition_date"] . "</td>";
        echo "<td>" . $row["category"] . "</td>";
        echo "<td>" . $row["status"] . "</td>";
        echo "</tr>";

        // If contact_email is not empty, update the emailMap
        if (!empty($row['contact_email'])) {
            $emailMap[$producerName] = $row['contact_email'];
        }
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