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
            height: auto;
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
                <form method="post" name="AddNewClient" enctype="multipart/form-data" action="<?php echo base_url() . 'index.php/HR/HR_PackageContro/addnewpackage' ?>">
                    <span class="close-pop" onclick="closePopup()">&times;</span>
                    <div class="input-field-1" style="float:left">
                        <label for="image">Upload Image:
                            <div class="image-upload">
                                <input type="file" id="image" name="image" accept="image/*">
                                <img class="uploaded-image" src="<?php echo base_url('img/image-gallery.jpeg'); ?>" id="uploaded-image" src="" alt="Uploaded Image">
                            </div>
                        </label>
                    </div>
                    <div class="fields">

                        <div class="input-field" style="width: 50%;  padding-left: 30px;">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Status:</label>
                            <select id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>



                        <div class="input-field" style="width: 100%; padding-left: 25px;">
                            <label for="Parent">Parent :</label>
                            <select id="Parent" name="Parent">
                                <option>No Parent</option>
                                <?php if (!empty($result)) {
                                    foreach ($result as $userData) {
                                        // Output each option with the value and label from the database
                                        echo '<option value="' . $userData['Slug'] . '">' . $userData['Slug'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>


                    <input type="hidden" name="Slug">


                    <div class="button-container">
                        <button class="submit-button" name="Submit" value="submit">
                            <span>Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                        <button class="delete-button" name="close" value="close">
                            <span>Close</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>



                    <script>
                        document.getElementById('image').addEventListener('change', function() {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                document.getElementById('uploaded-image').setAttribute('src', e.target.result);
                                document.getElementById('image-icon').style.display = 'none'; // Hide the image icon
                                document.getElementById('uploaded-image').style.display = 'block'; // Show the uploaded image
                            };

                            reader.readAsDataURL(this.files[0]);
                        });

                        function updateSlug() {
                            var name = document.getElementsByName('name')[0].value; // Get the value of the "Name" input field
                            var parentSelect = document.getElementById('Parent'); // Get the "Parent" select element
                            var parentValue = parentSelect.options[parentSelect.selectedIndex].value; // Get the selected value of the "Parent" select element
                            var slugInput = document.getElementsByName('Slug')[0]; // Get the hidden input field for Slug
                            // Check if the selected value of the "Parent" select element is "No Parent"
                            if (parentValue === 'No Parent') {
                                slugInput.value = name; // Set the value of the hidden input field to the name
                            } else {
                                // Convert the name to a slug (lowercase and replace spaces with dashes)
                                var slug = parentValue.toLowerCase().replace(/\s+/g, '-') + '=>' + name;
                                slugInput.value = slug; // Set the value of the hidden input field to the generated slug
                            }
                        }

                        // Event listener to call the updateSlug function when the value of the "Name" input field changes
                        document.getElementsByName('name')[0].addEventListener('input', updateSlug);
                        // Event listener to call the updateSlug function when the value of the "Parent" select element changes
                        document.getElementById('Parent').addEventListener('change', updateSlug);
                    </script>
                </form>
            </div>
        </div>
    </section>
</body>

</html>