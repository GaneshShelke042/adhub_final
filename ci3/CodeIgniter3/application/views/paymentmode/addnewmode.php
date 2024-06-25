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
    .home-section{
            margin-top:1%;
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
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <?php echo form_open_multipart(base_url() . "index.php/paymentmode/addNewMode") ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Enter Payment Mode </label>
                        <input type="text" class="form-control" name="payment_mode_name" id="Brand_Name" placeholder="Enter Payment Mode ">
                        <?php echo form_error('payment_mode_name') ?>
                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary"></input>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>