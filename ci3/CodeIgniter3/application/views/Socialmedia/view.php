<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        home-section{
            margin-top: 12%;
        } 
   </style> 

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" >
        <!-- Button to trigger the popup -->
        <button class="add-new-button btn-primary" data-bs-toggle="modal" data-bs-target="#Socialmedia">
            <i class="fas fa-plus me-2"></i> Add New
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
                        <th>Created On</th>
                        <th>Status</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($result)) {
                        foreach ($result as $d) {
                    ?>
                            <tr>
                                <td><?php echo $d->id ?></td>
                                <td><i class="fa-brands fa-<?php echo  $d->Name ?> "></i> <?php echo $d->Name ?></td>
                                <td><?php echo $d->Created_On ?></td>
                                <td><?php echo $d->Status ?></td>

                           

                                <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/Socialmedia/editdata/" . $d->id  ?>"><i class='bx bxs-message-square-edit'></i></a></td>

                                <td><a class="btn btn-warning" href="<?php echo base_url() . "index.php/Socialmedia/deletedata/" . $d->id  ?>"><i class='bx bxs-trash'></i></a></td>

                                <td><a href="<?= base_url()."index.php/Socialmedia/viewpages/" ?>" class="btn btn-info"><i class='bx bxs-data' style='color:#ffffff'  ></i></a></td>

                                
                   

                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="5">No record Found</td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>


            <!-- Button trigger modal -->


            <!-- Add Modal -->
            <div class="modal fade  modal-dialog-scrollable" id="Socialmedia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Social Media</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php echo form_open(base_url() . "index.php/Socialmedia/view") ?>
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="Enter your name" name="Name">
                                <?php echo form_error("Name") ?>
                            </div>
                            <div class="mb-3">
                                <label for="SocialMedia" class="form-label">FA icon</label>
                                <input type="text" class="form-control" id="SocialMedia" placeholder="Enter Social media Name" name="Socialmediaplatform">
                                <?php echo form_error("Socialmediaplatform") ?>

                            </div>

                            <div class="mb-3">
                                <label for="Status" class="form-label">Status <span style="color: red;    ">*</span> </label>
                                <select class="form-select" aria-label="Default select example" id="Status" name="Status">
                                    <option selected disabled>Open this select menu</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <?php echo form_error("Status") ?>

                            </div>

                            <div class="modal-footer justify-content-center">
                                <input type="submit" class="btn  btn-primary">
                            </div>
                            <?php form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit Modal -->
      





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



          
</body>

</html>