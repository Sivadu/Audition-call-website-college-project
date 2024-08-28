<!DOCTYPE html>
<html>
<head>
    <title>Add Audition Call</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(15deg, #8f8f8f 0%, #343535 150%);
            color: linear-gradient(15deg, #8f8f8f 0%, #343535 150%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #1f1f1f;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            padding: 40px;
            width: 600px;
            text-align: center;
            box-sizing: border-box;
        }

        h1 {
            color: #f9004d;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333;
            width: 100%;
            color: #ddd;
            box-sizing: border-box;
        }

        input[type="file"] {
            border: none;
            padding: 0;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="submit"] {
            background-color: #f9004d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #ff3366;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Audition Call</h1>
        <form action="store.php" method="POST" enctype="multipart/form-data">
            <label for="producer_name">Producer Name:</label>
            <input type="text" id="producer_name" name="producer_name" required>
            
            <label for="project_title">Project Title:</label>
            <input type="text" id="project_title" name="project_title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            
            <div style="display: flex; justify-content: space-between;">
                <div style="flex: 1; padding-right: 10px;">
                    <label for="audition_date">Audition Date:</label>
                    <input type="date" id="audition_date" name="audition_date" required>
                </div>
                <div style="flex: 1; padding-left: 10px;">
                    <label for="audition_location">Audition Location:</label>
                    <input type="text" id="audition_location" name="audition_location" required>
                </div>
            </div>
            
            <label for="contact_email">Contact Email:</label>
            <input type="email" id="contact_email" name="contact_email" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
