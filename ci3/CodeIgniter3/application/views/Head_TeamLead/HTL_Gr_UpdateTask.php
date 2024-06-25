<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Logo and Buttons</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
            background-color: white;
            /* Set the background color to white */
        }

        .custom-container {
            background: white;
            margin: 10% auto;
            /* Updated margin-top to 10% */
            padding: 20px;
            max-width: 700px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 60%;
        }

        .box {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            /* background-color: #f8f9fa; Light gray background */
        }

        .logo {
            max-width: 50px;
        }

        /* Changed the class name from .button-container to .custom-button-container */
        .custom-button-container {

            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            /* Allow buttons to wrap to the next line */
        }

        .custom-button {
            margin: 5px;
            padding: 5px 20px;
            font-size: 12px;
            background-color: #439fef;
            color: #050404;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-button:hover {
            background-color: #0056b3;
        }

        /* Rest of your CSS styles remain the same */

        .cont {
            width: 600px;
            max-width: 96%;
            margin: auto;
            position: absolute;
            top: 0;
            right: 0;
            margin-top: 20px;
            /* Adjust as needed */
            margin-right: 100px;
            /* Adjust as needed */
        }

        button.log-out-client {
            height: 45px;
            border: 0;
            padding-right: 20px;
            border-radius: 4px;
            background-color: #3F51B5;
            color: rgba(255, 255, 255, 0.8);
            line-height: 35px;
            cursor: pointer;
            transition: background-color 0.4s;
        }

        button.log-out-client i {
            width: 45px;
            line-height: 45px;
            height: 45px;
            background-color: rgba(0, 0, 0, 0.1);
            margin-right: 15px;
            color: rgba(255, 255, 255, 0.7);
        }

        button.log-out-client:hover,
        button.log-out-client.cancel:hover {
            background-color: #333;
        }

        #editor {
            width: 800px;
            margin: 50px auto 50px auto;
            padding: 20px;
            /* Added padding */
            border: 1px solid #464646;
            /* Added border */
            border-radius: 10px;
            background: #fafafa;
        }



        #toolbar {
            margin-left: -20px;
            margin-right: -20px;
            border-bottom: 1px solid #464646;
            padding: 8px 20px;
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        #page {
            padding-top: 30px;
            min-height: 300px;
            outline: none;
        }

        .icon {
            float: left;
            height: 30px;
            width: 40px;
            margin-right: 10px;
            background: #000000;
            font-size: 0.8rem;
            color: #464646;
            text-align: center;
            cursor: pointer;
        }

        .icon:hover {
            border-color: #3e7086;
            color: #3e7086;
        }

        div#editor {
            width: 100%;
            height: 400px;
            margin: 0;
            margin-bottom: 20px;
            padding: 0;
            border: 1px solid #cfcfcf;
            border-radius: 4px;
        }

        #page * {
            font-family: 'Roboto', sans-serif;
        }

        #page {
            min-height: initial;
            height: 100%;
            margin: 0;
            box-sizing: border-box;
            padding: 10px;
            padding-top: 63px;
            margin-top: -53px;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        section#toolbar {
            height: 53px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px solid #cfcfcf;
            background-color: #fff;
            overflow: hidden;
            border-radius: 4px 4px 0px 0px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .icon {
            height: 33px;
            background: transparent;
            opacity: 0.7;
            color: #555;
            width: 33px;
            line-height: 33px;
        }

        .icon:hover {
            opacity: 1;
            color: #3F51B5;
        }

        ul,
        ol {
            padding-left: 28px;
            color: #777;
        }

        /* body {
            width: 100%;
            height: 100%;
            min-height: 100vh;
            display: flex;
        } */

        .cont {
            width: 800px;
            max-width: 96%;
            margin-top: 10px;
            margin-right: 0%;
        }

        /* New CSS for the box below the editor */
        .box-below-editor {
            width: 100%;
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border: 1px solid #ffffff;
            border-radius: 5px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            text-align: left;
        }

        /* Adjust the styles as needed */
        .box-below-editor p {
            flex-basis: 100%;
            margin-bottom: 10px;
        }

        .full-width-box {
            width: 100%;
            height: 100%;
            background-color: #f0f0f0;
            border: 1px solid #ffffff;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }

        .close-popup-icon {
            position: absolute;
            top: 10px;
            /* Adjust the distance from the top as needed */
            left: 10px;
            /* Adjust the distance from the left as needed */
            cursor: pointer;
        }

        .close-popup-icon i {
            font-size: 20px;
            /* Adjust the size of the icon as needed */
            color: #333;
            /* Adjust the color of the icon as needed */
        }
    </style>
</head>

<body>


    <div class="custom-container">
        <section class="content-section">
            <div class="close-popup-icon" onclick="closePopup()">
                <i class="fa fa-times"></i>
            </div>

            <form id="myForm" method="post" action="<?php echo base_url('index.php/TeamLead/TL_dashboardControll/updateTask'); ?>">
                <!-- Your form fields here -->
                <input type="hidden" name="button_clicked" id="button_clicked">

                <!-- <label>Enter your name</label>
                        <input type="text" name="name"> -->


                TID <?php echo urlencode($row['id']); ?>
                <input type="hidden" name="tid" id="tid" value="<?php echo urlencode($row['id']); ?>">


                <input type="hidden" name="cr_Status" id="cr_Status" value=" <?php echo urlencode($row['id']); ?>">
                <input type="hidden" name="gr_Status" id="gr_Status" value=" <?php echo urlencode($row['id']); ?>">
               <input type="hidden" name="smm_Status" id="smm_Status" value=" <?php echo urlencode($row['id']); ?>">

                <div class="box">
                    <!-- Logo Image -->
                    <img src=<?php echo base_url('img/Gallery.png'); ?> alt="Logo" class="logo">
                </div>
                <!-- Buttons -->
                <div class="custom-button-container">

                    <div class="button-wrapper">
                        <button class="custom-button">54 Questions</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">TG form</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">CVP Form</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Paain Point</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Requirment</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Language</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Offers</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Digital File</button>
                    </div>
                    <div class="button-wrapper">
                        <button class="custom-button">Tickit History</button>

                        <!-- Repeat for other buttons -->
                    </div>

                    <div class="box-below-editor">
                        <!-- Your content goes here -->
                        <p>Date</p>
                        <p>Festival </p>
                        <p>Technique</p>
                        <p>Task Details</p>
                        <p>Festival Name</p>
                        <p>Date:</p>
                    </div>
                </div>


                <input type="hidden" name="editor_content" id="editor_content">
                <div class="cont">
                    <div id="editor" contenteditable="true">
                        <section id="toolbar">
                            <div id="bold" class="icon fa fa-bold"></div>
                            <div id="italic" class="icon fa fa-italic"></div>
                            <div id="createLink" class="icon fa fa-link"></div>
                            <div id="insertUnorderedList" class="icon fa fa-list"></div>
                            <div id="insertOrderedList" class="icon fa fa-list-ol"></div>
                            <div id="justifyLeft" class="icon fa fa-align-left"></div>
                            <div id="justifyRight" class="icon fa fa-align-right"></div>
                            <div id="justifyCenter" class="icon fa fa-align-center"></div>
                            <div id="justifyFull" class="icon fa fa-align-justify"></div>
                        </section>
                        <div id="page" contenteditable="true" name="editor_content">
                            <p id="page-content"></p>
                        </div>
                    </div>


                    <!-- Add this hidden form input field -->


                    <div class="custom-button-container">
                        <input type="hidden" name="button_clicked" id="button_clicked" >
                        <button class="custom-button" type="button" style="background-color: palevioletred;" onclick="submitGrChanges(2, '<?php echo urlencode($row['id']); ?>')">In Review</button>
                        <button class="custom-button" type="button" style="background-color: yellowgreen;" onclick="submitGrChanges(4, '<?php echo urlencode($row['id']); ?>')">Changes</button>
                        <button class="custom-button" type="button" style="background-color: indianred;" onclick="submitGrChanges(6, '<?php echo urlencode($row['id']); ?>')">Approve by Hand</button>
                        <button class="custom-button" type="button" style="background-color: green;" onclick="submitGrChanges(7, '<?php echo urlencode($row['id']); ?>')">Send To Client</button>
                        <button class="custom-button" type="button" style="background-color: pink;" onclick="submitSmmChanges(1, '<?php echo urlencode($row['id']); ?>')">Send To SMM </button>
                        <button class="custom-button" type="button" style="background-color: yellow;" onclick="submitCrChanges(1, '<?php echo urlencode($row['id']); ?>')">CR_Changes</button>
                    </div> 

                    <!-- First full-width box -->
                    <div class="full-width-box">
                        <h2>chat box</h2>
                        <p>This is the content of the chat.</p>
                    </div>

                    <!-- Second full-width box -->
                    <div class="full-width-box">
                        <h2>client chat box</h2>
                        <p>This is the content of the chat</p>
                    </div>

            </form>
        </section>

        <script>
            var ghostEditor = {
                bindEvents: function() {
                    this.bindDesignModeToggle();
                    this.bindToolbarButtons();
                },

                bindDesignModeToggle: function() {
                    $('#page-content').on('click', function(e) {
                        document.designMode = 'on';
                    });

                    $('#page-content').on('click', function(e) {
                        var $target = $(e.target);

                        if ($target.is('#page-content')) {
                            document.designMode = 'off';
                        }
                    });
                },

                bindToolbarButtons: function() {
                    $('#toolbar').on('mousedown', '.icon', function(e) {
                        e.preventDefault();
                        var btnId = $(e.target).attr('id');
                        this.editStyle(btnId);
                    }.bind(this));
                },

                editStyle: function(btnId) {
                    var value = null;

                    if (btnId === 'createLink') {
                        if (this.isSelection()) value = prompt('Enter a link:');
                    }

                    document.execCommand(btnId, true, value);
                },

                isSelection: function() {
                    var selection = window.getSelection();
                    return selection.anchorOffset !== selection.focusOffset
                },

                init: function() {
                    this.bindEvents();
                },
            }

            ghostEditor.init();


            function closePopup() {
                var container = document.querySelector('.custom-container');
                container.style.display = 'none';
                window.location.href = 'http://localhost/adhub/ci3/CodeIgniter3/index.php/TeamLead/TL_dashboardControll/viewDashboard';
            }

            function togglePopup(button, ticketId) {
                // Toggle the visibility of the popup
                const popup = button.nextElementSibling;
                if (popup.style.display === 'none' || popup.style.display === '') {
                    // Set ticketId as a data attribute in the popup element
                    popup.setAttribute('data-ticket-id', ticketId);
                    popup.style.display = 'block';
                } else {
                    popup.style.display = 'none';
                }

                // Print the ticket ID instead of redirecting
                console.log('Ticket ID:', ticketId);
            }

            function updateEditorContent() {
                // var editorContent = document.getElementById('editor').innerHTML;
                // var nameValue = document.querySelector('input[name="name"]').value;
                // document.getElementById('editor_content').value = editorContent;
                document.getElementById('name').value = nameValue;
                document.getElementById('myForm').submit();
            }



            // Call the function when the form is submitted


            function submitCrChanges(cr_Status, tid) {
                // Set the value of cr_Status input field to cr_Status
                document.getElementById('cr_Status').value = cr_Status;

                // Set the value of tid input field to tid
                document.getElementById('tid').value = tid;

                // Submit the form
                document.getElementById('myForm').submit();
            }

            function submitGrChanges(gr_Status, tid) {
                // Set the value of cr_Status input field to cr_Status
                document.getElementById('gr_Status').value = gr_Status;

                // Set the value of tid input field to tid
                document.getElementById('tid').value = tid;

                // Submit the form
                document.getElementById('myForm').submit();
            }


            function submitSmmChanges(smm_Status, tid) {
                // Set the value of cr_Status input field to cr_Status
                document.getElementById('smm_Status').value = smm_Status;

                // Set the value of tid input field to tid
                document.getElementById('tid').value = tid;

                // Submit the form
                document.getElementById('myForm').submit();
            }

          
          
        </script>

    </div>
</body>

</html>

<?php
session_write_close();
?>