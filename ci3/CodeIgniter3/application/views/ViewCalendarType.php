<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <!-- Include FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <style>
        /* CSS for table */
        /* table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            /* Center-align table content */
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
            /* Add shadow effect */

        /* } */

        /* th,
        td {
            padding: 8px;
        }

        th {
            background-color: #ffff;
        } */

        /* CSS for action buttons */
        /* .action-btn {
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            outline: none;
            border-radius: 3px;
        }

        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }

        .delete-btn {
            background-color: #f44336;
            color: white;
        } */

        /* CSS for icon */
        /* .action-btn i {
            margin-right: 5px; */
            /* Add space between icon and text */
        /* } */

        /* Optional: Adjust spacing between buttons */
        /* .action-btn+.action-btn {
            margin-left: 10px;
        } */

        /* CSS for search bar */
        /* .dataTables_filter {
            text-align: right;
        } */
/* 
        .dataTables_filter label {
            margin-right: 20px;
        } */

        /* CSS for button container */
        /* .button-container {
            text-align: right;
            margin-bottom: 10px; */
            /* Add margin at the bottom */
        /* }

        .button-container {
            text-align: center; */
            /* Center-align the button */
            /* margin-bottom: 20px; */
            /* Add margin at the bottom */
        /* }

        #newButton {
            margin-top:5%; 
            background-color: #007bff; */
            /* Blue color for the button */
            /* color: white; */
            /* White text color */
            /* border: none; */
            /* Remove border */
            /* border-radius: 3px; */
            /* Add border radius */
            /* padding: 8px 16px; */
            /* Adjust padding */
            /* cursor: pointer; */
            /* Add cursor pointer */
            /* */

            /* margin-left: 90%;
        /* } */
        /* .home-section{
            margin-top:1%;
        } */
        /* #newButton:hover {
            background-color: #0056b3; */
            /* Darker blue color on hover */
        /* } */  */
            /* body { 
        background-color: var(--background-color4); 
        max-width: 100%; 
        overflow-x: hidden; 
        }
        :root { 
    --background-color1: #fafaff; 
    --background-color2: #ffffff; 
    --background-color3: #ededed; 
    --background-color4: #cad7fda4; 
    --primary-color: #4b49ac; 
    --secondary-color: #0c007d; 
            } */
            .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            margin-right: 15PX;
            border: 1px solid #ccc;
            border-radius: 8px;

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
            padding: 10px 15px;
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

        button.permission {
            background-color: #3c3f98;
        }
        button.details {
            background-color: #3198d5;
        }
      
        button.delete {
            background-color: #dc0030;
        }

        button.unhold {
            background-color: #e68a00;
        }

        button.active {
            background-color: #00cc00;
        }

        button.edit {
            background-color: #2c72ca;
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
            top: 90px;
            right: 5%;
            margin-right: 20px;
            /* color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    margin-bottom: 6px; */
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
        .home-section{
            margin-top:2%;
        }
        .btn-success{
            background-color: #28a745; 
            border-radius: 5px;
            padding:5px;
            color:#ffff
        }
       .btn-danger{
        background-color: #ff473d;
        border-radius: 5px;
        padding:5px;
        color:#ffff;
       }
        a {
        color:#ffff;
       }
       .hold{
        background-color: #ffcc00;
        border-radius: 5px;
            padding:5px;
            color:#ffff
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
        .container-popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
          
            background-color: rgba(0, 0, 0, 0.4);
        }
        .popup {
            background-color: #fefefe;
            margin: 20% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            max-width: 450px;
            border-radius: 8px;
            position: relative;
            text-align: center;
        }
        .yes{
            margin-left: 30%;
            margin-right: 10%;
            float: left;
        }

    </style>
</head>

<body>
<section class="home-section" >
<div class="main-content">
    <div class="box-container"> 
        <div class="container"> 
             <!-- Button container -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
                <div class="button-container">
                    <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/AddNewCalendarControllers/insertData" ><button id="newButton" class="add-new-button">New Button</button></a>
                </div>   
            </div>

            <table id="dataTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Selected Days</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>


                    <?php

                    if (!empty($calendar)) {
                        foreach ($calendar as $userData) { ?>
                            <tr>
                                <td><?php echo  $userData['id'] ?></td>
                                <td><?php echo $userData["name"] ?></td>
                                <td> <?php echo $userData["frequency"] ?></td>
                                <td><?php
                                        $status = $userData['status'];
                                        if ($status == 1) {   ?>
                                    <button class="btn-success" onclick="confirmAction('status', '<?php echo $userData['id']; ?>', '<?php echo $userData['status']; ?>')">Active</button>
                                    <?php } else { ?>
                                    <button class="btn-danger" onclick="confirmAction('status', '<?php echo $userData['id']; ?>', '<?php echo $userData['status']; ?>')">In Active</button>
                                    <?php  } ?></td>
                                <td colspan="2" class="additional-buttons">
                                    <a  href="<?php echo base_url() . 'index.php/AddNewCalendarControllers/editCalendar/'.$userData['id'] ?>">
                                        <button class='action-btn edit-btn edit' data-toggle="tooltip" title="Edit"><i class='fas fa-edit'></i></button>
                                    </a>&nbsp &nbsp

                                    <button class="delete" onclick="confirmAction('delete', '<?php echo $userData['id']; ?>')">
                                        <a href="javascript:void(0);" class="">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </button>
                                
                                </td>
                            </tr>
                        <?php    }
                    } else { ?>

                        <tr>
                            <td colspan='4'>No data available</td>
                        </tr>";
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="popupContainer" class="container-popup">
            <div class="popup">
                <span class="close" onclick="closePopup()"></span>
                <p id="popupMessage"></p>
                <button class="yes" onclick="proceedAction()">Yes</button>
                <button class="no" onclick="closePopup()">No</button>
            </div>
        </div>
            
    <!-- <script>
    // JavaScript code for handling the new button
    $(document).ready(function() {
        // Function to handle click event on the new button
        $('#newButton').click(function() {
            // alert('New button clicked');
            // You can add your custom functionality here
        });

        // DataTable initialization
        $('#dataTable').DataTable();
    });


    
</script> -->
<script>

var actionType = "";
            var actionId = "";
            var actionName = "";
            var actionStatus = "";

function confirmAction(type, idOrName, status) {
                actionType = type;
                if (type === 'status') {
                    actionName = idOrName;
                    actionStatus = status;
                    document.getElementById("popupMessage").innerText = "Are you sure you want to change the status for " + actionName + "?";
                } else if (type === 'delete') {
                    actionName = idOrName;
                    document.getElementById("popupMessage").innerText = "Are you sure you want to delete the entry" + actionName + "?";
                }
                document.getElementById("popupContainer").style.display = "block";
            }

            function proceedAction() {
                if (actionType === 'status') {
                    window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/AddNewCalendarControllers/status?id=" + actionName + "&status=" + actionStatus;
                } else if (actionType === 'delete') {
                    window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/AddNewCalendarControllers/deleteCalendar/" + actionName;


                }
            }


 $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();   
        });



    function openEditModal(id, selectedDays) {
        var editConfirmed = confirmEdit();
        if (editConfirmed) {
            // Redirect to the editData.php page with the editId and selectedDays parameters
            window.location.href = 'editData.php?editId=' + id + '&selectedDays=' + encodeURIComponent(selectedDays);
        }
    }

    function confirmEdit() {
        return confirm("Are you sure you want to edit this package?");
    }
    function closePopup() {
                document.getElementById("popupContainer").style.display = "none";
            }
    
</script>
</section>

</body>

</html>