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
        /* height: 100%; */
        overflow: hidden;
    }

    .uploaded-image {
        width: 100%;
        height: auto;
    }
    .home-section{
            margin-top:1%;
        }
        a {
        color:#ffff;
       }
       button {
        background-color: #00008B;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        margin-bottom: 6px;
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
            <!-- New button added for adding new entries -->
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <?php echo form_open_multipart(base_url() . "index.php/paymentcontroller/addpaymentview/" . $result['id']) ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Enter Brand Name</label>
                        <input type="text" class="form-control" name="Brand_Name" id="Brand_Name" placeholder="Enter Brand Name" value="<?php echo $result['brand_name'] ?? '' ?>">
                        <?php echo form_error('Brand_Name') ?>
                    </div>


                    <div class="mb-3">
                        <select class="form-select" name="mode" id="payment_mode">
                            <option value="" selected disabled>Please select payment mode</option>
                            <?php
                            if (!empty($mode)) {
                                foreach ($mode as $m) {
                            ?>
                                    <option value="<?php echo $m['mode'] ?>"><?php echo $m['mode'] ?></option>
                                <?php

                                }
                            } else { ?>
                                <option value="">No payment modes available</option>
                            <?php } ?>

                        </select>
                        <?php echo form_error('mode') ?>
                    </div>



                    <div class="mb-3">
                        <label for="payment_amt" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="payment_amt" id="payment_amt" placeholder="Enter the Amount"> </input>
                        <?php echo form_error('payment_amt') ?>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" name="GST_Rate" id="gst">
                            <option value="" selected disabled>Please select GST Rate</option>
                            <?php
                            if (!empty($gst)) {
                                foreach ($gst as $g) {
                            ?>
                                    <option value="<?php echo $g['GST_Rate'] ?>"><?php echo $g['GST_Rate'] ?> &#37;</option>
                                <?php

                                }
                            } else { ?>
                                <option value="">No payment modes available</option>
                            <?php } ?>

                        </select>
                        <?php echo form_error('GST_Rate') ?>
                    </div>


                    <div class="mb-3">


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Exclusive" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                GST Exclusive
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Inclusive" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                GST Inclusive
                            </label>
                        </div>

                                



                        <div class="my-2">
                            <button type="button" id="check_gst" class="btn btn-primary"> Click Here to check GST amount and Final amount</button>
                            <input type="text" id="original_amt" placeholder="Original Amt" readonly class="form-control my-1" style="display:none;">
                            <input type="text" id="gst_amt" placeholder="GST Amt" readonly class="form-control my-1" style="display:none;">
                            <input type="text" id="total_amt" placeholder="Total Amt" readonly class="form-control my-1" style="display:none;">
                        </div>
                        <div class="mt-2"> <?php echo form_error('Gstcheck') ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter the Description"> </input>
                        <?php echo form_error('Description') ?>
                    </div>

                    <div class="mb-3 image-upload p-3">
                        <label for="formFile" class="form-label">Upload file</label>
                        <input class="form-control" type="file" name="payment_image" id="formFile">

                        <img class="uploaded-image mt-2" src="<?php echo base_url('img/image-gallery.jpeg'); ?>" id="uploaded-image" style="display: none;" alt="Uploaded Image">

                    </div>
                    <?php echo isset($err) ? $err : ''; ?>


                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary"></input>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
        <div></div>
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

        let gstcheck = document.getElementById('check_gst');
        let original_amt = document.getElementById('original_amt');
        let gst_amt = document.getElementById('gst_amt');
        let total_amt = document.getElementById('total_amt');
        let enteramt = document.getElementById('payment_amt');
        let gstrate = document.getElementById('gst');
        let gsttypeExclusive = document.getElementById('flexRadioDefault1');
        let gsttypeInclusive = document.getElementById('flexRadioDefault2');
        gstcheck.addEventListener('click', function() {
            let amount = parseFloat(enteramt.value);
            let rate = parseFloat(gstrate.value);
            let gstAmount = 0;
            let totalAmount = 0;

            if (!isNaN(amount) && !isNaN(rate)) {
                if (gsttypeExclusive.checked) {
                    gstAmount = (amount * rate) / 100;
                    totalAmount = amount + gstAmount;
                } else if (gsttypeInclusive.checked) {
                     gstAmount = (amount * rate) / 100;
                     amount = amount - gstAmount;
                     totalAmount = amount + gstAmount;
                }

                original_amt.value = amount.toFixed(2)+" original Amount";
                gst_amt.value = gstAmount.toFixed(2)+" GST Amount";
                total_amt.value = totalAmount.toFixed(2)+" Total     Amount";

                // Show the calculated amounts
                original_amt.style.display = 'block';
                gst_amt.style.display = 'block';
                total_amt.style.display = 'block';
            } else {
                alert('Please enter valid payment amount and GST rate.');
            }
        });
    </script>



</body>

</html>