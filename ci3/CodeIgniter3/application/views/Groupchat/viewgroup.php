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

        #image {
            width: 250px;
            height: 250px;
        }

        table {
            width: 100%;
        }

        .spanicon {
            display: inline;
            width: fit-content;
        }

        .bxs-user-circle {
            font-size: 45px;
        }

        /* Style for the popup */
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section" >




        <div class="container">
            <!-- New button added for adding new entries -->
            <!-- Search bar -->
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <img class="image" src="<?php
                                                if (!empty($image)) {
                                                    echo base_url('chatprofile/' . $image[0]['image']);
                                                } else {
                                                    echo base_url('img/Gallery1.jpeg');
                                                }
                                                ?>" id="image" alt="Image">
                    </div>



                    <div class="row justify-content-center">
                        <div class="col-md-5 ">
                            <table class="mt-3">
                                <tbody>
                                    <tr>
                                        <th class="p-2 border">Name</th>
                                        <th class="p-2 border"> <?= $data[0]['Name'] ?></th>
                                    </tr>
                                    <tr>
                                        <th class="p-2 border">Member</th>
                                        <?php foreach ($users as $key) 
                                        { ?>
                                            <th class="d-flex flex-column p-2 border">
                                                <p class="d-flex">
                                                    <span class="spanicon p-2"><i class='bx bxs-user-circle'></i></span>
                                                    <span class="d-inline m-3"> <?= $key['username'];  ?></span>
                                                </p>
                                            </th>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <th class="p-2 border">Status</th>
                                        <th class="p-2 border"><?= $data[0]['Status'] ?></th>
                                    </tr>
                                    <tr>
                                        <th class="p-2 border">Created On</th>
                                        <th class="p-2 border"><?= $data[0]['created_on'] ?></th>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="text-center">
                        <a href="<?php echo base_url() ?>index.php/Groupchat/Manage" class="btn btn-secondary m-5">Close</a>
                    </div>





                </div>
            </div>

        </div>






    </section>



</body>

</html>