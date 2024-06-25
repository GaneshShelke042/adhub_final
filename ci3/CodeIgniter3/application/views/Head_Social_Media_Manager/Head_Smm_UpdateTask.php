

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Section with Custom Styles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom Styles -->
    <style>
        .message-area {
            display: flex;
            flex-direction: row;
            /* Ensures children stack vertically */
            height: 100vh;
            overflow: hidden;
            padding: 30px 0;
            background: #f5f5f5;
        }


        .chat-area {
            position: relative;
            width: 100%;
            background-color: #fff;
            border-radius: 0.3rem;
            height: 90vh;
            overflow: hidden;
            min-height: calc(100% - 1rem);
        }

        .chatlist {
            outline: 0;
            height: 100%;
            overflow: hidden;
            width: 300px;
            float: left;
            padding: 15px;
        }

        .chat-area .modal-content {
            border: none;
            border-radius: 0;
            outline: 0;
            height: 100%;
        }

        .chat-area .modal-dialog-scrollable {
            height: 100% !important;
        }

        .chatbox {
            width: auto;
            overflow: hidden;
            height: 100%;
            border-left: 1px solid #ccc;
        }

        .chatbox .modal-dialog,
        .chatlist .modal-dialog {
            max-width: 100%;
            margin: 0;
        }

        .msg-search {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-area .form-control {
            display: block;
            width: 80%;
            padding: 0.375rem 0.75rem;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            color: #222;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ccc;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .chat-area .form-control:focus {
            outline: 0;
            box-shadow: inherit;
        }

        a.add img {
            height: 36px;
        }

        .chat-area .nav-tabs {
            border-bottom: 1px solid #dee2e6;
            align-items: center;
            justify-content: space-between;
            flex-wrap: inherit;
        }

        .chat-area .nav-tabs .nav-item {
            width: 100%;
        }

        .chat-area .nav-tabs .nav-link {
            width: 100%;
            color: #180660;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.5;
            text-transform: capitalize;
            margin-top: 5px;
            margin-bottom: -1px;
            background: 0 0;
            border: 1px solid transparent;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }



        .chat-list a.d-flex {
            margin-bottom: 15px;
            position: relative;
            text-decoration: none;
        }

        .chat-list .active {
            display: block;
            content: "";
            clear: both;
            position: absolute;
            bottom: 3px;
            left: 34px;
            height: 12px;
            width: 12px;
            background: #00db75;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .msg-head h3 {
            color: #222;
            font-size: 18px;
            font-weight: 600;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .msg-head p {
            color: #343434;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            text-transform: capitalize;
            margin-bottom: 0;
        }

        .msg-head {
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }

        .moreoption {
            display: flex;
            align-items: center;
            justify-content: end;
        }

        .moreoption .navbar {
            padding: 0;
        }

        .moreoption li .nav-link {
            color: #222;
            font-size: 16px;
        }

        .moreoption .dropdown-toggle::after {
            display: none;
        }

        .moreoption .dropdown-menu[data-bs-popper] {
            top: 100%;
            left: auto;
            right: 0;
            margin-top: 0.125rem;
        }

        .msg-body ul {
            overflow: hidden;
        }

        .msg-body ul li {
            list-style: none;
            margin: 15px 0;
        }

        .msg-body ul li.sender {
            display: block;
            width: 100%;
            position: relative;
        }

        .msg-body ul li.sender:before {
            display: block;
            clear: both;
            content: "";
            position: absolute;
            top: -6px;
            left: -7px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 12px 15px 12px;
            border-color: transparent transparent #f5f5f5 transparent;
            -webkit-transform: rotate(-37deg);
            -ms-transform: rotate(-37deg);
            transform: rotate(-37deg);
        }

        .msg-body ul li.sender p {
            color: #000;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 400;
            padding: 15px;
            background: #f5f5f5;
            display: inline-block;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-bottom: 0;
        }

        .msg-body ul li.sender p b {
            display: block;
            color: #180660;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 500;
        }

        .msg-body ul li.repaly {
            display: block;
            width: 100%;
            text-align: right;
            position: relative;
        }

        .msg-body ul li.repaly:before {
            display: block;
            clear: both;
            content: "";
            position: absolute;
            bottom: 15px;
            right: -7px;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 12px 15px 12px;
            border-color: transparent transparent #4b7bec transparent;
            -webkit-transform: rotate(37deg);
            -ms-transform: rotate(37deg);
            transform: rotate(37deg);
        }

        .msg-body ul li.repaly p {
            color: #fff;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 400;
            padding: 15px;
            background: #4b7bec;
            display: inline-block;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border-bottom-left-radius: 10px;
            margin-bottom: 0;
        }

        .msg-body ul li.repaly p b {
            display: block;
            color: #061061;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 500;
        }

        .msg-body ul li.repaly:after {
            display: block;
            content: "";
            clear: both;
        }

        .time {
            display: block;
            color: #000;
            font-size: 12px;
            line-height: 1.5;
            font-weight: 400;
        }

        li.repaly .time {
            margin-right: 20px;
        }

        .divider {
            position: relative;
            z-index: 1;
            text-align: center;
        }

        .msg-body h6 {
            text-align: center;
            font-weight: normal;
            font-size: 14px;
            line-height: 1.5;
            color: #222;
            background: #fff;
            display: inline-block;
            padding: 0 5px;
            margin-bottom: 0;
        }

        .divider:after {
            display: block;
            content: "";
            clear: both;
            position: absolute;
            top: 12px;
            left: 0;
            border-top: 1px solid #ebebeb;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .send-box {
            padding: 15px;
            border-top: 1px solid #ccc;
        }

        .send-box form {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .send-box .form-control {
            display: block;
            width: 85%;
            padding: 0.375rem 0.75rem;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            color: #222;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ccc;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .send-box button {
            border: none;
            background: #3867d6;
            padding: 0.375rem 5px;
            color: #fff;
            border-radius: 0.25rem;
            font-size: 14px;
            font-weight: 400;
            width: 24%;
            margin-left: 1%;
        }

        .send-box button i {
            margin-right: 5px;
        }

        .send-btns .button-wrapper {
            position: relative;
            width: 125px;
            height: auto;
            text-align: left;
            margin: 0 auto;
            display: block;
            background: #f6f7fa;
            border-radius: 3px;
            padding: 5px 15px;
            float: left;
            margin-right: 5px;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .send-btns .button-wrapper span.label {
            position: relative;
            z-index: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            cursor: pointer;
            color: #343945;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 13px;
        }

        #upload {
            display: inline-block;
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .send-btns .attach .form-control {
            display: inline-block;
            width: 120px;
            height: auto;
            padding: 5px 8px;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.5;
            color: #343945;
            background-color: #f6f7fa;
            background-clip: padding-box;
            border: 1px solid #f6f7fa;
            border-radius: 3px;
            margin-bottom: 5px;
        }

        .send-btns .button-wrapper span.label img {
            margin-right: 5px;
        }

        /* .button-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            text-align: center;
            margin: 0 auto;
        }

        button:focus {
            outline: 0;
        } */



        /* Abhay */
        .logo {
            font-size: 5rem;
        }

        .icon {
            width: 100px;
            /* Adjust the width as needed */
            height: auto;
            /* Maintain aspect ratio */
        }

        table {
            width: 100%;
        }

        .tabelcontent {
            width: 60rem;
        }

        #summernote {
            width: 100%;
        }

        .box .card {
            width: 100% !important;
            height: 30rem;
        }


        #about {
            height: 20rem;
        }

        #infotable {
            position: relative;
            top: -10rem;
        }

        #setofbutton {
            position: relative;
            right: -122%;
            top: -330%;
            background-color: white;
            border-radius: 25px;
            border: solid 0.5px #b3adad;
            width: 80%;
        }

        .custom-button-container button {
            text-transform: capitalize;
        }

        .modal-content {
            width: 80%;
            position: relative;
            top: 40%;
            right: -18%;
        }

        .graphics_section {

            position: absolute;
            top: 100%;
            border: solid 1px #b3adad;
        }

        .graphics_section .uploaded-image {
            width: fit-content;
            height: 50vh;

        }
        .closebtn{
            float: right;
            background-color: #3867d6;
            width: 5%;
            height: 35%;
        }
    </style>
