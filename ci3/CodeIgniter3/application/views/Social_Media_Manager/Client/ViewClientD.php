<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Add Font Awesome CDN link -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
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
            padding: 5px 5px;
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
            background-color: #00008B;
            position: absolute;
            top: 90px;
            right: 5%;
            margin-right: 20px;
             padding: 5px 15px; 
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
            margin-top:1%;
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
        border-radius: 4px;
        
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

    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" >
    <div class="main-content">
            <div class="box-container"> 

        <?php if ($myClientStatus === '2' || $myClientStatus === '3') { ?>
            <button class="add-new-button"><a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/SMM/Smm_ClientControll/addNew_Smm_Client">
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

                                <td>
                                    <?php

                                    $hold = $userData['hold'];
                                    if ($hold == 1) {   ?>

                                     <span href="#" class="btn hold" onclick="confirmActionHold(<?php echo $userData['id']; ?>, '<?php echo $userData['hold']; ?>')">Hold</span>


                                    <?php } else { ?>
                                        <span href="#" class="btn btn-danger" onclick="confirmActionHold(<?php echo $userData['id']; ?>, '<?php echo $userData['hold']; ?>')">UnHold</span>
                                        <?php  }
                                        ?>
                                </td>
                                <td>
                                    <?php

                                    $status = $userData['status'];
                                    if ($status == 1) {   ?>

                                     <span href="#" class="btn btn-success" onclick="confirmAction(<?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">Active</span>


                                    <?php } else { ?>
                                        <span href="#" class="btn btn-danger" onclick="confirmAction(<?php echo $userData['id']; ?>, '<?php echo $userData['status']; ?>')">In Active</span>
                                        <?php  }
                                        ?>
                                </td>
                                
                                <td colspan="2" class="additional-buttons">


                                    <?php if ($myClientStatus === '3') { ?>
                                        <button class="edit"> <a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_ClientControll/editData/' . $userData['id'] ?>" class="btn btn-primary"><i class="fa fa-edit" style="font-size:20px" ></i> </a></button> &nbsp &nbsp

                                    <?php } ?>


                                    <button class="delete"><a href="<?php echo base_url() . 'index.php/CR_Writer/Cr_ClientControll/deleteData/' . $userData['id'] ?>" class="btn btn-primary"> <i class="fa fa-trash-o" style="font-size:20px"></i> </a></button> &nbsp &nbsp
                                    <button class="permission"> <a href="#" class="btn btn-primary"><i class="fa fa-shield" style="font-size:20px"></i> </a> </button>&nbsp &nbsp &nbsp
                                    <button class="details">
                                        <a href="<?php echo base_url() . 'index.php/UpdateClientContro/viewCalender/' . $userData['id']; ?>" class="btn btn-primary">
                                        <i class="fa fa-eye" style="font-size:20px"  data-toggle="tooltip" title="Details"></i>
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
    <script>
        $(document).ready(function(){
         $('[data-toggle="tooltip"]').tooltip();   
        });
      
    function confirmAction(id, status) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to make this action?")) {
            // If the user confirms, navigate to the specified URL
            window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/SMM/Smm_ClientControll/clientView/status?id=" + id + "&status=" + status;
          
        }
    }

    function confirmActionHold(id, hold) {
        // Display a confirmation dialog
        if (confirm("Are you sure you want to make this action?")) {
            // If the user confirms, navigate to the specified URL
            window.location.href = "http://localhost/adhub/ci3/CodeIgniter3/index.php/SMM/Smm_ClientControll/clientView/hold?id=" + id + "&hold=" + hold;
        }
    }
</script>
</body>

</html>