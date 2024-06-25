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

    .image-upload {
        position: relative;
        cursor: pointer;
        border: 2px solid #ccc;
        border-radius: 5px;
        width: 100%;
        overflow: hidden;
    }

    .uploaded-image {
        width: 100%;
        height: 50%;
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
    <section class="home-section">
    <div class="main-content">
    <div class="box-container">
        <!-- Button to trigger the popup -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php echo form_open_multipart(base_url() . "index.php/SMCpayment/AddEMI/" . $result->id) ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" name="Brand_Name" id="Brand_Name" value="<?php echo $result->Brand_Name ?? '' ?>" readonly>
                        <?php echo form_error('Brand_Name') ?>
                    </div>


                    <div class="mb-3">
                        <label for="installment" class="form-label">Number Of installment</label>
                        <input type="text" class="form-control" name="installment" id="installment" value="<?php
                                                                                                            if ($result->current_installment == null) {
                                                                                                                echo  $result->installment - 0;
                                                                                                            } else {
                                                                                                                echo $result->installment - $result->current_installment;
                                                                                                            }


                                                                                                            ?>" readonly>

                        <?php echo form_error('installment') ?>
                    </div>

                    <div class="mb-3">
                        <label for="payment_amt" class="form-label">Payment Amount</label>
                        <input type="text" class="form-control" name="payment_amt" id="payment_amt" value="<?php echo ($result->totalamt - $result->received_amt) ?? '' ?>" readonly>
                        <?php echo form_error('payment_amt') ?>
                    </div>

                    <div class="mb-3">
                        <label for="EMI" class="form-label">per Installment</label>
                        <input type="text" class="form-control" name="EMI" id="EMI" value="<?php
                                                                                            if ($result->totalamt == $result->received_amt) {
                                                                                                echo "0";
                                                                                            } else {
                                                                                                echo ($result->totalamt / $result->installment);
                                                                                            } ?>"></input>
                        <?php echo form_error('EMI') ?>
                    </div>

                    <div class="mb-3">
                        <?php
                        $perinstallment = null;
                        if ($result->totalamt == $result->received_amt) {
                            $perinstallment = 0;
                            $remaining = 0;
                        } else {
                            $perinstallment = ($result->totalamt / $result->installment);
                            $remaining = ($result->totalamt - $result->received_amt);
                        }
                        ?>

                        <label for="remaining_intallment" class="form-label">Remaining Installment</label>
                        <input type="text" class="form-control" name="remaining_intallment" value="<?php echo $remaining ?>" id="remaining_intallment" readonly></input>
                        <?php echo form_error('remaining_intallment') ?>
                    </div>

                    <div class="mb-3">

                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="dateofpayment" id="date"></input>
                        <?php echo form_error('dateofpayment') ?>
                    </div>


                    <div class="mb-3 image-upload p-3">
                        <label for="formFile" class="form-label">Upload file</label>
                        <input class="form-control" type="file" name="SMCpayment_image" id="formFile">

                        <img class="uploaded-image mt-2" src="<?php echo base_url('img/image-gallery.jpeg'); ?>" id="uploaded-image" style="display: none;" alt="Uploaded Image">
                        <?php echo form_error('SMCpayment_image') ?>
                    </div>




                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Accept EMI">
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
        document.getElementById('formFile').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('uploaded-image').setAttribute('src', e.target.result);
                document.getElementById('uploaded-image').style.display = 'block'; // Show the uploaded image

            };

            reader.readAsDataURL(this.files[0]);
        });



        let emi = document.getElementById('EMI');
        let payment_amt = document.getElementById('payment_amt');
        let remaining_amt = document.getElementById('remaining_intallment');
        emi.addEventListener('change', function() {
            event.preventDefault();
            console.log(emi.value);
            remaining_amt.value = Number.parseInt(payment_amt.value) - Number.parseInt(emi.value);
        })
    </script>
</body>

</html>