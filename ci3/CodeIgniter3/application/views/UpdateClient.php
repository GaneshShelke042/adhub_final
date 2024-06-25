<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    


        .img img {
            background-color: rgb(231, 230, 230);
            margin-top: 5%;
            max-width: 15%;
            /* Maximum width of the image */
            height: 15%;
            /* Maintain aspect ratio */
        }

        .label {
            font-size: 24px;
            /* Adjustable font size */
            font-weight: 500;
            /* Adjustable font weight */
        }

        .tags {
            margin-top: 20px;
            /* Add some margin */
        }

        .tags-row {
            margin-bottom: 5px;
            /* Add margin between rows */
        }

        .tags a {
            display: inline-block;
            /* Display anchor tags inline */
            margin: 3px;
            /* Add margin between anchor tags */
            padding: 4px 8px;
            /* Add padding to anchor tags */
            background-color: #4CAF50;
            /* Green background color */
            color: white;
            /* White text color */
            text-decoration: none;
            /* Remove underline from anchor tags */
            border: none;
            /* Remove border */
            border-radius: 2px;
            /* Add border radius */
            cursor: pointer;
            /* Change cursor to pointer */
        }
        .form-Section{
            border: 1px ; /* Add a black border */
            box-shadow: 0 0 10px rgba( 0.5, 0.5, 0.5, 0.5); /* Add a shadow */
            padding-top: 5%;
            padding-bottom: 5%;
            background-color: rgb(255, 255, 255);
            width: 40%;
            margin-left: 5%;
            margin-top: 5%;
            text-align: center;
            max-height: 100%;
    /* Center the content horizontally */
        }
    </style>
</head>

<body>
    <section class="home-section">


    <?php  $id_from_url = $this->uri->segment(3); // Assuming the ID is the third segment in the URL ?>
    <input type="hidden" name="client_id" value=" <?php echo $id_from_url ?> ">

        <div class="body">
            <div class="form-Section">
            <div class="img">
                <?php 
                if(!empty($addnewclient1)){
                    foreach($addnewclient1 as $client){ 
                        if( $id_from_url == $client['id']){?>
                        <img src="<?php echo base_url() ?>Image/PackageServies/<?php echo $client['image']; ?>" style="height: 80px; width: 120px; border-radius: 50px;  "><br>
                         <div class="label"> <?php  echo  $client['brand_name'] ?>   </div> 

                  <?php 
                         }
                         }

                } ?>
             
            </div>

            <div class="tags">
                <!-- First row with 4 buttons -->



                <div class="tags-row">
                    <?php
                    if (!empty($result)) {
                        $previousName = null;
                        foreach ($result as $userData) {
                            if ($userData['name'] != $previousName) {
                                foreach ($check as $checks) {
                                    // Check if the current name is different from the previous one
                                    if ($userData['name'] == $checks['question']) { ?>


                                        <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">54 Question</a>

                    <?php
                                    }
                                    // Update previousName with the current name
                                    $previousName = $userData['name'];
                                }
                            }
                        }
                    }
                    ?>
               




              
                    <?php
                    if (!empty($result)) {
                        $previousName = null;
                        foreach ($result as $userData) {
                            if ($userData['name'] != $previousName) {
                                foreach ($check as $checks) {
                                    // Check if the current name is different from the previous one
                                    if ($userData['name'] == $checks['tgform']) { ?>



                                        <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">TG Form</a>

                    <?php
                                    }
                                    // Update previousName with the current name
                                    $previousName = $userData['name'];
                                }
                            }
                        }
                    }
                    ?>


                    
<?php
                        if (!empty($result)) {
                            $previousName = null;
                            foreach ($result as $userData) {
                                if ($userData['name'] != $previousName) {
                                    foreach ($check as $checks) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] == $checks['painpoint']) { ?>



                                            <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Pain Point</a>


                        <?php
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                            }
                        }
                        ?>
                </div>

                <div class="tags-row">
                    <?php
                    if (!empty($result)) {
                        $previousName = null;
                        foreach ($result as $userData) {
                            if ($userData['name'] != $previousName) {
                                foreach ($check as $checks) {
                                    // Check if the current name is different from the previous one
                                    if ($userData['name'] == $checks['requirement']) { ?>


                                        <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Requirement</a>

                    <?php
                                    }
                                    // Update previousName with the current name
                                    $previousName = $userData['name'];
                                }
                            }
                        }
                    }
                    ?>



<?php
                    if (!empty($result)) {
                        $previousName = null;
                        foreach ($result as $userData) {
                            if ($userData['name'] != $previousName) {
                                foreach ($check as $checks) {
                                    // Check if the current name is different from the previous one
                                    if ($userData['name'] == $checks['language']) { ?>


                                        <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Language</a>

                    <?php
                                    }
                                    // Update previousName with the current name
                                    $previousName = $userData['name'];
                                }
                            }
                        }
                    }
                    ?>

                           




                            <!-- <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/UpdateClientContro/viewClientCalender" class="btn ripple btn-success btn-sm mt-1">Calendar</a> -->
                            <?php
                            if (!empty($addnewclient1)) {

                       

                            ?>
                                <a href="<?php echo base_url() . 'index.php/UpdateClientContro/viewClientCalender/' . $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Calendar</a>
                            <?php
                            }

                            ?>

                         

<?php
                    if (!empty($result)) {
                        $previousName = null;
                        foreach ($result as $userData) {
                            if ($userData['name'] != $previousName) {
                                foreach ($check as $checks) {
                                    // Check if the current name is different from the previous one
                                    if ($userData['name'] == $checks['offer']) { ?>


                                        <a href="<?php echo base_url() . 'index.php/FormsContro/addQuestion/' . $userData['name'].'/'.  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Offer</a>

                    <?php
                                    }
                                    // Update previousName with the current name
                                    $previousName = $userData['name'];
                                }
                            }
                        }
                    }
                    ?>
                        
                        <a href="<?php echo base_url() . 'index.php/User_con/viewClient_Package/' .  $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Package</a> </div>

                        <!-- Third row with 3 buttons -->
                        <div class="tags-row">
                        <?php
                    if (!empty($addnewclient1)) {

                        $id_from_url = $this->uri->segment(3); // Assuming the ID is the third segment in the URL

                    ?>
                        <a href="<?php echo base_url() . 'index.php/Digitalfile/view/' . $id_from_url ?>" class="btn ripple btn-success btn-sm mt-1">Digital Files</a>
                    <?php
                    }

                    ?>
                           
                            <a href="#" class="btn ripple btn-success btn-sm mt-1">Completed Calendar</a>
                        </div>
                    </div>
            </div>
                </div>
    </section>
</body>

</html>