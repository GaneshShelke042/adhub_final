<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            margin-top: 16px;
            background-color: #fff;
            overflow: hidden;
            border-radius: 8px;
            /* box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); */
            padding: 20px;
        }

        .input-field {
            margin-bottom: 20px;
        }

        #image {
            display: none;
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        form {
            /* margin-top: 16px; */
            min-height: 400px;
            background-color: #fff;
            overflow: hidden;
        }

        .fields {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .input-field {
            float: right;
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 4px 0;
        }

        input,
        select,
        textarea {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .media {
            margin: 25px 0;
            display: flex;
        }

        fieldset {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: none;
            margin-bottom: 20px;
            margin-top: 60px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f6f4;
            color: #000;
        }

        input[readonly] {
            background-color: #f4f4f4;
            cursor: not-allowed;
        }

        .input-field {
            height: 100%;
            margin-bottom: 20px;
        }

        .input-field-1 {
            padding: 10px 20px 0 20px;
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 200px;
            height: 200px;
            overflow: hidden;
        }

        .uploaded-image {
            width: 100%;
            height: 10%;
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #888;
            cursor: pointer;
        }

        .media1 {
            margin-left: 2%;
        }

        .container1 {
            display: none;
        }

        .sub-body {
            padding: 20px;
            margin: 10% auto;
            /* Centering content vertically and horizontally */
            width: 50%;
            /* Adjust the width as needed */

        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 10%;
        }

        .button-container button {

            margin: 0 10px;
            text-align: center;
        }

        .delete-button {
            background-color: #FFA500;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
        }

        .submit-button {
            background-color: blueviolet;
            border-radius: 4px;
            cursor: pointer;
        }

        .button {
            text-align: center;
        }

        .close-pop {
            position: absolute;
            top: 15%;
            right: 20%;
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
    </style>

    <title>Document</title>
</head>


<body>

    <section class="home">
        <div class="body">
            <div class="sub-body">

                <form method="post" action="<?php echo site_url('index.php/PackageContro/updateData/' . $userData['id']); ?>">

                    <div class="input-field-1" style="float:left">


                        <label for="image">Upload Image:
                            <div class="image-upload">
                                <input type="file" id="image" name="image">
                                <img class="input-field" id="input-field" src="<?= base_url('./Image/PackageServies/' . $userData['image']) ?>" alt="Uploaded Image">
                            </div>
                        </label>


                    </div>
                    <div class="fields">
                        <div class="input-field">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo $userData['name']; ?>">
                        </div>
                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Status:</label>
                            <select name="status">
                                <option value="1" <?php echo ($userData['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo ($userData['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="input-field" style="width: 100%; padding-left: 25px;">
                            <label for="Parent">Parent :</label>
                            <select id="Parent" name="Parent">
                                <option value="No parent" <?php echo ($userData['parent'] == 'No parent') ? 'selected' : ''; ?>>No parent</option>

                                <?php if (!empty($result)) {
                                    foreach ($result as $data) {
                                        $selected = ($userData['parent'] == $data['Slug']) ? 'selected' : '';
                                        echo '<option value="' . $data['Slug'] . '" ' . $selected . '>' . $data['Slug'] . '</option>';
                                    }
                                }
                                ?>
                            </select>


                        </div>
                        <div class="button-container">
                            <button class="submit-button" type="submit">Submit</button>
                            <button class="delete-button" type="button" onclick="cancelAction()">Cancel</button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <script>
        // Function to handle file input change
        function handleFileSelect(event) {
            const file = event.target.files[0]; // Get the selected file
            const reader = new FileReader(); // Initialize FileReader

            // Callback function when FileReader has loaded the file
            reader.onload = function(event) {
                const imgElement = document.getElementById('input-field');
                imgElement.src = event.target.result; // Set the src attribute of the image element to the loaded file
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        }

        // Add event listener to the file input field
        document.getElementById('image').addEventListener('change', handleFileSelect);

        function cancelAction() {
            // Redirect the page to the desired URL
            window.location.href = "http://localhost/adHub/ci3/CodeIgniter3/index.php/PackageContro/viewpackage";
        }
    </script>
</body>

</html>