<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {
            margin-top:65%;
            /* max-width: 900px; */
            width: 100%;
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
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" style=" margin-top: -50%;">

        <?php if ($myClientStatus === '2' || $myClientStatus === '3') { ?>
            <button class="add-new-button"><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/Head_CR_Writer/Head_Cr_ClientControll/addNew_Cr_Client">
                    <i class="fas fa-plus"></i> Add New</a>
            </button>
        <?php } ?>

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
                        <th>Brand Name</th>
                        <th>Mobile Number</th>
                        <th>Package</th>
                        <th>Reference by</th>
                        <th>Hold</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row, you can dynamically generate rows using JavaScript -->

                    <?php if (!empty($addnewclient1)) {
                         foreach ($matchedClients as $userData){ ?>
                            <tr>
                                <td><?php echo  $userData['id'] ?></td>
                                <td><?php echo  $userData['brand_name'] ?></td>
                                <td><?php echo  $userData['mobile_number'] ?></td>
                                <td><?php echo  $userData['package'] ?></td>
                                <td><?php echo  $userData['reference_by'] ?></td>

                                <td><button class="hold" onclick="holdRow(this)"><i class="fas fa-hand-paper"></i> Hold</button></td>
                                <td><button class="active" onclick="activeRow(this)"><i class="fas fa-check-circle"></i> Active</button></td>
                                <td colspan="2" class="additional-buttons">


                                    <?php if ($myClientStatus === '3') { ?>
                                        <button class="hold"> <a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_ClientControll/editData/' . $userData['id'] ?>" class="btn btn-primary">edit </a></button> &nbsp &nbsp

                                    <?php } ?>


                                    <button class="delete"><a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_ClientControll/deleteData/' . $userData['id'] ?>" class="btn btn-primary"> Delete </button> &nbsp &nbsp
                                    <button class="hold"> <a href="#" class="btn btn-primary">chat </a> </button>&nbsp &nbsp &nbsp
                                    <button class="hold">
                                        <a href="<?php echo base_url() . 'index.php/UpdateClientContro/viewCalender/' . $userData['id']; ?>" class="btn btn-primary">
                                            Details
                                        </a>
                                </td>
                            </tr>

                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5"> record not found</td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>


    </section>

</body>

</html>