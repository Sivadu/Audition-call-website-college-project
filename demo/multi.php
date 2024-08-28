<?php
    session_start();

    $contact_email =  $_SESSION['user_email'];
    $producer_name =  $_SESSION['company_name'];


    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Audition Call</title>
    <script>

</script>


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333333;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.2);
            padding: 40px;
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #f9004d;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        label, input, textarea, select, option {
            display: block;
            width: 100%;
            margin-bottom: 20px;
            font-size: 1rem;
            color: #ffffff;
            font-family: arial,sans-serif;
        }

        input, textarea, select, option {
            padding: 10px;
            border: none;
            border-bottom: 1px solid #f9004d;
            background-color: transparent;
        }
        option{
            color: black;
        }
        input[type="file"] {
        padding: 0;
    }


        textarea {
            resize: vertical;
            min-height: 100px;
        }

        input[type="submit"] {
            background-color: #f9004d;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff3366;
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
<div class="video-container">
        <video autoplay loop muted>
            <source src="../videoplayback.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div class="container">
        <h2>Step 2: Add Audition Call</h2>
        <form action="multistore.php" method="POST" enctype="multipart/form-data">
            
            <label for="project_title">Project Name:</label>
            <input type="text" id="project_title" name="project_title" placeholder="Enter project title" required>

            <label for="category">Choose your Audition Category:</label>
            <select id="cetegory" name="category">
            <option value="acting">Acting</option>
            <option value="singing">Singing</option>
            <option value="dubbing">Dubbing</option>
            <option value="modelling">Modelling</option>
        </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter description" rows="4" required></textarea>
            
            <div style="display: flex; justify-content: space-between;">
                <div style="flex: 1; padding-right: 10px;">
                    <label for="audition_date">Audition Deadline:</label>
                    <input type="date" id="audition_date" name="audition_date" required>
                </div>
                <div style="flex: 1; padding-left: 10px;">
                    <label for="audition_location">Audition Location:</label>
                    <input type="text" id="audition_location" name="audition_location" placeholder="Enter location" required>
                </div>
            </div>

            <label for="image">Project Poster:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            
            <input type="hidden" name="producer_name" value="<?php echo htmlspecialchars($producer_name); ?>">
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
