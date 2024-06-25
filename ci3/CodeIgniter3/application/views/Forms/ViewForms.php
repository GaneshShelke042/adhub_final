<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
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
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        .additional-buttons {
            display: flex;
        }

        .add-new-button {
            position: absolute;
            top: 90px;
            right: 5%;
            margin-right: 20px;
        }

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

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .popup button {
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 5px;
        }

        .popup button.no {
            background-color: orange;

        }

        .popup button.yes {
            background-color: blue;
            margin-left: 30%;
            margin-right: 10%;
            gap: 1%;
            float: left;
        }

        .home-section {
            margin-top: 2%;
        }

        a {
            color: #ffff;
        }

        button.edit {
            background-color: #2c72ca;
        }

        button.delete {
            background-color: #dc0030;
        }

        .box-container {
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

        .btn-success {
          
            background-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .details{
            background-color: #63c5da;
            color: #fff;
        }
        .add-new-button{
            background-color: #3944bc;
            color: #fff;
        }
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section">
        <div class="main-content">
            <div class="box-container">
                <!-- Button to trigger the popup -->
                <button class="add-new-button">
                    <a href="http://localhost/adHub/ci3/CodeIgniter3/index.php/FormsContro/addForms"><i class="fas fa-plus"></i> Add New</a>
                </button>

                <div class="container">
                    <!-- New button added for adding new entries -->
                    <!-- Search bar -->
                    <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search...">
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        if ($userData['name'] != $previousName) {
                            ?>
                            <tr>
                                <td><?php echo  $userData['id'] ?></td>
                                <td><?php echo  $userData['name'] ?></td>
                                <td><?php echo  $userData['description'] ?></td>
                                <td><?php echo  $userData['created_at'] ?></td>
                                <td>
                                    <?php
                                        $status = $userData['status'];
                                        if ($status == 1) {   ?>
                                        
                                    <button class="btn-success" onclick="confirmAction('status', '<?php echo $userData['name']; ?>', '<?php echo $userData['status']; ?>')">Active</button>
                                    <?php } else { ?>
                                    <button class="btn-danger" onclick="confirmAction('status', '<?php echo $userData['name']; ?>', '<?php echo $userData['status']; ?>')">In Active</button>
                                    <?php  } ?>
                                </td>
                                <td colspan="2" class="additional-buttons">
                                <button class="edit">
                                                    <a href="<?php echo base_url() . 'index.php/FormsContro/editForm/' . $userData['name'] ?>">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </button>&nbsp;&nbsp;&nbsp;
                                    <button class="delete" onclick="confirmAction('delete', '<?php echo $userData['name']; ?>')">
                                        <a href="javascript:void(0);" class="">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </button>&nbsp;&nbsp;
                                    <button class="details">
                                        <a href="<?php echo base_url().'index.php/FormsContro/addQuestion/'.$userData['name']?>" class="">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </button>&nbsp;&nbsp;
                                </td>
                            </tr>
                            <?php
                                    }
                                    $previousName = $userData['name'];
                                }
                            } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div id="popupContainer" class="container-popup">
            <div class="popup">
                <span class="close" onclick="closePopup()">&times;</span>
                <p id="popupMessage"></p>
                <button class="yes" onclick="proceedAction()" >Yes</button>
                <button class="no" onclick="closePopup()" >No</button>
            </div>
        </div>

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
                    actionName = idOrName;;
                    document.getElementById("popupMessage").innerText = "Are you sure you want to delete the entry" + actionName + "?";
                }
                document.getElementById("popupContainer").style.display = "block";
            }

            function closePopup() {
                document.getElementById("popupContainer").style.display = "none";
            }

            function proceedAction() {
                if (actionType === 'status') {
                    window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/FormsContro/status?name=" + actionName + "&status=" + actionStatus;
                } else if (actionType === 'delete') {
                    window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/FormsContro/deleteData/" + actionName ;


                }
            }
        </script>
    </section>
</body>

</html>