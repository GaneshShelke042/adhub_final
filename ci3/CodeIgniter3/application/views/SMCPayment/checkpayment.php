<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
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
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        margin-bottom: 6px;
    }

    /* Style for the search bar */
    .search-container {
        margin-bottom: 20px;
    }

    .search-container input[type=date] {
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
 

    
    
</style>

<body>
    <section class="home-section">
        <div class="container">
            <div class="search-container">

            </div>

            <div class="row">
                <div class="col-md-5 offset-3">
                    
                    <table>
                        <thead>
                        <?php if (!empty($result)) { ?>
                            <tr>
                                <th colspan="8">Brand Name :- <?php echo $result[0]["Brand_Name"]; ?></th>
                            </tr>
                            <tr>
                                <!-- <th>Brand name</th> -->
                                <th>Total Amt</th>
                                <th>Total Installment</th>
                                <th>Received Amt</th>
                                <th>Complete Installment</th>
                                <th>Status</th>
                                <th colspan="3">Action</th> <!-- Added colspan="2" here -->
                            </tr>
                        </thead>
                        <tbody>
                           
                                <?php foreach ($result as $d) { ?>
                                    <tr>
                                        <!-- <td> <?php echo $d['Brand_Name']; ?></td> -->
                                        <td><?php echo $d['totalamt']; ?>&nbsp;&nbsp;&#8377;</td>
                                        <td><?php echo $d['installment']; ?></td>
                                        <td><?php
                                            if ($d['received_amt'] == null) {
                                                echo "0";
                                            } else {
                                                echo $d['received_amt'];
                                            }



                                            ?></td>
                                        <td><?php

                                            if ($d['current_installment'] == null) {
                                                echo "0";
                                            } else {
                                                echo $d['current_installment'];
                                            }


                                            ?></td>
                                        <td><?php if($d['totalamt'] == $d['received_amt'])
                                        {
                                            echo "Paid";
                                        }
                                        else if ( $d['received_amt']>$d['totalamt'] )
                                        {
                                            echo "Paid";
                                        }
                                        else{
                                            echo "Unpaid";
                                        }
                                        
                                        ?></td>
                                        <td>
                                            <a href="<?php echo base_url() ?>index.php/SMCpayment/AddEMI/<?php echo $d['id'] ?>" class="btn btn-primary ">EMI</a>
                                        </td>

                                        <td><a href="<?php echo base_url() ?>index.php/SMCpayment/DeleteEMI/<?php echo $d['id'] ?>" class="btn btn-warning "><i class='bx bxs-trash'></i></a>
                                        <td>
                                            <a href="<?php echo base_url() ?>index.php/SMCpayment/Viewemis/<?php echo $d['id'] ?>" class="btn btn-success "><i class='bx bx-low-vision'></i></a>
                                        </td>
                                        </td>

                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="6" class="no-record">No record found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>