</head>

<body>


    <div class="container-fluid ">

        <div class="row">
            <div class="col-md-12 border-bottom">
                <h1 class="mx-5 my-2">Update Task</h1>
                <a href="<?php echo base_url().'index.php/Head_SMM/Head_Smm_dashboardControll/viewDashboard'?>">
                <button class="closebtn">close</button></a>
            </div>
        </div>
        <?php $tid = $this->uri->segment(4);
        ?>



        <div class="row ">
            <div class="col-md-7 d-flex justify-content-center">
                <div class="content border p-3 my-5" id="about">
                    <div class="logo d-flex mt-5 align-item-center justify-content-center ">
                        <!-- <i class='bx bxs-user-circle' style='color:#b3adad'></i> -->

                        <?php if (!empty($addnewclient1)) {
                                    foreach ($addnewclient1 as $userData) {
                                        if ($userData['id'] === $receiveddata[0]->Client_id) { ?>

                                        <tr>
                                            <td> <img src="<?php echo base_url()?>Image/PackageServies/<?php echo $userData['image']; ?>"  style="height: 80px; width: 120px; border-radius: 50px; " ><br>
                                            <td>
                                        </tr>

                            <?php }
                                    }
                                } ?>


                    </div>


                    <div class="text-center mt-2">
                        <?php if (!empty($receiveddata)) : ?>
                            <input type="hidden" name="client_id" value="<?php echo $receiveddata[0]->Client_id; ?>">
                        <?php else : ?>
                            <p>Unauthorized</p>
                        <?php endif; ?>


                        <h4> <?php if (!empty($addnewclient1)) {
                                    foreach ($addnewclient1 as $userData) {
                                        if ($userData['id'] === $receiveddata[0]->Client_id) { ?>

                                        <tr>
                                            <td><?php echo  $userData['brand_name'] ?><br>
                                            <td>
                                            <td> <?php echo $tid ?>
                                            <td>

                                        </tr>

                            <?php }
                                    }
                                } ?>
                        </h4>
                    </div>
                    <div class="action mt-4">
                        <!-- start -->

                        <button class="btn btn-danger">54 Questions</button>
                        <button class="btn btn-danger">TG form</button>
                        <button class="btn btn-danger">CVP Form</button>
                        <button class="btn btn-danger">Pain Point</button>
                        <button class="btn btn-danger">Requirement</button>
                        <button class="btn btn-danger">Language</button>
                        <button class="btn btn-danger">Offers</button>
                        <button class="btn btn-danger">Digital File</button>
                        <button class="btn btn-danger">Ticket History</button>

                        <!-- end -->
                    </div>

                </div>

            </div>
            <div class="col-md-5">
                <div class="box-below-edito content border p-3 my-5" id="notepadpanel">
                    <!-- Box 1 -->
                    <div class="box">
                        <textarea id="summernote" name="editor_content"><?php echo $receiveddata[0]->editor_content ?>
                    </textarea>
                    </div>
                </div>

            </div>


        </div>

        <form id="myForm" method="post" action="<?php echo base_url('index.php/Head_SMM/Head_Smm_dashboardControll/updateSmmTask/') . $receiveddata[0]->id; ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-7  d-flex justify-content-center">
                    <div class="content border tabelcontent p-3 my-5" id="infotable">

                        <table class="table">
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td><?php if (!empty($receiveddata)) {
                                        echo $receiveddata[0]->deadline_datetime;
                                    } else {
                                        echo "unauthorized";
                                    } ?></td>
                            </tr>
                            <tr>
                                <td><strong>Festival:</strong></td>
                                <td>Value</td>
                            </tr>
                            <tr>
                                <td><strong>Technique:</strong></td>
                                <td>Value</td>
                            </tr>
                            <tr>
                                <td><strong>Task Details:</strong></td>
                                <td><?php if (!empty($receiveddata)) {
                                        echo $receiveddata[0]->task_name;
                                    } else {
                                        echo "unauthorized";
                                    } ?></td>
                            </tr>
                            <tr>
                                <td><strong>Festival Name:</strong></td>
                                <td>Value</td>
                            </tr>
                            <tr>
                                <td><strong>Date:</strong></td>
                                <td>Value</td>
                            </tr>
                        </table>

                        <!-- Your content goes here -->


                    </div>
                </div>

                <div class="col-md-6">
                    <div id="setofbutton">
                        <?php $tid = $this->uri->segment(4);
                        ?>


                        <input type="hidden" name="cr_Status" id="cr_Status">
                        <input type="hidden" name="gr_Status" id="gr_Status">
                        <input type="hidden" name="smm_Status" id="smm_Status">
                        <input type="hidden" name="editor_content" id="newsummernote">
                        <input type="hidden" name="tid" value="<?php echo $tid ?>">

                        <div class="custom-button-container d-flex justify-content-center py-5">

                            <button class="custom-button" style="background-color: palevioletred;" onclick="submitSmmChanges(2, '<?php $tid ?>')">Submit</button>
                            <button class="custom-button" style="background-color: yellowgreen;" onclick="submitSmmChanges(4, '<?php $tid ?>')">System</button>
                            <button class="custom-button" style="background-color: indianred;" onclick="submitSmmChanges(6, '<?php $tid ?>>')">Manual</button>
                            <button class="custom-button" style="background-color: green;" onclick="submitSmmChanges(7, '<?php $tid ?>')">Send To Client</button>
                            <button class="custom-button" style="background-color: pink;" onclick="submitGrChanges(1, '<?php $tid ?>')">Send To GR </button>
                            <button class="custom-button" style="background-color: yellow;" onclick="submitCrChanges(1, '<?php $tid ?>')">CR_Changes</button>

                        </div>

                    </div>
                </div>


            </div>

            <div class="row  justify-content-end">
                <div class="col-md-5 graphics_section mx-3">
                    <div class="mb-3 image-upload p-3 ">
                        <label for="image" class="form-label">Uploaded file</label>
                        <div class="input-group">

                            <input type="hidden" name="originalImageData" id="originalImageData" value="<?= $receiveddata[0]->imageData ?? '' ?>">

                            <input type="file" name="imageData" id="formFile" value="<?php echo $receiveddata[0]->imageData  ?>">

                            <img class="uploaded-image  mt-2" src="<?php echo base_url(); ?>Graphics_Image/<?php echo $receiveddata[0]->imageData  ?>" id="uploaded-image" style="display:block;" alt="Uploaded Image">



                        </div>

                    </div>

                </div>





            </div>
        </form>

        <div class="row justify-content-end">
            <div class="col-md-6 ">
                <div class="modal-content">
                    <div class="msg-head">
                        <div class="row">
                            <div class="col-8">
                                <div class="d-flex align-items-center">
                                    <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                    <div class="flex-shrink-0">
                                        <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h3>Adhub</h3>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <ul class="moreoption">
                                    <li class="navbar nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="msg-body">
                            <ul>
                                <li class="sender">
                                    <p> Hey, Are you there? </p>
                                    <span class="time">10:06 am</span>
                                </li>
                                <li class="sender">
                                    <p> Hey, Are you there? </p>
                                    <span class="time">10:16 am</span>
                                </li>
                                <li class="repaly">
                                    <p>yes!</p>
                                    <span class="time">10:20 am</span>
                                </li>
                                <li class="sender">
                                    <p> Hey, Are you there? </p>
                                    <span class="time">10:26 am</span>
                                </li>
                                <li class="sender">
                                    <p> Hey, Are you there? </p>
                                    <span class="time">10:32 am</span>
                                </li>
                                <li class="repaly">
                                    <p>How are you?</p>
                                    <span class="time">10:35 am</span>
                                </li>
                                <li>
                                    <div class="divider">
                                        <h6>Today</h6>
                                    </div>
                                </li>

                                <li class="repaly">
                                    <p> yes, tell me</p>
                                    <span class="time">10:36 am</span>
                                </li>
                                <li class="repaly">
                                    <p>yes... on it</p>
                                    <span class="time">junt now</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="send-box">
                        <form action="">
                            <input type="text" class="form-control" aria-label="message…" placeholder="Write message…">

                            <button type="button"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                        </form>

                        <div class="send-btns">
                            <div class="attach">
                                <div class="button-wrapper">
                                    <span class="label">
                                        <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title"> attached file
                                    </span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



    </div>

    <script>
        var myForm = document.getElementById('myForm');

        // Add a submit event listener to the form
        myForm.addEventListener('submit', function(event) {
            // Update the value of 'editor_content' with the value of 'editor_content1'
            document.getElementById('newsummernote').value = document.getElementById('summernote').value;

            // document.getElementById('cr_Status').value = cr_Status;
        });


        $(document).ready(function() {
            $('textarea#summernote').summernote({
                placeholder: 'Content',
                tabsize: 2,
                height: 200,
                width: 500, // Fixed a typo here
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
            });
        });




        window.onload = function() {


            const textarea = document.querySelector('.note-codable');

            // Add the 'readonly' attribute to the textarea
            textarea.setAttribute('readonly', 'true');

        };


        function submitCrChanges(cr_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('cr_Status').value = cr_Status;
            document.getElementById('tid').value = tid;

            // Submit the form
            myForm.submit();
        }

        function submitGrChanges(gr_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('gr_Status').value = gr_Status;
            document.getElementById('tid').value = tid;

            // Submit the form
            myForm.submit();
        }


        function submitSmmChanges(smm_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('smm_Status').value = smm_Status;
            document.getElementById('tid').value = tid;

            // Submit the form
            document.getElementById('myForm').submit();
        }
    </script>




    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Your JavaScript code here Graphic

        document.getElementById('formFile').addEventListener('change', function() {
            var reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('uploaded-image').setAttribute('src', e.target.result);
                document.getElementById('uploaded-image').style.display = 'block'; // Show the uploaded image

            };

            reader.readAsDataURL(this.files[0]);
        });


        // Add event listener to file input
        document.getElementById('image').addEventListener('change', displaySelectedImage);


        // Function to submit form data
        function submitForm() {
            const originalImageData = document.getElementById('originalImageData').value;
            const imageData = document.getElementById('image').files[0];

            // If no new image is selected, use the original image path
            if (!imageData) {
                document.getElementById('imageData').value = originalImageData;
            }

            // Submit the form
            document.getElementById('yourFormId').submit();

        }
        // Read and set the image source dynamically
        <?php if (!empty($receiveddata) && !empty($receiveddata[0]->imageData)) : ?>
            var imageData = "<?php echo base_url('Graphics_Image/' . $receiveddata[0]->imageData); ?>";
            document.getElementById('uploaded-image').src = imageData;
        <?php endif; ?>



        function submitSmmChanges(smm_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('smm_Status').value = smm_Status;
            document.getElementById('tid').value = tid;

            // Submit the form
            document.getElementById('myForm').submit();
        }



        $(document).ready(function() {
            $('textarea#summernote').summernote({
                placeholder: 'Content',
                tabsize: 2,
                height: 200,
                width: 500, // Fixed a typo here
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                ],
                d: true // Set readOnly option to true
            });
        });
    </script>
</body>

</html>