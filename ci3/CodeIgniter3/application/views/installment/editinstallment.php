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

    /* 
    .add-new-button {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: 20px;
    } */
</style>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->



        <div class="container">
            <!-- New button added for adding new entries -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php echo form_open_multipart(base_url().'index.php/installmentController/editdata/'.$result[0]['id']) ?>
                    <div class="mb-3">
                        <label for="Installment" class="form-label">Enter Installment </label>
                        <input type="text" class="form-control" id="Installment" placeholder="Enter Installment Number That You want to Generate" name="Installment" value="<?php echo $result[0]['Installment']?>">
                        <?php echo  form_error('Installment') ?>
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Generate</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>




        </div>

    </section>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    </script>
</body>

</html>