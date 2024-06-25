<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
            margin-top:2%;
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
</style>

<body>
    <section class="home-section" >
        
    <div class="main-content">
    <div class="box-container">
        <!-- Button to trigger the popup -->



        <div class="container">
            <!-- New button added for adding new entries -->
            <div class="text-center">
                <h1>SMC Payment</h1>
            </div>

            <!-- Search bar -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Package</th>


                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
                    if (!empty($result)) {
                        foreach ($result as $s) {
                    ?>
                            <tr>
                                <td><?= $s['id']; ?></td>
                                <td><?= $s['brand_name']; ?></td>
                                <td><?= $s['package']; ?></td>
                                <td>
                                    <a href="<?php echo base_url() . "index.php/SMCpayment/addpayment/" . $s['id'] ?>" class="btn btn-primary">Add payment </a>
                                    <a href="<?php echo base_url() . "index.php/SMCpayment/checkhistory/" . $s['id'] ?>" class="btn btn-warning">Check History</a>
                                </td>
                            </tr>
                        <?php    }
                    } else {

                        ?>

                        <tr>
                            <td colspan="4">No record Found</td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
                    </div>
                    </div>
    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>