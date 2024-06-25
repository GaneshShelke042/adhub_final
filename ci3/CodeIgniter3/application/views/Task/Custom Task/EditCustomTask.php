<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/css/perfect-scrollbar.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.7.1/spectrum.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.6.7/js/min/perfect-scrollbar.jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>


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

        label {
            display: inline-block;
            width: 100%;
            font-weight: bold;
        }

        input[type="text"],
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Adding shadow effect */
        }

        .form-group {

            flex: 1 1 calc(50% - 10px);
            margin-right: 10px;
        }

        .label-container {
            display: flex;
            justify-content: space-between;
        }

        label {
            /* display: block; */
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
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
            top: 10px;
            right: 10px;
            padding: 8px 16px;
            background-color: #1a0876;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .top-right-button:hover {
            background-color: #45a049;
        }

        /* body {
   background: #525764;
   font-family: Arial, sans-serif;
   font-size: 16px;
} */

        /* .wrap {
   width: 30%;
   height: 20%;
   min-width: 562px;
   margin: 60px auto 0;
   background: #fafafa;
   border-radius: 8px;
   box-shadow: 0 5px 8px 0 rgba(0,0,0,.4);
   padding: 10px;
} */

        .toolbar {
            width: 100%;
            margin: 0 auto 10px;
        }

        /* 
button {
   width: 30px;
   height: 30px;
   border-radius: 3px;
   background: none;
   border: none;
   box-sizing: border-box;
   padding: 0;
   font-size: 20px;
   color: #a6a6a6;
   cursor: pointer;
   outline: none;
}

button:hover {
   border: 1px solid #a6a6a6;
   color: #777;
} */

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

        /* select {
   height: 24px;
   font-size: 15px;
   font-weight: bold;
   color: #444;
   background: #fcfcfc;
   border: 1px solid #a6a6a6;
   border-radius: 3px;
   margin: 0;
   outline: none;
   cursor: pointer;
}

select > option {
   font-size: 15px;
   background: #fafafa;
} */

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
    </style>
</head>

