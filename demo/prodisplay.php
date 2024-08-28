<?php
session_start();
if (isset($_SESSION['user_email'])) {
    $companyEmail = $_SESSION['user_email'];
    $user_name = $_SESSION['compname'];
} else {
   header("Location: audlog.php"); // Handle the case where the user is not logged in
    // You can redirect them to the login page or display an error message
}

// Function to delete a row from the database
function deleteRow($id) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "audition_calls";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $id = mysqli_real_escape_string($conn, $id);
    $query = "DELETE FROM auditions WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        return true; // Deletion successful
    } else {
        return false; // Deletion failed
    }

    mysqli_close($conn);
}

if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    if (deleteRow($idToDelete)) {
        echo "<script>alert('Row deleted successfully.');</script>";
    } else {
        echo "<script>alert('Failed to delete row.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Audition Calls</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #8f8f8f;
        }

        header {
            background-color: #1f1f1f;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: relative; 
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            color: #fcfc;
        }

        .audition-calls {
            margin-top: 60px;
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
            font-weight: bold;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
            color: #fcfc;
        }

        th {
            background-color: #1f1f1f;
            color: #fcfc;
            font-weight: bold;
        }

        tr:hover {
            background-color: #444;
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
            background-color: #fff;
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
        .add-button {
            position: absolute;
            top: 47px;
            right: 80px;
        }

        .audition-calls {
            margin-top: 40px;
        }
        a {
            display: inline-block;
            padding: 8px 15px;
            background-color: #f9004d;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #fff;
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Audition Calls</h1>
        </div>
        <a href="multi.php" class="add-button"><b>Add More Auditions</b></a>
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
                <th>Edit</th>
                <th>Action</th>
                <th>Status</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "audition_calls";

            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = "SELECT id, project_title, audition_date, image,status FROM auditions WHERE producer_name = '$user_name'";

            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['project_title'] . "</td>";
                    echo "<td>" . $row['audition_date'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "' style='max-width: 100px; max-height: 100px;'></td>";
                    echo "<td><a href='procontent.php?id=" . $row["id"] . "'>Read More</a></td>";
                    echo "<td><a href='edit.php?id=" . $row["id"] . "'>Edit</a></td>";
                    echo "<td><a href='?delete=" . $row["id"] . "'>Delete</a></td>"; 
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No audition calls found.</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </table>
    </div>
</body>

</html>
