<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css">
    <link rel="stylesheet" href="https://wanming.github.io/angular-editor/stylesheets/simditor.css">
    <link rel="stylesheet" href="">
    <!-- <link rel="stylesheet" href=""> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://wanming.github.io/angular-editor/javascripts/simditor/simditor-all.js"></script>
    <script src="https://wanming.github.io/angular-editor/javascripts/directives/doc_directive.js"></script>

    <style>
        /* body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: #7d96da;
        } */


        .container {
            margin-top: 2%;
            /* max-width: 900px; */
            width: 100%;
            height: 100%;
            margin-right: 20px;
            border-radius: 6px;
            /* padding: 30px; */

            background-color: #fff;
            box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .input-field {
            margin-bottom: 20px;
        }

        #image {
            display: none;
            /* Hide the file input */
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        form {
            border: 10px;
            border: #C96;
            box-shadow: #000;
            margin-top: 16px;
            min-height: 500px;
            background-color: #D5D6E2;
            overflow: hidden;
        }

        .fields {

            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            flex-wrap: wrap;
        }

        .input-field {
            float: right;
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 4px 0;
        }

        input,
        select {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        .media {
            /* padding: 25px; */
            margin: 25px 0;
            display: flex;
            /* justify-content: space-between; */
        }

        fieldset {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: none;
            margin-bottom: 20px;
            margin-top: 60px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f4f6f4;
            color: #000;
        }

        input[readonly] {
            background-color: #f4f4f4;
            cursor: not-allowed;
        }



        .delete-button {
            background-color: #ff3333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        .input-field {
            margin-bottom: 20px;
        }


        .input-field-1 {
            padding: 10px 20px 0 20px;
            height: fit-content;
        }

        .image-upload {
            position: relative;
            cursor: pointer;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 200px;
            /* Specify the width of the box */
            height: 200px;
            /* Specify the height of the box */
            overflow: hidden;
            /* Ensure the image stays within the container */
        }

        .uploaded-image {
            width: 100%;
            /* Make the image fill the box horizontally */
            height: auto;
            
            /* Maintain aspect ratio */
        }

        .upload-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #888;
            cursor: pointer;
        }

        .media1 {
            margin-left: 2%;
        }

        .container1 {
            display: none;
        }

        section {
            box-shadow: 0 3px 6px rgba(0.14, 0.16, 0.18, 0.13);
        }

        a {
            cursor: pointer;
        }

        .editor {
            background-color: #fff;
            position: relative;
            margin-left: 3%;


        }

        .editorAria {
            width: 100%;
            height: 50%;
            min-height: 400px;
            border-radius: 10px;
            border: 1px solid #ddd;
            overflow-y: auto;
            padding: 1em;
            margin-top: -2px;
            outline: none;
            margin-left: 3%;
        }

        .description {
            font-size: 145%;
            margin-left: 3%;
        }

        .toolbar {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
        }

        .toolbar a,
        .fore-wrapper,
        .back-wrapper {
            border: 1px solid #ddd;
            background: #FFF;
            font-family: 'Candal';
            color: #000;
            padding: 5px;
            margin: 2px 0px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            text-decoration: none;
        }

        .toolbar a:hover,
        .fore-wrapper:hover,
        .back-wrapper:hover {
            background: #0eacc6;
            color: #fff;
            border-color: #0eacc6;
        }

        a.palette-item {
            display: inline-block;
            height: 1.3em;
            width: 1.3em;
            margin: 0px 1px 1px;
            cursor: pointer;
        }

        a.palette-item[data-value="#FFFFFF"] {
            border: 1px solid #ddd !important;
        }

        a.palette-item:hover {
            transform: scale(1.1);
        }

        .fore-wrapper,
        .back-wrapper {
            position: relative;
            cursor: auto;
        }

        .fore-palette,
        .back-palette {
            display: none;
            cursor: auto;
        }

        .fore-wrapper:hover .fore-palette,
        .back-wrapper:hover .back-palette {
            display: block;
        }

        .fore-wrapper .fore-palette,
        .back-wrapper .back-palette {
            position: relative;
            display: inline-block;
            cursor: auto;
            display: block;
            left: 0;
            top: calc(100% + 5px);
            position: absolute;
            padding: 10px 5px;
            width: 160px;
            background: #FFF;
            box-shadow: 0 0 5px #CCC;
            display: none;
            text-align: left;
        }

        .fore-wrapper .fore-palette:after,
        .back-wrapper .back-palette:before {
            content: '';
            display: inline-block;
            position: absolute;
            top: -10px;
            left: 10px;
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 10px solid #fff;
        }

        .fore-palette a,
        .back-palette a {
            background: #FFF;
            margin-bottom: 2px;
            border: none;
        }

        .editor img {
            max-width: 100%;
            object-fit: cover;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }


        /* Style for the toggle button */
        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .toggle-switch input[type="checkbox"] {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            border-radius: 34px;
            transition: .4s;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            border-radius: 50%;
            transition: .4s;
        }

        input[type="checkbox"]:checked+.toggle-slider {
            background-color: #2196F3;
        }

        input[type="checkbox"]:checked+.toggle-slider:before {
            transform: translateX(26px);
        }

        .toggle-slider.checked {
            background-color: #2196F3;
        }

        .toggle-slider.checked:before {
            transform: translateX(26px);
        }

        .home-section {
            margin-top: 2.5%;
            background-color: #D5D6E2;
        }

        .home-content {
            background-color: #D5D6E2;
        }

        .photo-container {
width: 100%;
            row-gap: 35px;
        column-gap: 10px;
        margin: 10px;
        display: flex;
        /* justify-content: flex-start; */
        flex-wrap: wrap;
        }

        .photo {
            margin: 10px;
            position: relative;
        }

        .photo img {
            max-width: 200px;
            max-height: 200px;
        }

        .delete-button1 {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <section class="home-section">

        <form method="post" name="AddNewClient" action="" enctype="multipart/form-data">



            <div class="input-field-1" style="float:left">
                <label for="image">Upload Image:
                    <div class="image-upload">
                        <input type="file" id="image" name="image" accept="image/*" class="hidden-file-input">
                        <img class="uploaded-image" id="input-field" src="<?= base_url('./Image/PackageServies/' . $result['imagepath']) ?>" alt="Uploaded Image">
                    </div>
                </label>
            </div>




            <div class="fields">

                <div class="input-field" style="width: 70%;">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="Enter your name" value="<?php echo set_value('name', $result['name']); ?>" required>
                </div>



                <div class="input-field" style="width: 25%; padding-left: 30px;">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="1" <?php echo ($result['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                        <option value="0" <?php echo ($result['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>
                    </select>
                </div>

                <div class="input-field" style="width: 95%;">
                    <label>Short Description </label>
                    <textarea id="description" name="description"> <?php echo set_value('description', $result['short_description']); ?></textarea>
                </div>

                <div class="input-field" style="width:35%; padding-left: 5px;">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <?php if (!empty($category)) {
                            foreach ($category as $userData) {
                                if ($userData['status'] == 1) {
                                    // Output each option with the value and label from the database
                                    $selected = ($userData['Slug'] == $result['category']) ? 'selected' : '';
                                    echo '<option value="' . $userData['Slug'] . '" ' . $selected . '>' . $userData['Slug'] . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>





                <div class="input-field" style="width: 42%; padding-left: 25px;">
                    <label>Video</label>
                    <input type="text" name="vidio" placeholder="" value="<?php echo set_value('vidio', $result['video_link']); ?>">
                </div>

                <div class="input-field" style="width: 5%; padding-left: 30px;">
                    <label>Hide</label>

                </div>

                <div class="input-field" style="width: 10%; padding-left: 25px;">
                    <label>hidden price</label>
                    <label class="toggle-switch">
                        <input type="checkbox" id="toggleButton">
                        <input type="hidden" id="toggleValue" name="hidden_price" value="<?php echo set_value('hidden_price', $result['hidden_price']); ?>">
                        <span class="toggle-slider"></span>
                    </label>
                </div>



                <div class="input-field" style="width: 0%; ">
                    <label>Show</label>

                </div>

            </div>

            <div class="fields">

                <div class="input-field" style="width: 19%; padding-left: 25px;">
                    <label>Price</label>
                    <input type="number" name="price" placeholder="" value="<?php echo set_value('price', $result['price']); ?>">
                </div>



                <div class="input-field" style="width: 15%; padding-left: 30px;">
                    <label>Discount</label>
                    <input type="number" name="discount" placeholder="" value="<?php echo set_value('discount', $result['discount']); ?>">
                </div>

                <div class="input-field" style="width: 15%; padding-left: 30px;">
                    <label>Discount type</label>
                    <select id="discount-type" name="discount-type" onchange="calculateSubtotal()">
                        <option value="Percent" <?php echo ($result['discount_type'] == 'Percent') ? 'selected' : ''; ?>>Percent(%)</option>
                        <option value="Amount" <?php echo ($result['discount_type'] == 'Amount') ? 'selected' : ''; ?>>Amount(&#8377;)</option>
                    </select>
                </div>



                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Sub Total</label>
                    <input type="text" name="sub-total" placeholder="" value="<?php echo set_value('sub-total', $result['sub_total']); ?>" id="sub-total" readonly>
                </div>





                <div class="input-field" style="width: 27%; padding-left: 30px;">
                    <label>GST</label>
                    <select id="gst" name="gst" onchange="calculateTotal()">
                        <?php if (!empty($result1)) {
                            foreach ($result1 as $userData) {
                                if ($userData['status'] == 1) {

                                    $selected = ($userData['total'] == $result['gst']) ? 'selected' : '';
                                    echo '<option value="' . $userData['total'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                }
                            }
                        }
                        ?>
                    </select>
                </div>








                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>GST Type</label>
                    <select id="gst-type" name="gst-type" onchange="calculateTotal()">
                        <option value="included" <?php echo ($result['gst_type'] == 'included') ? 'selected' : ''; ?>>included</option>
                        <option value="excluded" <?php echo ($result['gst_type'] == 'excluded') ? 'selected' : ''; ?>>excluded</option>
                    </select>
                </div>



                <div class="input-field" style="width: 30%; padding-left: 30px;">
                    <label>GST (₹)</label>
                    <input type="text" name="gst-amount" placeholder="" id="gst-amount" value="<?php echo set_value('gst-amount', $result['gst_amount']); ?>" onchange="updateTotal()">
                </div>
                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Amount</label>
                    <input type="text" name="amount" id="amount" placeholder="" value="<?php echo set_value('amount', $result['amount']); ?>">
                </div>

                <div class="input-field" style="width: 20%; padding-left: 30px;">
                    <label>Total</label>
                    <input type="text" name="total" placeholder="" id="total" value="<?php echo set_value('total', $result['total']); ?>">
                </div>




                <div class="photo-container" >
    <label class="description">Upload Photos</label>
    <input type="file" id="image" name="multipalPics[]" class="hidden-file-input">
    <br>
                <div style="width: 20%; display: flex;  padding: 10px; margin-left: 2%;">
    <?php
    // Check if $result['multipalPics'] is not empty
    if (!empty($result['multipalPics'])) {
        // Split the string into an array of filenames
        $images = explode(',', $result['multipalPics']);

        // Iterate over each filename and display the image
        foreach ($images as $image) {
            echo '<img class="uploaded-image" style="margin-left: 5%;"  src="' . base_url('./Image/PackageServies/' . trim($image)) . '" alt="Uploaded Image">';
        }
    }
    ?>
                </div>
              
</div>

                <div id="photo-container" class="photo-container"></div>







                <div class="container" style=" background-color: #D5D6E2;">

                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12 col-lg-8">

                            <label class="description">Description </label>
                            <textarea id="editor" class="editorAria" name="editor-content"><?php echo set_value('editor-content', $result['editor-content']); ?></textarea>


                        </div>
                    </div>
                </div>



                <div class="fields">
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>CW(₹)</label>
                        <input type="text" name="CW" placeholder="" id="salesExecutive" value="<?php echo set_value('CW', $result['cw']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HCW(₹)</label>
                        <input type="text" name="HCW" placeholder="" id="salesExecutive" value="<?php echo set_value('HCW', $result['hcw']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>GD(₹)</label>
                        <input type="text" name="GD" placeholder="" id="salesExecutive" value="<?php echo set_value('GD', $result['gd']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HGD(₹)</label>
                        <input type="text" name="HGD" placeholder="" id="salesExecutive" value="<?php echo set_value('HGD', $result['hgd']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>SMM(₹)</label>
                        <input type="text" name="SMM" placeholder="" id="salesExecutive" value="<?php echo set_value('SMM', $result['smm']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HSMM(₹)</label>
                        <input type="text" name="HSMM" placeholder="" id="salesExecutive" value="<?php echo set_value('HSMM', $result['hsmm']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>TI(₹)</label>
                        <input type="text" name="TI" placeholder="" id="salesExecutive" value="<?php echo set_value('TI', $result['ti']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HTI(₹)</label>
                        <input type="text" name="HTI" placeholder="" id="salesExecutive" value="<?php echo set_value('HTI', $result['hti']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>Admin(₹)</label>
                        <input type="text" name="Admin" placeholder="" id="salesExecutive" value="<?php echo set_value('Admin', $result['admin']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>SE(₹)</label>
                        <input type="text" name="SE" placeholder="" id="salesExecutive" value="<?php echo set_value('SE', $result['se']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HSE(₹)</label>
                        <input type="text" name="HSE" placeholder="" id="salesExecutive" value="<?php echo set_value('HSE', $result['hse']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>TC(₹)</label>
                        <input type="text" name="TC" placeholder="" id="salesExecutive" value="<?php echo set_value('TC', $result['tc']); ?>">
                    </div>
                    <div class="input-field" style="width: 10%; padding-left: 30px;">
                        <label>HTC(₹)</label>
                        <input type="text" name="HTC" placeholder="" id="salesExecutive" value="<?php echo set_value('HTC', $result['htc']); ?>">
                    </div>


                </div>





                <div style="text-align: center; margin-top: 20px;">
                    <button class="submit-button" onclick="submitForm()">
                        <span>Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>

                    <button class="delete-button" type="button" onclick="cancelAction()">
                        <span>Close</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div>
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const toggleButton = document.getElementById("toggleButton");
                    const toggleValue = document.getElementById("toggleValue");

                    // Set initial state based on hidden_price value
                    toggleButton.checked = toggleValue.value === "1";
                    updateToggleAppearance();

                    toggleButton.addEventListener("change", function() {
                        const value = this.checked ? "1" : "0";
                        toggleValue.value = value;
                        updateToggleAppearance();

                        // Here you can perform any additional actions such as sending the value to a server
                        console.log("Toggle value:", value);
                    });

                    function updateToggleAppearance() {
                        const toggleSlider = document.querySelector('.toggle-slider');
                        toggleSlider.classList.toggle('checked', toggleButton.checked);
                    }
                });



                document.querySelector('.input-field-1').addEventListener('click', function() {
                    document.getElementById('image').click();
                });

                document.getElementById('image').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            document.querySelector('.uploaded-image').src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });




                $(function() {
                    $('[data-toggle="tooltip"]').tooltip()
                });
                $(document).ready(function() {
                    var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'],
                        forePalette = $('.fore-palette'),
                        backPalette = $('.back-palette'),
                        editor = $('.editor');

                    for (var i = 0; i < colorPalette.length; i++) {
                        forePalette.append('<a href="#" data-command="foreColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
                        backPalette.append('<a href="#" data-command="backColor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
                    }
                    $('.toolbar a').click(function(e) {
                        e.preventDefault();
                        var command = $(this).data('command');
                        if (command == 'h1' || command == 'h2' || command == 'p') {
                            document.execCommand('formatBlock', false, command);
                        }
                        if (command == 'foreColor' || command == 'backColor') {
                            var color = $(this).data('value');
                            document.execCommand($(this).data('command'), false, color);
                            alert(color);
                        }
                        if (command == 'removeFormat') {
                            document.execCommand('removeFormat', false, command);
                        }
                        if (command == 'createlink' || command == 'insertimage') {
                            url = prompt('Enter the link here: ', 'http:\/\/');
                            console.log(command + " " + url);
                            document.execCommand($(this).data('command'), false, url);
                            // document.execCommand($(this).data('command') && 'enableObjectResizing', false, url);
                        } else document.execCommand($(this).data('command'), false, url);
                    });
                    $('.editorAria img').click(function() {
                        document.execCommand('enableObjectResizing', false);
                    });
                    $("#getHTML").click(function() {
                        var editorId = $(this).attr('get-data');
                        var html = $("#" + editorId).find('.editorAria').html();
                        alert(html);
                    });
                });




                function calculateSubtotal() {
                    var price = parseFloat(document.getElementsByName('price')[0].value);
                    var discount = parseFloat(document.getElementsByName('discount')[0].value);
                    var discountType = document.getElementById('discount-type').value;
                    var subtotal;

                    if (discountType === 'Percent') {
                        subtotal = price - (price * discount / 100);
                    } else if (discountType === 'Amount') {
                        subtotal = price - discount;
                    }

                    document.getElementById('sub-total').value = subtotal.toFixed(2);
                }



                function calculateTotal() {
                    var subTotal = parseFloat(document.getElementsByName('sub-total')[0].value);
                    var gstPercentage = parseFloat(document.getElementById('gst').value);

                    // Calculate GST amount
                    var gstAmount = (subTotal * gstPercentage) / 100;

                    // Set the calculated GST amount in the input field
                    document.getElementById('gst-amount').value = gstAmount.toFixed(2);

                    // Recalculate the total
                    updateTotal();
                    amountTotal()
                }

                function updateTotal() {
                    var subTotal = parseFloat(document.getElementById('sub-total').value);
                    var gstAmount = parseFloat(document.getElementById('gst-amount').value);
                    var gstType = document.getElementById('gst-type').value;
                    var total;

                    if (gstType === 'included') {
                        total = subTotal;
                    } else if (gstType === 'excluded') {
                        total = subTotal + gstAmount;
                    }

                    document.getElementById('total').value = total.toFixed(2);
                }

                function amountTotal() {
                    var subTotal = parseFloat(document.getElementById('sub-total').value);
                    var gstAmount = parseFloat(document.getElementById('gst-amount').value);
                    var gstType = document.getElementById('gst-type').value;
                    var total;

                    if (gstType === 'included') {
                        total = subTotal - gstAmount; // Subtract GST amount from subtotal
                    } else if (gstType === 'excluded') {
                        total = subTotal; // Add GST amount to subtotal
                    }

                    document.getElementById('amount').value = total.toFixed(2);
                }
                document.getElementById('image').addEventListener('change', function(event) {
                    var input = event.target;
                    var reader = new FileReader();

                    reader.onload = function() {
                        var dataURL = reader.result;
                        var image = document.getElementById('uploaded-image');
                        image.src = dataURL;
                    };

                    reader.readAsDataURL(input.files[0]);
                });



                function cancelAction() {
                    // Redirect the page to the desired URL
                    window.location.href = "your_desired_url_here";
                }
            </script>



    </section>
</body>

</html>