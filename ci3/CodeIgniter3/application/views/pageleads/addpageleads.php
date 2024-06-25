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
</style>

<body>
    <section class="home-section" style="margin-top: -50%;">
        <!-- Button to trigger the popup -->
        <div class="container">
            <!-- New button added for adding new entries -->
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <?php echo form_open_multipart(base_url() . "index.php/Leads/savepageid/" . $id) ?>
                    <div class="mb-3">
                        <label for="Brand_Name" class="form-label">Enter Page Id </label>
                        <input type="text" class="form-control" name="pageid" id="pageid" placeholder="Enter Page Id" value="<?php  if(!empty($fetch->pageid))
                        {
                            echo $fetch->pageid;
                        }
                        else{
                            echo"";
                        } ?>">
                        <?php echo form_error('pageid') ?>
                    </div>
                    <div class="mb-3">
                        <label for="Network" class="form-label">Select Page Type </label>
                        <select type="text" class="form-select" name="Network" id="Network" placeholder="Network">
                            <!-- <option selected disabled>Open this select menu</option> -->

                            <?php if (!empty($Network)) {
                                foreach ($Network as $key) { 
                                    if(!empty($fetch->Network)) {?>
                            <option value="<?= $key->Name ?>" <?= ($key->Name === $fetch->Network) ? 'selected' : '' ?>><?php echo $key->Name ?></option>
                            
                            <?php }
                            else
                            {
                                ?> <option value="<?= $key->Name ?>" ><?php echo $key->Name ?></option>
                                <?php
                            }
                                }
                            } ?>

                        </select>
                        <?php echo form_error('pageid') ?>
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
    </script>
</body>

</html>