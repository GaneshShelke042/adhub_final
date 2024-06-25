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
        .home-section{
            margin-top:2%;
        }
        a {
        color:#ffff;
       }
       button.btn-success{
            background-color: #00cc00;
        }
        button.btn-danger{
            background-color: #dc0030;
        }
        /* Style for the popup */
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" >
    <div class="main-content">
        <div class="box-container"> 


        <!-- Button to trigger the popup -->
        <button class="add-new-button" onclick="showPopup()">
            <i class="fas fa-plus"></i> Add New
        </button>

        <!-- Popup container -->
        <div id="popupContainer" class="container-popup"  data-toggle="modal" data-target="#exampleModal"  >
            <div class="popup">
                <!-- Add form fields or content for adding new item here -->
                <?php include 'AddNewPackageGST.php'; ?>
            </div>
        </div>

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
                        <th>CGST(%)</th>
                        <th>SGST(%)</th>
                        <th>Total(%)</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row, you can dynamically generate rows using JavaScript -->

                    <?php if (!empty($result)) {
                        foreach ($result as $userData) { ?>
                            <tr>
                                <td><?php echo  $userData['id'] ?></td>
                                <td><?php echo  $userData['name'] ?></td>
                                <td><?php echo  $userData['cgst'] ?></td>
                                <td><?php echo  $userData['sgst'] ?></td>
                                <td><?php echo  $userData['total'] ?></td>


                                <td>  <?php
                                            $status = $userData['status'];
                                            if ($status == 1) { ?>
                                                <button class="btn-success" onclick="confirmAction( <?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">Active</button>
                                            <?php } else { ?>
                                                <button class="btn-danger" onclick="confirmAction( <?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">In Active</button>
                                            <?php  } ?></td>    

                                
                              
                                <td colspan="2" class="additional-buttons">
                                <button class="edit" onclick="showPop(<?php echo  $userData['id'] ?>)" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="delete">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <div id="popupContainer1<?php echo $userData['id'] ?>"  class="container-popup" >
                                        <div class="popup">

                                            <!-- Add form fields or content for adding new item here -->
                                           <?php echo include 'EditPackageGST.php' ?>
                                        </div>
                                    </div>&nbsp;&nbsp;&nbsp;

                                    

                                    <button class="delete" onclick="confirmDelete(<?php echo $userData['id']; ?>, '<?php echo base_url() . 'index.php/Package_GSTContro/deleteData/' . $userData['id'] ?>')">
        <i class="fas fa-trash-alt"></i>
    </button>
                                  
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

      

        <script>
             $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();   
        });
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

            // Function to close the popup
            function closePop() {
                document.getElementById("popupContainer1").style.display = "none";
            }


            function confirmAction(id, status) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to make this action?")) {
            // If the user confirms, navigate to the specified URL
            
            window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/Package_GSTContro/status?id=" + id + "&status=" + status;
        }
    }

    function confirmDelete(id, url) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to delete this data?")) {
            // If the user confirms, navigate to the specified URL
            window.location.href = url;
        }
    }

    


        </script>
    </section>

</body>

</html>