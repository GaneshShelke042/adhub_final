<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/css/perfect-scrollbar.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
    <title>Client Permissions Form</title>
    <style>
        /* CSS to style all form elements */
        .client-form {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            background-color: #ffffff;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-group {
            margin-bottom: 15px;
            flex-basis: calc(33.33% - 10px);
        }

        .additional-group {
            margin-bottom: 15px;
            flex-basis: calc(50% - 10px);
        }

        label {
            display: inline-block;
            width: 100%;
            font-weight: bold;
        }

        input[type="text"],
        input[type="search"],
        select {
            width: calc(100% - 20px);
            /* Adjust the width according to label width */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            /* Include padding and border in width */
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* CSS to style form elements */
        .task {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
            /* Adding shadow effect */
        }

        .form-group {
            /* position: relative; */

            flex: 1 1 calc(30% - 10px);
            margin-right: 10px;
        }

        .additional-group {
            width: 32.60%;
            flex: 1 1 calc(30% - 10px);
            float: left;
            margin-right: 10px;
        }

        .label-container {
            display: flex;
            justify-content: space-between;
        }

        label {
            margin-top: 10px;
            /* display: block; */
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="number"],
        .input-file {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }



        .highlight {
            border-color: #4CAF50;
        }

        .submit-button-container {
            margin-bottom: 5%;
            text-align: center;
            margin-top: 20px;
        }

        .submit-button,
        .close-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .close-button {
            background-color: #f44336;
        }

        .submit-button:hover,
        .close-button:hover {
            background-color: #45a049;
        }


        .top-right-button {
            position: absolute;
            /* top: 10px; */
            /* right: 10px; */
            padding: 8px 16px;
            background-color: #1a0876;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            top: 90px;
            right: 3%;
            margin-right: 20px;
        }

        .top-right-button:hover {
            background-color: #45a049;
        }



        .toolbar {
            width: 100%;
            margin: 0 auto 10px;
        }



        #bold,
        #italic,
        #underline {
            font-size: 18px;
        }

        #underline,
        #align-right {
            margin-right: 17px;
        }

        #align-left {
            margin-left: 17px;
        }


        #fonts {
            width: 140px;
        }

        .sp-replacer {
            background: #fcfcfc;
            padding: 1px 2px 1px 3px;
            border-radius: 3px;
            border-color: #ffffff;
            margin-top: -1px;
        }

        .sp-replacer:hover {
            border-color: #a6a6a6;
            color: inherit;
        }

        .sp-preview {
            width: 15px;
            height: 15px;
            border: none;
            margin-top: 2px;
            margin-right: 3px;
        }

        .sp-preview-inner,
        .sp-alpha-inner,
        .sp-thumb-inner {
            border-radius: 3px;
        }

        .editor {
            position: relative;
            width: 100%;
            height: 50vh;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 3px;
            box-shadow: inset 0 0 8px 1px rgba(0, 0, 0, .1);
            box-sizing: border-box;
            overflow: hidden;
            word-break: break-all;
            outline: none;
        }

        .attachment {
            margin-top: 30px;
            align-content: center;
        }

        .custom-file-upload {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .custom-file-upload label {
            padding: 10px 20px;
            background-color: #e7e4e4;
            color: rgb(8, 4, 4);
            border-radius: 4px;
            cursor: pointer;
            display: block;
            width: 300px;
            /* Adjust width as needed */
            height: 100px;
            text-align: center;
        }

        .custom-file-upload label:hover {
            background-color: #5873ec;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .home-section {
            height: 100%;
            margin-top: 1%;
        }

        a {
            color: #ffff;
        }

        .box-container1 {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 20px;


        }

        .main-content {

            /* margin: 0;
            width: 100%;
            margin: 20px auto;
            margin-top: 0px; */
            background-color: #efefef;
            overflow: hidden;
            padding: 40px 30px 30px 30px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        .task-item {
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin: 10px 0;
            background-color: #fff;
        }

        .fetched-content {
            background-color: #ffffff;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
        }

        #task-details {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 100%;
        }

        #box-container1 {
            width: 100%;
            height: 100%;
        }

        .showCat {
            position: relative;
        }

        .row,
        #submit {
            border: 2px solid #333;
            /* Border with 2px width and color #333 (dark gray) */
            background-color: #f0f0f0;
            /* Background color #f0f0f0 (light gray) */
            padding: 20px;
            /* Optional: Add padding for inner content */
            height: 100%;

        }

        .taskdetails,
        #dynamicRows {
            margin-top: 2%;
            max-width: 100%;
            /* margin: 0 auto; */
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            background-color: #ffffff;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .taskName {
            width: 70%;
        }

        .deadline {
            width: 30%;
        }

        .width {

            width: 16%;
        }

        .height {
            width: 16%;
        }

        .resolution {
            width: 16%;
        }

        .color {
            width: 25%;
        }

        .Pixels {
            width: 25%;
        }

        .orientation {
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Optional: Add some space between the label and radio button group */
        }

        .orientation>.radio-group {
            display: flex;
            align-items: center;
            margin-right: 15px;
            /* Optional: Add some space between each radio group */
        }

        .radio-group input[type="radio"] {
            margin-right: 5px;
            /* Optional: Add some space between the radio button and the label */
        }

        .extradetails {
            width: 45%;
        }

        .attachments {
            margin-top: 3%;
            width: 35%;
            /* Sets the width to 25% */
            border: 2px solid #ccc;
            /* Adds a border with 2px width and light gray color */
            border-radius: 5px;
            /* Adds rounded corners */
            padding: 10px;
            /* Adds padding inside the element */
            display: flex;
            /* Flexbox for alignment */
            align-items: center;
            /* Vertically center the content */
            cursor: pointer;
            /* Changes cursor to pointer */
        }

        .attachments label {
            flex-grow: 1;
            /* Allows label to take up remaining space */
            margin-right: 10px;
            /* Adds some space between label and input */
        }

        .attachments input[type="file"] {
            display: none;
            /* Hides the file input */
        }

        .buttondtails {
            margin-left: 50%;
            margin-top: 2%;
            max-width: 100%;
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            background-color: #ffffff;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .addrowButton {
            margin-left: 50%;
            margin-top: 2%;
            max-width: 100%;
            padding: 20px;
            border: 1px solid #ffffff;
            border-radius: 5px;
            background-color: #ffffff;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }

        .btn {
            margin-bottom: 5%;
        }

        .removeBtn {
            margin-top: 5%;
        }
    </style>
</head>

<body>


    <section class="home-section">

        <div class="main-content">
            <h2>Add New Custom Task
            </h2>
            <button class="top-right-button">List</button>
            <div class="box-container">

                <form method="post" class="client-form" enctype="multipart/form-data" action="<?php echo base_url('index.php/CustomTaskContro/addNewClient') ?>">

                    <div class="form-group">
                        <label for="client-search">Client Name:</label>
                        <input type="text" id="client-search" name="clientSearch" list="clients" placeholder="Search Client Name">
                        <datalist id="clients">
                            <?php
                            if (!empty($clients)) {
                                foreach ($clients as $client) {
                                    if ($client['status'] == 1) {
                                        echo '<option value="' . $client['owner_name'] . '">';
                                    }
                                }
                            }
                            ?>
                        </datalist>
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select id="category" name="category" required>
                            <option value="All">All</option>
                            <?php if (!empty($result)) {
                                foreach ($result as $userData) {
                                    if ($userData['status'] == 1) {
                                        echo '<option value="' . htmlspecialchars($userData['form']) . '">' . htmlspecialchars($userData['name']) . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="permissions">Permissions:</label>
                        <select id="permissions" name="permissions" required onchange="toggleFields()">
                            <option value="Select">Select</option>
                            <option value="Default Team">Default Team</option>
                            <option value="Select Team">Select Team</option>
                        </select>
                    </div>





                    <div id="additionalFields" style="display: none;">

                        <div class="additional-group">
                            <label for="teamLeader">Team Leader:</label>
                            <select id="teamLeader" name="teamLeader" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Team Lead') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <div class="additional-group">
                            <label for="headCW">Head Content Writer:</label>
                            <select id="headCW" name="headCW" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Head Content Writer') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="additional-group">
                            <label for="cw">Content Writer:</label>
                            <select id="CW" name="CW" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Content_Writer') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="additional-group" style="  float: right;">
                            <label for="headGD">Head Graphics Designer:</label>
                            <select id="headGD" name="headGD" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Head Graphic designer') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>




                        <div class="additional-group">
                            <label for="GD">Graphics Designer:</label>
                            <select id="GD" name="GD" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Graphic_designer') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>


                        <div class="additional-group" style="  float: right;">
                            <label for="hSmm">Head Social Media Manager:</label>
                            <select id="hSmm" name="hSmm" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Head Social Media Manager') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>



                        <div class="additional-group">
                            <label for="smm">Social Media Manager:</label>
                            <select id="smm" name="smm" required>
                                <option value="Select">Select</option>
                                <?php
                                if (!empty($userResult)) {
                                    foreach ($userResult as $userData) {
                                        // Output each option with the value as ID and label as name from the database
                                        if ($userData['role'] === 'Social Media Manager') {
                                            if ($userData['status'] == 1) {
                                                echo '<option value="' . $userData['id'] . '" ' . $selected . '>' . $userData['name'] . '</option>';
                                            }
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="box-container1" style="display:none; width: 100%;">
                        <div id="task-details" style="width: 100%;"></div>
                    </div>



                    <div id="task-details"></div>


            </div>
            <!-- <div class="taskdetails">

                <div class="taskName">
                    <label>Enter Task Name</label>
                    <input type="text" name="taskname[]" placeholder="Enter Your task Name">
                </div>

                <div class="taskName">
                    <label>Enter Task Name</label>
                    <input type="text" name="taskname[]" placeholder="Enter Your task Name">
                </div>

                <div class="deadline">
                    <label>Deadline</label>
                    <input type="date" name="deadline[]">
                </div>



                <div class="width">
                    <label>Enter Width</label>
                    <input type="number" name="width[]" placeholder="Enter Width">
                </div>

                <div class="height">
                    <label>Height</label>
                    <input type="number" name="height[]" placeholder="Enter Width">
                </div>

                <div class="resolution">
                    <label>Resolution</label>
                    <input type="number" name="resolution[]" placeholder="Enter Resolution">
                </div>

                <div class="Pixels">
                    <label>Pixels</label>
                    <input type="number" name="pixels[]" placeholder="Enter Width">
                </div>

                <div class="color">
                    <label>Color Mode</label>
                    <input type="number" name="cmode[]" placeholder="Enter Resolution">
                </div>

                <div class="orientation">
                    <label>Orientation</label>
                    <div class="radio-group">
                        <input type="radio" id="Orientation[]" name="Orientation" value="Orientation">
                        <p for="html">Orientation</p>
                    </div>
                    <div class="radio-group">
                        <input type="radio" id="Artboards[]" name="Orientation" value="Artboards">
                        <p for="css">Artboards</p>
                    </div>

                </div>

                <div class="extradetails">
                    <label>Information</label>
                    <textarea name="information[]" placeholder="Enter Information" rows="5" cols="90" style="padding: 10px; "></textarea>
                </div>


                <div class="attachments" onclick="triggerFileInput()">

                    <label for="file-input">Drop files here to upload</label>
                    <input type="file" id="file-input" name="multipalPics[]" multiple>
                </div>
            </div> -->

            <div id="dynamicRows">





            
            </div>

        </div>




        <div class="buttondetails">
            <div style="margin-bottom: 50px;" class="btn">
                <button type="button" class="btn btn-warning" id="addRowBtn">Add New Row</button>

                <button type="button" class="btn btn-secondary ml-2" onclick="addNewField()">Add New Field</button>
                        
            </div>
        </div>

        <div>
            <input type="submit" class="btn btn-success" value="submit" name="submit">
            <button type="button" class="btn btn-danger">Close</button>

        </div>


        </form>
    </section>

    <script>


function addNewField() {
            var form = document.getElementById('sample-form');
            var newFieldIndex = form.children.length; // Unique index for each field
            var newField = document.createElement('div');
            newField.classList.add('form-row');
            newField.innerHTML = `
            
                <div class="container" style="border: 1px solid #ccc; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); padding: 30px; margin-bottom:5%">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Question</label>
                            <input type="text" class="form-control" name="question[]" placeholder="Enter your question">
                            
                        </div>
                        <div class="form-group col-md-4">
                            <label id="status-select" for="type">Type</label>
                            <select id="status-select" class="form-control" id="type" name="type[]" onchange="handleTypeChange(this)">
                                <option value="Select">Select</option>
                                <option value="text">Text Box</option>
                                <option value="number">Number</option>
                                <option value="email">E-Mail</option>
                                <option value="password">Password</option>
                                <option value="textarea">Text Area</option>
                                <option value="date">Date</option>
                                <option value="time">Time</option>
                                <option value="datetime-local">Date-Time</option>
                                <option value="url">url</option>
                                <option value="file">File</option>
                                <option value="datalist">Data List</option>
                                <option value="radio">Radio Button</option>
                                <option value="checkbox">Check Box</option>
                                <option value="select">Single Dropdown</option>
                                <option value="multiselect">Multiple Dropdown</option>
                            </select>
                        </div>
                        <div class="input-field col-md-2" style="width: 10%; padding-left: 25px;">
                    <label>Require</label>
                    <label class="switch">
                        <input id="require-checkbox-${newFieldIndex}" class="form-control" type="checkbox" onchange="updateRequireValue(${newFieldIndex})">
                        <span class="slider round" onclick="toggleSlider(this, ${newFieldIndex})"></span>
                        <input type="hidden" name="required[]" id="require-value-${newFieldIndex}" value="0">
                    </label>
                </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label>Description</label>
                            <input type="text" class="form-control" name="dis[]" placeholder="Enter your Description">
                    
                        </div>
                         
          
                        
                        <div class="form-group col-md-3">
                            <label>Pattern</label>
                            <input type="text" class="form-control" name="pattern[]" placeholder="Enter your Pattern">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Pattern Message</label>
                            <input type="text" class="form-control" name="ptrn_msg[]" placeholder="Enter your Pattern Message">
                        </div>
                        <div class="form-group col-md-3">
                            <label id="status-select" for="cols">Cols</label>
                            <select id="status-select" class="form-control" name="cols[]">
                                <option value="Select">Select</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        
                        <div class="form-group col-md-12">
    <label for="permissions">Permissions</label>
    <select class="form-control" name="permissions[]" id="permissions">
        <?php echo $options; ?>
    </select>
</div>

                    <div class="form-group col-md-12">
                    
                    <label>Options</label>
            <input type="text" class="form-control" placeholder="Enter an option">
            <button type="button" class="btn btn-primary mt-2" onclick="addOption(this)">Add Option</button>
            <ul class="options-list mt-2"></ul>
            <input type="hidden" name="options[]" value="">

                    </div>
                   

                    <div class="form-row options-container"></div>
                    <div class="form-group col-md-12">
                        <button type="button" class="btn btn-danger" onclick="removeField(this)">Remove Field</button>
                    </div>
                </div>
                </div>
            `;
            form.insertBefore(newField, form.lastElementChild);
       
        }

        function removeField(button) {
            var formGroup = button.parentElement.parentElement.parentElement;
            formGroup.remove();
        }













//       $(document).ready(function() {

//     $('#addRowBtn').on('click', function() {
//         var rowCount = $('.taskdetails').length + 1; // Calculate the current row count
//         var newRow = `
//             <div class="taskdetails">
//                 <div class="taskName">
//                     <label>Enter Task Name</label>
//                     <input type="text" name="taskname[${rowCount}]" placeholder="Enter Your Task Name">
//                 </div>
//                 <div class="deadline">
//                     <label>Deadline</label>
//                     <input type="date" name="deadline[${rowCount}]">
//                 </div>
//                 <div class="width">
//                     <label>Enter Width</label>
//                     <input type="number" name="width[${rowCount}]" placeholder="Enter Width">
//                 </div>
//                 <div class="height">
//                     <label>Height</label>
//                     <input type="number" name="height[${rowCount}]" placeholder="Enter Height">
//                 </div>
//                 <div class="resolution">
//                     <label>Resolution</label>
//                     <input type="number" name="resolution[${rowCount}]" placeholder="Enter Resolution">
//                 </div>
//                 <div class="Pixels">
//                     <label>Pixels</label>
//                     <input type="number" name="pixels[${rowCount}]" placeholder="Enter Pixels">
//                 </div>
//                 <div class="color">
//                     <label>Color Mode</label>
//                     <input type="number" name="cmode[${rowCount}]" placeholder="Enter Color Mode">
//                 </div>
//                 <div class="orientation">
//                     <label>Orientation</label>
//                     <div class="radio-group">
//                         <input type="radio" id="Orientation_${rowCount}" name="Orientation[${rowCount}]" value="Orientation">
//                         <label for="Orientation_${rowCount}">Orientation</label>
//                     </div>
//                     <div class="radio-group">
//                         <input type="radio" id="Artboards_${rowCount}" name="Orientation[${rowCount}]" value="Artboards">
//                         <label for="Artboards_${rowCount}">Artboards</label>
//                     </div>
//                 </div>
//                 <div class="extradetails">
//                     <label>Information</label>
//                     <textarea name="information[${rowCount}]" placeholder="Enter Information" rows="5" cols="60" style="padding: 10px;"></textarea>
//                 </div>
//                 <div class="attachments" onclick="triggerFileInput()">
//                     <label for="file-input">Drop files here to upload</label>
//                     <input type="file" id="file-input" name="multipalPics[${rowCount}]" multiple>
//                 </div>
//                 <div class="removeBtn">
//                     <button type="button" class="btn btn-danger btn-sm remove-row">Remove</button>
//                 </div>
//             </div>
//         `;
//         $('#dynamicRows').append(newRow);
//     });

//     // Event delegation for Remove button
//     $('#dynamicRows').on('click', '.remove-row', function() {
//         $(this).closest('.taskdetails').remove();
//     });

// });







        function triggerFileInput() {
            document.getElementById('file-input').click();
        }




        function triggerFileInput() {
            document.getElementById('file-input').click();
        }

        $('#bold').on('click', function() {
            document.execCommand('bold', false, null);
        });

        $('#italic').on('click', function() {
            document.execCommand('italic', false, null);
        });

        $('#underline').on('click', function() {
            document.execCommand('underline', false, null);
        });

        $('#align-left').on('click', function() {
            document.execCommand('justifyLeft', false, null);
        });

        $('#align-center').on('click', function() {
            document.execCommand('justifyCenter', false, null);
        });

        $('#align-right').on('click', function() {
            document.execCommand('justifyRight', false, null);
        });

        $('#list-ul').on('click', function() {
            document.execCommand('insertUnorderedList', false, null);
        });

        $('#list-ol').on('click', function() {
            document.execCommand('insertOrderedList', false, null);
        });

        $('#fonts').on('change', function() {
            var font = $(this).val();
            document.execCommand('fontName', false, font);
        });

        $('#size').on('change', function() {
            var size = $(this).val();
            $('.editor').css('fontSize', size + 'px');
        });

        $('#color').spectrum({
            color: '#000',
            showPalette: true,
            showInput: true,
            showInitial: true,
            showInput: true,
            preferredFormat: "hex",
            showButtons: false,
            change: function(color) {
                color = color.toHexString();
                document.execCommand('foreColor', false, color);
            }
        });

        $('.editor').perfectScrollbar();


        // JavaScript code for other functionalities
        $('#bold').on('click', function() {
            document.execCommand('bold', false, null);
        });




        $(document).ready(function() {
            $('#client-search').on('keyup', function() {
                var searchText = $(this).val().toLowerCase();
                $('#client-name option').each(function() {
                    var optionText = $(this).text().toLowerCase();
                    var match = optionText.indexOf(searchText) > -1;
                    $(this).toggle(match);
                });
            });
        });

        function toggleFields() {
            var permissionsSelect = document.getElementById("permissions");
            var additionalFieldsDiv = document.getElementById("additionalFields");

            if (permissionsSelect.value === "Select Team") {
                additionalFieldsDiv.style.display = "block";
            } else {
                additionalFieldsDiv.style.display = "none";
            }
        }

        document.getElementById('category').addEventListener('change', function() {
            var boxContainer = document.getElementById('box-container1');
            var taskDetails = document.getElementById('task-details');
            var selectedValue = this.value;

            if (selectedValue !== 'All') {
                // Construct the URL with the selected value
                var url = baseUrl + selectedValue;

                fetch(url)
                    .then(response => response.text())
                    .then(data => {
                        boxContainer.style.display = '';
                        taskDetails.innerHTML = '<div class="showCat" >' + data + '</div>';
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                        taskDetails.innerHTML = 'An error occurred while fetching data.';
                    });
            } else {
                boxContainer.style.display = 'none';
                taskDetails.innerHTML = ''; // Clear the task details if "All" is selected
            }
        });

        const baseUrl = 'http://localhost/adhub/ci3/CodeIgniter3/index.php/CustomTaskContro/addQuestion/';
    </script>




</body>

</html>