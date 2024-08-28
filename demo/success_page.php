 <!DOCTYPE html>
<html>

<head>
    <title>Online Queue</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color:white;
        }

        header {
            background-color: #1f1f1f;
            color: #fff;
            padding: 0px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            color: white;
        }

        .audition-calls {
            margin-top: 40px;
        }
        h2 {
        	color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #333333;
            border-radius: 10px;
            overflow: hidden;
            align: center;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: white;
        }

        th {
            background-color: #1f1f1f;
            color: white;
            font-weight: bold;
        }

        tr:hover {
            background-color: gray;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
            vertical-align: middle;
        }

        td a {
            display: inline-block;
            padding: 8px 15px;
            background-color: #f9004d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        td a:hover {
            background-color: white;
            color: black;
        }
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        video {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Online Queue</h1>
        </div>
    </header>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="../videoplayback.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container audition-calls">
        <table>
            <tr>
                <th>User name</th>
                <th>E-mail</th>
                <th>Queue</th>
                
            </tr>
            <?php
            session_start();
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
            $specific_audition_id = $_SESSION["project_id"]; 
            $queueNumber = 1;

            // Retrieve user information from the database
            $sql = "SELECT u.username, u.email, ar.id
        FROM audition_queue AS ar
        INNER JOIN users AS u ON ar.user_id = u.id
        WHERE ar.company_id = $specific_audition_id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . maskEmail($row['email']) . "</td>";
                    echo "<td>Queue No: " . $queueNumber++ . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No Queues Yet.</td></tr>";
            }

            // Close the connection
            mysqli_close($conn);
            function maskEmail($email) {
                $parts = explode("@", $email);
                $username = $parts[0];
                $domain = $parts[1];
                $maskedUsername = substr($username, 0, 2) . str_repeat("*", strlen($username) - 2);
                return $maskedUsername . "@" . $domain;
            }
            ?>
        </table>
        <?php
        // Check if the user's name is set in the session
        if (isset($_SESSION['username'])) {
            echo "<h2>Welcome, " . $_SESSION['username'] . "! Your queue number is: " . ($queueNumber - 1) . "</h2>";
        }
        ?>
    </div>
</body>
</html>
