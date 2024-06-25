<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .body {
            margin-top: -10%;
        }

        .button-container {
            display: flex;
            justify-content: center;
            /* Align items horizontally to the center */
            margin-top: 40px;
            /* Adjust margin as needed */
            margin-left: 40%;
            /* Adjust margin as needed */
        }
    </style>

    <title>Document</title>
</head>

<body>
    <section class="home">
        <div class="body">
            <div class="sub-body">
                <form method="post" name="Client" action="<?php echo base_url() . 'index.php/Setting/SettingSideBarContro/update' ?>">


                    <div class="fields">

                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Question Form</label>
                            <select id="status" name="question" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName && $userData['status'] == 1) {

                                            $selected = ($userData['name'] == $check['question'] ) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">TG Form</label>
                            <select id="status" name="tgform" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['tgform']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Size Form:</label>
                            <select id="status" name="sizeform" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['sizeform']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Pain Point:</label>
                            <select id="status" name="painpoint" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['painpoint']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>

                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Requirement:</label>
                            <select id="status" name="requirement" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['requirement']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Language:</label>
                            <select id="status" name="language" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['language']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Offer:</label>
                            <select id="status" name="offer" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['offer']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>

                        </div>


                        <div class="input-field" style="width: 50%; padding-left: 30px;">
                            <label for="status">Account Access:</label>
                            <select id="status" name="accountaccess" class="form-control">
                                <?php
                                if (!empty($result)) {
                                    $previousName = null;
                                    foreach ($result as $userData) {
                                        // Check if the current name is different from the previous one
                                        if ($userData['name'] != $previousName  && $userData['status'] == 1) {
                                            $selected = ($userData['name'] == $check['accountaccess']) ? 'selected' : '';
                                            echo '<option value="' . $userData['name'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                        }
                                        // Update previousName with the current name
                                        $previousName = $userData['name'];
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <input type="hidden"  name="sideName" value="client">

                        <div class="input-field" style="width: 33%; padding-left: 30px;">

                            <label for="Parent">Content Writer Days</label>
                            <input type="number" placeholder="Enter Content Writer Days" name="CWDays"   value="<?php echo set_value('CWDays', $check['CWDays']); ?>"  >
                        </div>
                        <div class="input-field" style="width: 33%; padding-left: 30px;">
                            <label for="Parent">Content Writer Advance Days</label>
                            <input type="number" placeholder="Enter Content Writer Advance Days" name="CWAdvance" value="<?php echo set_value('CWAdvance', $check['CWAdvance']); ?>"    >
                        </div>
                        <div class="input-field" style="width: 33%; padding-left: 30px;">
                            <label for="Parent">Graphic Designer Days</label>
                            <input type="number" placeholder="Enter Graphic Designer Days" name="GDDays"   value="<?php echo set_value('GDDays', $check['GDDays']); ?>"     >
                        </div>
                        <div class="input-field" style="width: 33%; padding-left: 30px;">
                            <label for="Parent">GD Advance Days</label>
                            <input type="number" placeholder="Enter Content Writer Advance Days" name="GDAdvance" value="<?php echo set_value('GDAdvance', $check['GDAdvance']); ?>"    >
                        </div>

                        <div class="input-field" style="width: 33%; padding-left: 30px;">
                            <label for="Parent">SMM Days</label>
                            <input type="number" placeholder="Enter Graphic Designer Days" name="SMMDays"   value="<?php echo set_value('SMMDays', $check['SMMDays']); ?>"     >
                        </div>
                        <div class="input-field" style="width: 33%; padding-left: 30px;">
                            <label for="Parent">SMM Advance Days</label>
                            <input type="number" placeholder="Enter Content Writer Advance Days" name="SMMAdvance" value="<?php echo set_value('SMMAdvance', $check['SMMAdvance']); ?>"    >
                        </div>




                        <div class="button-container">
                            <button class="submit-button" name="Submit" value="submit">
                                <span>Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>

                            <button class="delete-button" name="close" value="close" onclick="cancelAction()">
                                <span>Close</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
</body>
<script>
    function cancelAction() {
        // Redirect the page to the desired URL
        window.location.href = "<?php echo base_url().'index.php/Setting/SettingSideBarContro/viewSideBar'?>";
    }
</script>

</html>