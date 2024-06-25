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
            margin-top:65%;
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

        /* Style for the popup */
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" style="margin-top: -50%;">


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
                                <td><?php echo  $userData['status'] ?></td>
                                
                              
                                <td colspan="2" class="additional-buttons">
                                <button class="edit" onclick="showPop(<?php echo  $userData['id'] ?>)" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <div id="popupContainer1<?php echo $userData['id'] ?>"  class="container-popup" >
                                        <div class="popup">

                                            <!-- Add form fields or content for adding new item here -->
                                           <?php echo include 'EditPackageGST.php' ?>
                                        </div>
                                    </div>

                                    <button class="delete">
                                    <a href="<?php echo base_url().'index.php/Package_GSTContro/deleteData/'.$userData['id']?>" class="btn btn-primary">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </button>
                                    <button class="chat">
                                        <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/User_con/clientDetails" class="btn btn-primary">
                                            <i class="fas fa-comments"></i>
                                        </a>
                                    </button></td>
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

        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-gnqE98d89zrzpo+AVz8zcx1bFx2Yzru/pBXN54F/KlQV0H6Gk/BBp2HPV5ZEj+yMCKLpCp9L3jAiqtyW3pAexg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <!-- 
    <script>
        function holdRow(button) {
            // Implement hold functionality here
            alert("Hold button clicked");
        }

        function actionRow(button) {
            // Implement action functionality here
            alert("Action button clicked");
        }

        function unholdRow(button) {
            // Implement unhold functionality here
            alert("Unhold button clicked");
        }

        function activeRow(button) {
            // Implement active functionality here
            alert("Active button clicked");
        }

        function editRow(button) {
            // Implement edit functionality here
            alert("Edit button clicked");
        }

        function viewRow(button) {
            // Implement view functionality here
            alert("View button clicked");
        }

        function chatRow(button) {
            // Implement chat functionality here
            alert("Chat button clicked");
        }

        function settingRow(button) {
            // Implement setting functionality here
            alert("Setting button clicked");
        }
    </script> -->

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

            // Function to close the popup
            function closePop() {
                document.getElementById("popupContainer1").style.display = "none";
            }
        </script>
    </section>

</body>

</html>