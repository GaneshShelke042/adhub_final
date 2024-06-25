<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .container {
            /* margin-top:65%; */
            /* max-width: 900px; */
            width: 100%;
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
            background-color: #fff;
        }

        button.delete {
            background-color: #fff;
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

        */ button i {
            align-content: center;
            margin-right: 5px;
        }

        .additional-buttons {
            display: flex;
        }

        /* Positioning for the new button */
        .add-new-button {
            position: absolute;
            top: 90px;
            right: 5%;
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
        .home-section{
            margin-top:1%;
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
        a {
        color:#ffff;
       }

        /* Style for the popup */
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section">
    <div class="main-content">
        <div class="box-container"> 
        <div class="container">

            <!-- New button added for adding new entries -->

            <!-- Search bar -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchTable()">
            </div>

            <button class="add-new-button"><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/CustomTaskContro/addNewClient">
                    <i class="fas fa-plus"></i> Add New</a>
            </button>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Name</th>
                        <th>Catogory</th>
                        <th>Created On</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row, you can dynamically generate rows using JavaScript -->
                    <?php if (!empty($result)) {
                        foreach ($result as $userData) { ?>
                            <tr>
                                <td><?php echo $userData['id']; ?></td>
                                <td><?php echo $userData['client_name']; ?></td>
                                <td><?php echo $userData['task_name']; ?></td>
                                <td><?php echo $userData['category']; ?></td>
                                <td><?php echo $userData['created_at']; ?></td>
                                <td><?php echo $userData['task_details']; ?></td>

                                <!-- <td><button class="hold" onclick="holdRow(this)"><i class="fas fa-hand-paper"></i> Hold</button></td>
                            <td><button class="active" onclick="activeRow(this)"><i class="fas fa-check-circle"></i> Active</button></td> -->
                                <td colspan="2" class="additional-buttons">
                                    <button class="hold">
                                        <a href="<?php echo base_url() . 'index.php/CustomTaskContro/updateTask/' . $userData['id']; ?>" class="">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <button class="delete">
                                        <a href="<?php echo base_url() . 'index.php/CustomTaskContro/deleteTask/' . $userData['id']; ?>" class="">
                                            <i class="fas fa-trash-alt"></i> 
                                        </a>
                                    </button> &nbsp &nbsp
                                    <button class="hold">
                                        <a href="#" class="btn btn-primary">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                    </button> &nbsp &nbsp

                                </td>

                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="7">Record not found</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
                    </div>
                    </div>
    </section>
</body>

</html>