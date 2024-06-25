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
</style>

<body>
    <section class="home-section" style="margin-top: -50%;">
        <!-- Button to trigger the popup -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php echo form_open_multipart(base_url() . "index.php/Socialmedia/editdata/" . $result->id) ?>
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="Name" value="<?= $result->Name ?>" name="Name">
                        <?php echo form_error("Name") ?>
                    </div>
                    <div class="mb-3">
                        <label for="SocialMedia" class="form-label">FA icon</label>
                        <input type="text" class="form-control" id="SocialMedia" value="<?= $result->Socialmediaplatform ?>" name="Socialmediaplatform">
                        <?php echo form_error("Socialmediaplatform") ?>

                    </div>

                    <div class="mb-3">
                        <label for="Status" class="form-label">Status <span style="color: red;    ">*</span> </label>
                        <select class="form-select" aria-label="Default select example" id="Status" name="Status">
                            <option selected disabled>Open this select menu</option>
                            <option value="Active" <?php echo ($result->Status == 'Active') ? 'selected' : ''; ?>>Active</option>
                            <option value="Inactive" <?php echo ($result->Status == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                        </select>
                        <?php echo form_error("Status") ?>

                    </div>

                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Update Social">
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