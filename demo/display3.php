<!DOCTYPE html>
<html>

<head>
    <title>Audition Calls</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #333333;
            border-radius: 10px;
            overflow: hidden;
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
            <h1>Audition Calls</h1>
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
                <th>Title</th>
                <th>Date</th>
                <th>Poster</th>
                <th>Read More</th>
            </tr>
            <?php
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

            // Retrieve user information from the database
            $query = "SELECT id, project_title, audition_date, image FROM auditions WHERE category='dubbing' AND status='approved'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['project_title'] . "</td>";
                    echo "<td>" . $row['audition_date'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "' style='max-width: 100px; max-height: 100px;'></td>";
                    echo "<td><a href='content.php?id=" . $row["id"] . "'>Read More</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No audition calls found.</td></tr>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>
