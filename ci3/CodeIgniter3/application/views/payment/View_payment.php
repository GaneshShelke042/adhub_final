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
        overflow: hidden;
    }

    .uploaded-image {
        width: 100%;
        height: 50%;
    }

    .add-new-button {
            position: absolute;
            top: 80px;
            right: 5%;
            margin-right: 20px;
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
        <button class="add-new-button">
            <a class="btn btn-warning" href="<?php echo base_url() ?>index.php/paymentcontroller/checkhistory/<?php echo $result->client_id ?? '' ?>">Back</a>
        </button>
        
        <div class="container">
            <div class="row" id="makepdf">
                <div class="col-md-5 offset-md-4">

                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Enter Brand Name</label>
                        <input type="text" class="form-control" name="Brand_Name" id="Brand_Name" placeholder="Enter Brand Name" value="<?php echo $result->brand_name ?? '' ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="mode" class="form-label">Payment Mode</label>
                        <select class="form-select" name="mode" id="mode" disabled>
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
                    </div>

                    <div class="mb-3">
                        <label for="payment_amt" class="form-label">Amount</label>
                        <input type="text" class="form-control" name="payment_amt" id="payment_amt" placeholder="Enter the Amount" value="<?php echo $result->payment_amt ?? '' ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="GST_Rate" id="GST_Rate" placeholder="Enter the GST Rate" value="<?php echo $result->GST_Rate ?? '' ?> %" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Original Amt</label>
                        <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter the Description" value="<?php echo $result->Original_Amt ?? '' ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Description" class="form-label">GST Amt</label>
                        <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter the Description" value="<?php echo $result->GST_Amt ?? '' ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Exclusive" id="flexRadioDefault1" <?php echo ($result->Gstcheck == 'GST Exclusive') ? 'checked' : ''; ?> disabled>
                            <label class="form-check-label" for="flexRadioDefault1">GST Exclusive</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gstcheck" value="GST Inclusive" id="flexRadioDefault2" <?php echo ($result->Gstcheck == 'GST Inclusive') ? 'checked' : ''; ?> disabled>
                            <label class="form-check-label" for="flexRadioDefault2">GST Inclusive</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control" name="Description" id="Description" placeholder="Enter the Description" value="<?php echo $result->Description ?? '' ?>" readonly>
                    </div>

                    <div class="mb-5 image-upload p-3">
                        <label for="formFile" class="form-label">Upload file</label>
                        <img class="uploaded-image  mt-2" src="<?php echo base_url() . "payment_image/" . $result->payment_image ?>" id="uploaded-image" alt="Uploaded Image">
                    </div>


                </div>
            </div>
        </div>
                            </div>
                            </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



  


</body>

</html>