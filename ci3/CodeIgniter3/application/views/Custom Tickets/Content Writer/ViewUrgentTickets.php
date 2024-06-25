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
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            /* Center-align table content */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Add shadow effect */

        }

        th,
        td {
            padding: 8px;
        }

        th {
            background-color: #ffff;
        }

        /* CSS for action buttons */
        .action-btn {
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
        }

        /* CSS for icon */
        .action-btn i {
            margin-right: 5px;
            /* Add space between icon and text */
        }

        /* Optional: Adjust spacing between buttons */
        .action-btn+.action-btn {
            margin-left: 10px;
        }

        /* CSS for search bar */
        .dataTables_filter {
            text-align: right;
        }

        .dataTables_filter label {
            margin-right: 20px;
        }

        /* CSS for button container */
        .button-container {
            text-align: right;
            margin-bottom: 10px;
            /* Add margin at the bottom */
        }

        .button-container {
            text-align: center;
            /* Center-align the button */
            margin-bottom: 20px;
            /* Add margin at the bottom */
        }

        #newButton {
            background-color: #007bff;
            /* Blue color for the button */
            color: white;
            /* White text color */
            border: none;
            /* Remove border */
            border-radius: 3px;
            /* Add border radius */
            padding: 8px 16px;
            /* Adjust padding */
            cursor: pointer;
            /* Add cursor pointer */
            /* */

            margin-left: 90%;
        }

        #newButton:hover {
            background-color: #0056b3;
            /* Darker blue color on hover */
        }
    </style>
</head>

<body>
    <section class="home-section" style="margin-top: -50%;">

        <!-- Button container -->
        <div class="button-container">
            <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/AddNewCalendarControllers/insertData"><button id="newButton">New Button</button></a>

        </div>

        <table id="dataTable" class="display">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>


                <?php

                if (!empty($calendar)) {
                    foreach ($calendar as $userData) { ?>
                        <tr>

                            <td><?php echo $userData["name"] ?></td>
                            <td> <?php echo $userData["frequency"] ?></td>
                            <td> <?php echo $userData["status"] ?></td>

                        </tr>
                <?php    }
                }  ?>
            </tbody>
        </table>
    </section>

</body>

</html>