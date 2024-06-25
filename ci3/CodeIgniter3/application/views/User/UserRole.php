<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        .container{
            max-width: 100%;
            max-height: 100%;

        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h2 {
            text-align: center;
            margin-top: 10px;
            color: #333;
        }

        
        .form-container {
            width: 80%;
            margin: 0 auto; 
            margin-top: 10%;

        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            /* Align items vertically */
        }

        .form-group {
            width: 30%;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            display: none;
            /* Hide the default file input */
        }

        .custom-file-upload {
            background-color: #4c69d2;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            display: inline-block;
        }

        .custom-file-upload:hover {
            background-color: #4c69d2;
        }

        .icon {
            margin-right: 8px;
        }

        input[type="submit"] {
            background-color: #4c69d2;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4c69d2;
        }

        .preview-image {
            width: 50%;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .form-group {
                width: 100%;
            }

            .form-container {
                width: 100%;
                margin-right: 0;
            }

            .image-box,
            .form-group {
                margin-bottom: 20px;
            }
        }

        .close-pop {
            position: absolute;
            top: 15%;
            left: 85%;
            cursor: pointer;
            font-size: 40px;
            color: #fff;
            /* Change color as needed */
            padding: 5px;
            /* Adjust padding as needed */
            border-radius: 50%;
            /* Make it round */
            z-index: 999;
            /* Ensure it appears above other content */
        }
        .headding{
            position: relative; /* Required for positioning the pseudo-element */
    width: 100%; /* Adjust as needed */
    height: 50px; /* Example height */
    margin-bottom: 20px;
    
        }
        .headding::after {
    content: ''; /* Required for pseudo-element */
    position: absolute; /* Positioning relative to the container */
    bottom: 0; /* Position at the bottom */
    left: 0; /* Stretch from left */
    width: 100%; /* Full width of the container */
    height: 2px; /* Height of the line */
    background-color: rgba(0, 0, 0, 0.2); /* Faint black color */
}
    </style>
</head>

<body>
 
    <div class="container">
        <div class="form-container">
    
            <form method="POST" enctype="multipart/form-data" action="<?php echo base_url() . 'index.php/UserRoleContro/addUser' ?>">
                <div class="headding">
            <span>Update User</span>
                </div>
                <span class="close-pop" onclick="closePopup()">&times;</span>
           
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <?php
                        if (!empty($roleResult)) {
                            foreach ($roleResult as $role) {
                                // Output each option with the value and label from the database
                                echo '<option value="' . $role['Role_name'] . '">' . $role['Role_name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="mob_no">Mobile Number:</label>
                    <input type="text" id="mob_no" name="mob_no" required>
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        <!-- Add more status options if needed -->
                    </select>
                </div>


                

                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>


                <div class="form-group">
                    <label for="confirm_password">Confirm New Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="form-group">
                    <label for="admin_password">Admin Password:</label>
                    <input type="password" id="admin_password" name="admin_password" required>
                </div>


                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                    <label for="image" class="custom-file-upload"><i class="fas fa-upload icon"></i> Upload Image</label>
                </div>

                <div class="form-group">
                    <img id="preview" class="preview-image" src="#" alt="Preview">
                </div>

                <input type="submit" value="Submit" style="margin: 0 auto; background: green;"> <!-- Centered submit button -->
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
</body>

</html>