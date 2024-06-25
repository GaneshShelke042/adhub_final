<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Structures Form</title>

    <!-- jQuery and Select2 CSS and JS files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

    <!-- Bootstrap CSS and JS files -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <!-- Custom CSS -->
    <style>
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            /* margin-top: 70px; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f6f4;
        }

        button {
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 20px;
            /* Adjust padding to change button size */
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        button.hold {
            background-color: #ffcc00;
        }

        button.delete {
            background-color: #8A0000;
        }

        button.unhold {
            background-color: #e68a00;
        }

        button.active {
            background-color: #00cc00;
        }

        button.edit {
            background-color: #ff9900;
        }

        button.view {
            background-color: #1a75ff;
        }

        button.chat {
            background-color: #9933ff;
        }

        button.setting {
            background-color: #ff5050;
        }

        button i {
            align-content: center;
            margin-right: 5px;
        }

        .additional-buttons {
            display: flex;
        }

        /* .additional-buttons button {
            margin-right: 10px;
            Adjust the margin as needed
        } */

        /* Positioning for the new button */
        .add-new-button {
            position: absolute;
            top: 10px;
            right: 10px;
            margin-right: 20px;
        }

        /* Style for the search bar */
        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            width: 30%;
            padding: 10px;
            margin-top: 8px;
            font-size: 17px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container-popup {
            /* margin-top: 5%; */
            display: none;
            /* Initially hide the popup */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 255, 0.5);
            /* Blue semi-transparent background */
            z-index: 9999;
            /* Ensure it appears above other content */
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

        .input-field-1 {
            padding: 10px 20px 0 20px;
        }

        #image {
            display: none;
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .selected-option {
            background-color: yellow;
            /* Change this to the desired background color */
            color: black;
            /* Change text color if needed */
        }
        .home-section{
            margin-top: 2%;
        }
    </style>
</head>

<body>
    <section class="home-section">

        <div class="container">

            <form id="dynamicForm" method="post" action="<?php echo base_url() ?>index.php/Admin/Admin_Groupchat/update/<?= $id ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-container">
                            <div class="input-field-1" style="float:left">
                                <label for="image">Upload Image:
                                    <div class="image-upload">
                                        <input type="file" id="image" name="image" accept="image/*">
                                        <img class="uploaded-image" src="<?php
                                                                            if (!empty($image)) {
                                                                                echo base_url('chatprofile/' . $image[0]['image']);
                                                                            } else {
                                                                                echo base_url('img/Gallery1.jpeg');
                                                                            }
                                                                            ?>" id="uploaded-image" alt="Uploaded Image">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10">

                        <div class="form-container">
                            <!-- <php
                // Assuming $urlId contains the URL ID value
                echo "Client id " . $id_from_url = $this->uri->segment(3);
                ?> -->

                            <!-- Initial row -->
                            <div class="form-row">
                                <div class="form-group col-md-6">

                                    <div class="row justify-content-between ">
                                        <div class="col-md-6">
                                            <label for="Name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="Name" placeholder="Name" name="Name" value="<?= $clientPermissions[0]->Name ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Status" class="form-label">Status</label>
                                            <select class="form-select" aria-label="Default select example" id="Status" name="Status">
                                                <option selected>Select</option>
                                                <?php if (!empty($clientPermissions)) {
                                                    $status = $clientPermissions[0]->Status;
                                                ?>
                                                    <option value="Active" <?php echo ($status === 'Active') ? 'selected' : ''; ?>>Active</option>
                                                    <option value="InActive" <?php echo ($status === 'InActive') ? 'selected' : ''; ?>>InActive</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="selectOption1">Team Lead</label>
                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Team Lead') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>

                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption1">Head content writer</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Head Content Writer') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>






                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Content Writer</label>


                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Content_Writer') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>



                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption1">Head Graphics Designer</label>
                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Head Graphic designer') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>











                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Graphics Designer</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Graphic_designer') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption1">Head social Media manager</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Head Social Media Manager') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Social Media manager</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Social Media Manager') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Head Team Lead</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Head Team Lead') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Sales</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Sales') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>

                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption2">HR</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'HR') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Accountant</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Accountant') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectOption2">Admin</label>

                                    <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                        <?php
                                        if (!empty($userResult)) {
                                            foreach ($userResult as $userData) {
                                                // Output each option with the value as ID and label as name from the database
                                                if ($userData['role'] === 'Admin') {
                                                    $selected = ''; // initialize selected variable
                                                    // Check if the user ID is in the permissions for this client
                                                    foreach ($clientPermissions as $permission) {
                                                        if ($permission->userid == $userData['id']) {
                                                            $selected = 'selected'; // mark as selected
                                                            break; // no need to check further
                                                        }
                                                    }
                                                    echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                                }
                                            }
                                        }
                                        ?>


                                    </select>
                                </div>

                            </div>

                        </div>
                        <!-- Additional rows will be added dynamically here -->

                        <div>

                            <button type="submit" class="btn btn-success">Submit</button>
                            <a href="<?php echo base_url() ?>index.php/Admin/Admin_Groupchat/Manage" class="btn btn-success">Close</a>
                        </div>

                    </div>
                </div>
            </form>






        </div>

    </section>
    <script>
        $(document).ready(function() {
            $(".mul-select").select2({
                placeholder: "Select Roles",
                tags: true
            });
        });


        document.getElementById('image').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('uploaded-image').setAttribute('src', e.target.result);
                document.getElementById('image-icon').style.display = 'none'; // Hide the image icon
                document.getElementById('uploaded-image').style.display = 'block'; // Show the uploaded image
            };

            reader.readAsDataURL(this.files[0]);
        });
    </script>


</body>

</html>