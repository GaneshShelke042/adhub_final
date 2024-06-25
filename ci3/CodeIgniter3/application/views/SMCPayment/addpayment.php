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
</style>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->
        <div class="container">
            <!-- New button added for adding new entries -->
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <?php echo form_open_multipart(base_url() . "index.php/SMCpayment/addpayment/" . $result['id']) ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Enter Brand Name</label>
                        <input type="text" class="form-control" name="Brand_Name" id="Brand_Name" placeholder="Enter Brand Name" value="<?php echo $result['brand_name'] ?? '' ?>" readonly>
                        <?php echo form_error('Brand_Name') ?>
                    </div>


                    <div class="mb-3">
                        <select class="form-select" name="installment" id="installment">
                            <option value="" selected disabled>Please select installment</option>
                            <?php
                            if (!empty($installment)) {
                                foreach ($installment as $i) {
                            ?>
                                    <option value="<?php echo $i['Installment'] ?>"><?php echo
                                                                                    $i['Installment'] ?> </option>
                                <?php

                                }
                            } else { ?>
                                <option value="">No installment are available</option>
                            <?php } ?>

                        </select>
                        <?php echo form_error('installment') ?>
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
                        <label for="payment_amt" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="payment_amt" id="payment_amt" placeholder="Enter the Amount"> </input>
                        <?php echo form_error('payment_amt') ?>
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
                        <div class="mt-2"> <?php echo form_error('Gstcheck') ?></div>
                    </div>

                    <div class="mb-3">

                        <input type="text" id="Originalamt" class="form-control my-2" readonly placeholder="Original Amount" name="Originalamt" style="display: none;">
                        <input type="text" id="gstamt" name="gstamt" class="form-control my-2" readonly placeholder="GST Amount" style="display: none;">
                        <input type="text" id="totalamt" name="totalamt" class="form-control my-2" readonly placeholder="Total Amount" style="display: none;">
                    </div>


                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary"></input>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script>
        let enterAmount = document.getElementById('payment_amt');
        let installment = document.getElementById('installment');
        let originalAmt = document.getElementById('Originalamt');
        let gstAmt = document.getElementById('gstamt');
        let gstExclusive = document.getElementById('flexRadioDefault1');
        let gstInclusive = document.getElementById('flexRadioDefault2');
        let totalAmt = document.getElementById('totalamt');
        let gstRate = document.getElementById('gst');

        function calculateAmounts() {
            let amount = parseFloat(enterAmount.value);
            let rate = parseFloat(gstRate.value);
            let gstAmount = 0;
            let totalAmount = 0;

            if (!isNaN(amount) && !isNaN(rate)) {
                if (gstExclusive.checked) {
                    gstAmount = (amount * rate) / 100;
                    totalAmount = amount + gstAmount;
                } else if (gstInclusive.checked) {
                    gstAmount = (amount * rate) / 100;
                    amount = amount - gstAmount;
                    totalAmount = amount + gstAmount;
                }

                originalAmt.value = amount.toFixed(2);
                gstAmt.value = gstAmount.toFixed(2);
                totalAmt.value = totalAmount.toFixed(2);

                // Show the calculated amounts
                originalAmt.style.display = 'block';
                gstAmt.style.display = 'block';
                totalAmt.style.display = 'block';
            } else {
                alert('Please enter valid payment amount and GST rate.');
            }
        }

        // Trigger the calculation when payment amount, GST rate, or GST type changes
        enterAmount.addEventListener('keyup', calculateAmounts);
        gstRate.addEventListener('change', calculateAmounts);
        gstExclusive.addEventListener('change', calculateAmounts);
        gstInclusive.addEventListener('change', calculateAmounts);
    </script>



</body>

</html>