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
        /* Adjust padding to change button size */
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
    <section class="home-section" >
        <!-- Button to trigger the popup -->



        <div class="container">
            <!-- New button added for adding new entries -->


            <!-- Search bar -->
            <div class="search-container">
                <?php
                if (!empty($result)) {
                    echo form_open_multipart(base_url() . "index.php/paymentcontroller/viewpayment_filtered/" . $result[0]['client_id'])  ?>
                    <label for="searchInputfrom">From</label>
                    <input type="date" id="searchInputfrom" placeholder="from" name="from_date">
                    <?php echo form_error('from_date') ?>

                    <label for="searchInputto">&nbsp;To&nbsp;&nbsp;</label>
                    <input type="date" id="searchInputto" placeholder="from" name="to_date">
                    <?php echo form_error('to_date') ?>


                    <input type="submit" value="show" class="btn btn-primary ms-2">
                <?php echo form_close();
                } ?>
            </div>

            <div class="row">
                <div class="col-md-5 offset-3">
                    <table>
                        <thead>
                            <tr>
                                <th>
                                    Payment Amt
                                </th>
                                <th>
                                    Payment Date
                                </th>
                                <th>
                                    Mode
                                </th>
                                <th colspan="3">
                                    Action
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            if (!empty($result)) {  ?>
                                <?php
                                $reversedResult = array_reverse($result);
                                $totalsum = 0;
                                foreach ($reversedResult as $d) {  ?>
                                    <tr>
                                        <td><?php echo $d['payment_amt']; ?>&nbsp;&nbsp;&#8377;</td>
                                        <td><?php echo $d['payment_date']; ?></td>
                                        <td><?php echo $d['mode']; ?></td>
                                        <td><a href="<?php echo base_url() ?>index.php/paymentcontroller/editpayment/<?php echo $d['id'] ?>" class="btn btn-primary"><i class='bx bxs-message-square-edit'></i></a></td>
                                        <td><a href="<?php echo base_url() ?>index.php/paymentcontroller/Deletepayment/<?php echo $d['id'] ?>" class="btn btn-warning"><i class='bx bxs-trash'></i></a></td>
                                        <td><a href="<?php echo base_url() ?>index.php/paymentcontroller/detailview/<?php echo $d['id'] ?>" class="btn btn-secondary"><i class='bx bxs-low-vision'></i></a></td>
                                    </tr>
                                <?php
                                    $totalsum += $d['payment_amt'];
                                } ?>
                                <tr>
                                    <td colspan="2">Total :- &nbsp; &nbsp; <?php echo $totalsum; ?> &#8377;</td>
                                </tr>
                            <?php
                            } else {
                            ?>
                                <tr>
                                    <td colspan="2" class="no-record">No record found</td>
                                </tr>
                            <?php
                            } ?>


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