<body>

    <!-- <h2>Client Permissions Form</h2> -->
    <section class="home-section" style="margin-top: -50%;">
        <button class="top-right-button">Add new</button>
        <form method="post" class="client-form">

            <div class="form-group">
                <label for="client_name">Client Name:</label>
                <input type="text" id="client_name" name="client_name" value="<?php echo set_value('client_name', $result['client_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" value="<?php echo set_value('category', $result['category']); ?>" required>
                    <option value="Select a category" <?php if ($result['category'] == 'Select a category') echo 'selected'; ?>>Select a category</option>
                    <option value="category1" <?php if ($result['category'] == 'category3') echo 'selected'; ?>>Category 1</option>
                    <option value="category2" <?php if ($result['category'] == 'category2') echo 'selected'; ?>>Category 2</option>
                    <option value="category3" <?php if ($result['category'] == 'category3') echo 'selected'; ?>>Category 3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="permissions">Permissions:</label>
                <select id="permissions" name="permissions" value="<?php echo set_value('permissions', $result['permissions']); ?>" required>
                    <option value="Select permissions" <?php if ($result['permissions'] == 'Select a permissions') echo 'selected'; ?>>Select permissions</option>
                    <option value="read" <?php if ($result['permissions'] == 'read') echo 'selected'; ?>>Read</option>
                    <option value="write" <?php if ($result['permissions'] == 'write') echo 'selected'; ?>>Write</option>
                    <option value="delete" <?php if ($result['permissions'] == 'delete') echo 'selected'; ?>>Delete</option>
                </select>
            </div>


            <div class="task">
                <div class="box-label">
                    <!-- New Box -->
                    <label for="new_box" style="font-size: large;">Task Details</label>
                </div>
            </div>

            <!-- <div class="task">
    
                </div> -->


            <div class="task">
                <div class="form-group">
                    <!-- Task Name -->
                    <label for="task_name">Task Name:</label>
                    <input type="text" id="task_name" name="task_name" value="<?php echo set_value('task_name', $result['task_name']); ?>" style="width: 90%;">
                </div>
                <div class="form-group">
                    <!-- Deadline -->
                    <h3>Initial value</h3>
                    <div class="ui calendar" id="example5">
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input type="text" name="deadline" placeholder="Date" value="<?php echo set_value('deadline', $result['deadline_datetime']); ?>">
                        </div>
                    </div>
                    <br />
                </div>
                <div class="form-group">
                    <div class="wrap">
                        <div class="toolbar">
                            <button id="bold" title="Bold (Ctrl+B)"><i class="fa fa-bold"></i></button>
                            <button id="italic" title="Italic (Ctrl+I)"><i class="fa fa-italic"></i></button>
                            <button id="underline" title="Underline (Ctrl+U)"><i class="fa fa-underline"></i></button>
                            <select name="fonts" id="fonts">
                                <option value="Arial" selected>Arial</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Tahoma">Tahoma</option>
                                <option value="Times New Roman">Times New Roman</option>
                                <option value="Verdana">Verdana</option>
                                <option value="Impact">Impact</option>
                                <option value="Courier New">Courier New</option>
                            </select>
                            <select name="size" id="size">
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="14">14</option>
                                <option value="16" selected>16</option>
                                <option value="18">18</option>
                                <option value="20">20</option>
                                <option value="22">22</option>
                                <option value="24">24</option>
                                <option value="26">26</option>
                            </select>
                            <!-- <input type="text" name="task_details" id="color" /> -->
                            <button id="align-left" title="Left"><i class="fa fa-align-left"></i></button>
                            <button id="align-center" title="Center"><i class="fa fa-align-center"></i></button>
                            <button id="align-right" title="Right"><i class="fa fa-align-right"></i></button>
                            <button id="list-ul" title="Unordered List"><i class="fa fa-list-ul"></i></button>
                            <button id="list-ol" title="Ordered List"><i class="fa fa-list-ol"></i></button>
                        </div>
                        <div class="editor" contenteditable>
                            <input type="textarea">
                            <textarea id="w3review" name="task_details1" rows="4" cols="50">
                        </textarea>

                        </div>
                    </div>
                </div>

                <div class="form-group attachment">
                    <!-- Attachment -->

                    <div class="custom-file-upload">
                        <label for="attachment">Drag & Drop files here</label>
                        <input type="file" id="attachment" name="attachment" accept="image/*" value="<?php echo set_value('attachment', $result['attachment']); ?>" multiple>
                    </div>
                </div>

            </div>

            <div class="submit-button-container">
                <!-- <button type="submit" class="submit-button">Add New Task</button> -->

            </div>
            <div class="submit-button-container">
                <button type="submit" name="submit" value="submit" class="submit-button">Submit</button>
                <button type="button" class="close-button">Close</button>
            </div>
        </form>
    </section>
    <script>
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
    </script>
    <script>
        $('#example1').calendar();
        $('#example2').calendar({
            type: 'date'
        });
        $('#example3').calendar({
            type: 'time'
        });
        $('#rangestart').calendar({
            type: 'date',
            endCalendar: $('#rangeend')
        });
        $('#rangeend').calendar({
            type: 'date',
            startCalendar: $('#rangestart')
        });
        $('#example4').calendar({
            startMode: 'year'
        });
        $('#example5').calendar();
        $('#example6').calendar({
            ampm: false,
            type: 'time'
        });
        $('#example7').calendar({
            type: 'month'
        });
        $('#example8').calendar({
            type: 'year'
        });
        $('#example9').calendar();
        $('#example10').calendar({
            on: 'hover'
        });
        var today = new Date();
        $('#example11').calendar({
            minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 5),
            maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 5)
        });
        $('#example12').calendar({
            monthFirst: false
        });
        $('#example13').calendar({
            monthFirst: false,
            formatter: {
                date: function(date, settings) {
                    if (!date) return '';
                    var day = date.getDate();
                    var month = date.getMonth() + 1;
                    var year = date.getFullYear();
                    return day + '/' + month + '/' + year;
                }
            }
        });
        $('#example14').calendar({
            inline: true
        });
        $('#example15').calendar();
    </script>
</body>

</html>