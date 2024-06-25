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
</style>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php echo form_open_multipart(base_url() . "index.php/paymentcontroller/editpayment/" . $result->id) ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Brand Name</label>
                        <input type="text" class="form-control" name="Brand_Name" id="Brand_Name" value="<?php echo $result->brand_name ?? '' ?>">
                        <?php echo form_error('Brand_Name') ?>
                    </div>


                    <div class="mb-3">
                        <label for="mode" class="form-label">Payment Mode</label>
                        <select class="form-select" name="mode" id="mode">
                            <!-- Populate payment modes options -->
                            <?php if (!empty($mode)) : ?>
                                <?php foreach ($mode as $m) : ?>
                                    <option value="<?php echo $m['mode'] ?>" <?php echo ($result->mode == $m["mode"]) ? 'selected' : '' ?>>
                                        <?php echo $m['mode'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="">No payment modes available</option>
                            <?php endif; ?>
                        </select>
                        <?php echo form_error('mode') ?>
                    </div>

                    <div class="mb-3">
                        <label for="payment_amt" class="form-label">Payment Amount</label>
                        <input type="text" class="form-control" name="payment_amt" id="payment_amt" value="<?php echo $result->payment_amt ?? '' ?>">
                        <?php echo form_error('payment_amt') ?>
                    </div>
                    <div class="mb-3">
                        <label for="gst" class="form-label">GST Rate</label>
                        <select class="form-select" name="GST_Rate" id="gst">
                            <option value="" selected disabled>Please select GST Rate</option>
                            <?php if (!empty($gst)) {  ?>
                                <?php foreach ($gst as $g) {  ?>
                                    <option value="<?php echo $g['GST_Rate'] ?>" <?php echo ($result->GST_Rate == $g['GST_Rate']) ? 'selected' : '' ?>>
                                        <?php echo $g['GST_Rate'] ?> %
                                    </option>
                                <?php
                                }
                            } else {  ?>
                                <option value="">No GST rates available</option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('GST_Rate') ?>
                    </div>

                    <div class="mb-3">


                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Exclusive" id="flexRadioDefault1" <?php echo ($result->Gstcheck == "GST Exclusive") ? 'checked':''; ?>>
                            <label class="form-check-label" for="flexRadioDefault1">
                                GST Exclusive
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Inclusive" id="flexRadioDefault2" <?php echo ($result->Gstcheck == "GST Inclusive") ? 'checked':''; ?>>
                            <label class="form-check-label" for="flexRadioDefault2">
                                GST Inclusive
                            </label>
                        </div>
                        <div class="mt-2"> <?php echo form_error('Gstcheck') ?></div>
                    </div>



                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <textarea class="form-control" name="Description" id="Description"><?php echo $result->Description ?? '' ?></textarea>
                        <?php echo form_error('Description') ?>
                    </div>




                    <div class="mb-3 image-upload p-3">
                        <label for="formFile" class="form-label">Upload file</label>
                        <input class="form-control" type="file" name="payment_image" id="formFile">

                        <img class="uploaded-image mt-2" src="<?php echo base_url(); ?>payment_image/<?php echo $result->payment_image ?? '' ?>" id="uploaded-image" style="display:block;" alt="Uploaded Image">

                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Update Payment">
                    </div>
                    <?php echo form_close() ?>
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
    </script>
</body>

</html>