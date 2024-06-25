<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <style>
        .container {
            /* margin-top:65%; */
            /* max-width: 900px; */
            width: 100%;
            padding: 20px;
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

        button.action-button {
            color: #1a75ff;
            background-color: #fff;
            border: none;
            padding: 8px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        button.action-button:hover {
            background-color: #f4f6f4;
        }

        button.action-button i {
            margin-right: 5px;
            font-size: 18px;
            /* Adjust the font size here */
        }


        .additional-buttons button.action-button {
            display: inline-block;
        }

        .add-new-button {
            position: absolute;
            top: 80px;
            right: 5%;
            margin-right: 20px;
        }

        .container-popup,
        .container-popup1 {
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

        .home-section {
            margin-top: 2%;
        }

        .box-container {
            /* display: flex; */
            /* justify-content: space-evenly;  */
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 20px;

        }

        .main-content {

            margin: 0;
            width: 100%;
            margin: 20px auto;
            margin-top: 0px;
            background-color: #efefef;
            overflow: hidden;
            padding: 40px 30px 30px 30px;

        }

        .home-section {
            margin-top: 2%;
        }

        a {
            color: #ffff;
        }

        button {
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        button.edit {
            background-color: #2c72ca;
        }

        button.view {
            background-color: #2c72ca;
        }

        button.permission {
            background-color: #2c72ca;
        }

        button.delete {
            background-color: #dc0030;
        }

        a {
            color: #ffff;
        }

        button {
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }
        button.btn-success{
            background-color: #00cc00;
        }
        button.btn-danger{
            background-color: #dc0030;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <div class="main-content">
            <div class="box-container">

                <div id="popupContainer" class="container-popup" data-toggle="modal" data-target="#exampleModal">
                    <div class="popup">


                        <?php include 'UserRole.php' ?>;
                    </div>
                </div>
                <div class="container">
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search...">
                    </div>
                    <button class="add-new-button" onclick="showPopup()">
                        <!-- <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/PackageContro/addnewpackage"> -->
                        <i class="fas fa-plus"></i> Add New
                    </button>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Mobile No</th>
                                <th>Role</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th> <!-- New column for action button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($userResult)) {
                                foreach ($userResult as $userData) { ?>
                                    <tr>
                                        <td><?php echo  $userData['id'] ?></td>
                                        <td><?php echo  $userData['username'] ?></td>
                                        <td><?php echo  $userData['email'] ?></td>
                                        <td><?php echo  $userData['mob_no'] ?></td>
                                        <td><?php echo  $userData['role'] ?></td>
                                        <td><?php echo  $userData['created_at'] ?></td>
                                        <td> <?php
                                                $status = $userData['status'];
                                                if ($status == 1) { ?>
                                                <button class="btn-success" onclick="confirmAction( <?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">Active</button>
                                            <?php } else { ?>
                                                <button class="btn-danger" onclick="confirmAction( <?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">In Active</button>
                                            <?php  } ?>
                                        </td>


                                        <td colspan="2" class="additional-buttons">



                                        <button class="action-button permission">
                                                <a onclick="showEdit(<?php echo  $userData['id'] ?>)" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </button>

                                            <div id="edit_Popup<?php echo $userData['id'] ?>" class="container-popup1">
                                                <div class="edit">
                                                    <?php include 'edit_role.php'; ?>
                                                </div>
                                            </div>


                                            
                                            <button class="action-button view"><a>
                                <i class="fas fa-eye"></i></a>
                            </button>
                                            <button class="action-button permission"><a>
                                                    <i class="fas fa-lock"></i></a>
                                            </button>

                                            <button class=" action-button delete" onclick="confirmDelete(<?php echo $userData['id']; ?>, '<?php echo base_url() . 'index.php/UserRoleContro/deleteData/' . $userData['id'] ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>



                                            <button class="action-button permission">
                                                <a onclick="showPop(<?php echo  $userData['id'] ?>)" data-toggle="modal" data-target="#exampleModal">
                                                    <i class="fas fa-key"></i>
                                                </a>
                                            </button>

                                            <div id="popupContainer1<?php echo $userData['id'] ?>" class="container-popup1">
                                                <div class="popup">
                                                    <?php include 'Password.php'; ?>
                                                </div>
                                            </div>


                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        // Function to show the popup
        function showPopup() {
            document.getElementById("popupContainer").style.display = "block";

        }


        // Function to close the popup
        function closePopup() {
            document.getElementById("popupContainer").style.display = "none";
        }


        function showPop(id) {
            var popupContainer1 = document.getElementById("popupContainer1" + id);
            if (popupContainer1) {
                popupContainer1.style.display = "block";

                // Retrieve the encoded JSON data from the hidden input field
                var userDataInput = document.getElementById("userData");
                if (userDataInput) {
                    var userData = JSON.parse(userDataInput.value);

                    // Fetch the data corresponding to the ID and populate the form fields
                    var userDataById = userData.find(data => data.id === id);
                    if (userDataById) {
                        document.getElementById("name").value = userDataById.name;
                        document.getElementById("parent").value = userDataById.parent;
                        document.getElementById("status").value = userDataById.status;
                        // Update other fields as needed
                    }
                }
            }
        }

        function closePop() {
            document.getElementById("popupContainer1").style.display = "none";
        }

        function stopPop() {
            document.getElementsByClassName("edit").styel.display = "none"
        }


        function confirmAction(id, status) {
            // Display a confirmation dialog
            if (confirm("Are you sure you want to make this action?")) {
                // If the user confirms, navigate to the specified URL

                window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/UserRoleContro/status?id=" + id + "&status=" + status;
            }
        }

        function confirmDelete(id, url) {
            // Display a confirmation dialog
            if (confirm("Are you sure you want to delete this data?")) {
                // If the user confirms, navigate to the specified URL
                window.location.href = url;
            }
        }

        function showEdit(id) {
            var edit_Popup = document.getElementById("edit_Popup" + id);
            if (edit_Popup) {
                edit_Popup.style.display = "block";

                // Retrieve the encoded JSON data from the hidden input field
                var userDataInput = document.getElementById("userData");
                if (userDataInput) {
                    var userData = JSON.parse(userDataInput.value);

                    // Fetch the data corresponding to the ID and populate the form fields
                    var userDataById = userData.find(data => data.id === id);
                    if (userDataById) {
                        document.getElementById("name").value = userDataById.name;
                        document.getElementById("parent").value = userDataById.parent;
                        document.getElementById("status").value = userDataById.status;
                        // Update other fields as needed
                    }
                }
            }
        }
         // Function to close the popup
         function editPopup() {
            document.getElementById("edit_Popup").style.display = "none";
        }
    </script>
</body>

</html>