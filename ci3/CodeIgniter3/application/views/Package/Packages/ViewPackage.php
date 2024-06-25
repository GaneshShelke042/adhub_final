<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {

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


        /* 

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
        } */

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
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            border-radius: 8px;
            position: relative;
        }


        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor:
                pointer;
        }

        /* switch */

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
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

        button.delete {
            background-color: #dc0030;
        }

        button.btn-success {
            background-color: #00cc00;
        }

        button.btn-danger {
            background-color: #dc0030;
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
                    <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/PackagesController/addNewClient"><i class="fas fa-plus"></i> Add New</a>
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
                                <th>Type</th>
                                <!-- <th>Days</th> -->
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($result)) {
                                foreach ($result as $userData) { ?>
                                    <tr>
                                        <td><?php echo  $userData['id'] ?></td>
                                        <td><?php echo $userData['Package_name'] ?></td>

                                        <td><?php echo  $userData['category'] ?></td>
                                        <!-- <td>30</td> -->
                                        <td><?php echo  $userData['date_created'] ?></td>

                                        <td> <?php
                                                $status = $userData['status'];
                                                if ($status == 1) { ?>
                                                <button class="btn-success" onclick="confirmAction(  '<?php echo $userData['Package_name']; ?>', '<?php echo $userData['status']; ?>')">Active</button>
                                            <?php } else { ?>
                                                <button class="btn-danger" onclick="confirmAction( '<?php echo $userData['Package_name']; ?>', '<?php echo $userData['status']; ?>')">In Active</button>
                                            <?php  } ?>
                                        </td>


                                        <td colspan="2" class="additional-buttons">
                                            <button class="edit">
                                                <a href="<?php echo base_url() . 'index.php/PackagesController/updateData/' . $userData['Package_name'] ?>" class="">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </button>&nbsp;&nbsp;&nbsp;
                                            <button class="delete" onclick="confirmDelete('<?php echo $userData['Package_name'] ?>', '<?php echo base_url() . 'index.php/PackagesController/deleteData/' . $userData['Package_name'] ?>')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            &nbsp;&nbsp;
                                        </td>
                                    </tr>
                            <?php }
                            } else  ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script>
        function confirmAction(Package_name, status) {
            // Display a confirmation dialog
            if (confirm("Are you sure you want to make this action?")) {
                // If the user confirms, navigate to the specified URL

                window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/PackagesController/status?Package_name=" + Package_name + "&status=" + status;
            }
        }

        function confirmDelete(Package_name, url) {
            // Display a confirmation dialog

            if (confirm("Are you sure you want to delete Package")) {
                console.log(url);
                fetch(url)
                    .then((res) => {
                        console.log(res);
                        return res.json();
                    }).then(res => {
                        console.log(res);
                        window.location.reload();

                    }).catch(e => {
                        console.log(e);
                    })
            }

        }
    </script>


</body>

</html>