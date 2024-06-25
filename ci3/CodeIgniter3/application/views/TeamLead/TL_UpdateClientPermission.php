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
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .form-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 1100px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .add-remove-buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
            align-items: flex-start;
        }

        .add-remove-buttons button {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <section class="home-section" style="margin-top: -50%;">

        <div class="container">
            <div class="form-container">
                <!-- <php
                            // Assuming $urlId contains the URL ID value
                            echo "Client id " . $id_from_url = $this->uri->segment(3);
                            ?> -->
                <form id="dynamicForm" method="post">
                    <!-- Initial row -->
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <input type="hidden" name="client_id" value="<?php echo $this->uri->segment(4); ?>">



                            <label for="selectOption1">Admin</label>
                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Admin') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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
                                                if ($permission->User_id == $userData['id']) {
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
                                                if ($permission->User_id == $userData['id']) {
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
                                                if ($permission->User_id == $userData['id']) {
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
                                                if ($permission->User_id == $userData['id']) {
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
                                                if ($permission->User_id == $userData['id']) {
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
                            <label for="selectOption1">Head Team Lead</label>

                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Head Team Lead') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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
                            <label for="selectOption1">Sales</label>

                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Sales') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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
                            <label for="selectOption1">HR</label>

                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'HR') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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
                            <label for="selectOption1">Accountant</label>

                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Accountant') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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




                    <!-- <div class="form-group col-md-6">
                            <label for="selectOption1">Sales</label>

                            <select id="selectOption1" name="selectOption1[]" class="form-control mul-select" multiple>
                                <php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Sales') {
                                            $selected = ''; // initialize selected variable
                                            // Check if the user ID is in the permissions for this client
                                            foreach ($clientPermissions as $permission) {
                                                if ($permission->User_id == $userData['id']) {
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
                        </div> -->






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
                                        if ($permission->User_id == $userData['id']) {
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
                                        if ($permission->User_id == $userData['id']) {
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
                <label>Client (Add Row)</label>

                <div class="add-remove-buttons">
                    <button type="button" class="btn btn-primary" onclick="addRow()"><i class="fas fa-plus"></i></button>
                    <button type="button" class="btn btn-danger" onclick="removeRow()"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- Additional rows will be added dynamically here -->


            <div>

                <button type="submit" class="btn btn-success">Submit</button>
                <button type="submit" class="btn btn-success">Close</button>
            </div>
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $(".mul-select").select2({
                    placeholder: "Select Roles",
                    tags: true
                });
            });

            function addRow() {
                var newRow = '<div class="form-row">' +
                    '<div class="form-group col-md-6">' +
                    '<label for="selectOption1">Option 1</label>' +
                    '<select id="selectOption1" name="selectOption1" class="form-control mul-select" multiple>' +
                    '<option value="Stack">Stack</option>' +
                    '<option value="Queue">Queue</option>' +
                    '<option value="Linked-List">Linked-List</option>' +
                    '<option value="Heap">Heap</option>' +
                    '<option value="Binary-Tree">Binary-Tree</option>' +
                    '<option value="Graph">Graph</option>' +
                    '<option value="Array">Array</option>' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group col-md-6">' +
                    '<label for="selectOption2">Option 2</label>' +
                    '<select id="selectOption2" name="selectOption2" class="form-control mul-select" multiple>' +
                    '<option value="Stack">Stack</option>' +
                    '<option value="Queue">Queue</option>' +
                    '<option value="Linked-List">Linked-List</option>' +
                    '<option value="Heap">Heap</option>' +
                    '<option value="Binary-Tree">Binary-Tree</option>' +
                    '<option value="Graph">Graph</option>' +
                    '<option value="Array">Array</option>' +
                    '</select>' +
                    '</div>' +
                    '</div>';
                $('#dynamicForm').append(newRow);
                $(".mul-select").select2({
                    placeholder: "Select data structures",
                    tags: true
                });
            }

            function removeRow() {
                $('#dynamicForm .form-row:last').remove();
            }
        </script>

</body>

</html>