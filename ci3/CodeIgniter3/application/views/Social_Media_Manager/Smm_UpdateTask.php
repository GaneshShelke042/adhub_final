<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link tag of Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- for input  -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <!-- for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap');

    body {
        background-color: #e2dfdf;
        font-family: "Noto Sans", sans-serif;
    }

    #first-row {
        border-bottom: 1px solid black;
    }


    @media (max-width: 768px) {
        #headingrow div {
            max-width: fit-content;
        }


    }

    @media (max-width: 360px) {
        #headingrow div {
            max-width: fit-content;
        }

    }

    /* imageofuser */
    #imageofuser {
        width: 70px;
        border-radius: 50px;
        height: 70px;
        object-fit: cover;
    }

    #controlpanel {
        background-color: #fff;
        border-radius: 12px;
        width: 100%;
    }

    #second-row {
        justify-content: space-around;
    }

    .buttons {
        display: flex;
        flex-wrap: wrap;
    }

    .buttons button {
        font-size: small;
    }

    .underflex {
        width: 800px;
        height: 100vh;
        overflow-y: scroll;
    }

    @media (max-width: 1632px) {
        .underflex {
            width: 697px;
        }
    }

    @media (max-width: 1426px) {
        .underflex {
            width: 650px;
        }
    }

    @media (max-width: 1331px) {
        .underflex {
            width: 612px;
        }
    }

    @media (max-width: 1266px) {
        .underflex {
            width: 589px;
        }

        #second-row {
            justify-content: space-between;
        }
    }

    @media (max-width: 1210px) {
        .underflex {
            width: 532px;
        }

        #second-row {
            justify-content: space-around;
        }
    }

    #summernote {
        width: 100%;
    }

    #controlpaneloftext {
        background-color: #fff;
        border-radius: 12px;
        width: 100%;
    }

    .note-editable {
        min-height: 50vh;
        height: max-content !important;
    }

    @media (max-width: 1096px) {
        .underflex {
            width: 500px;
        }

        #second-row {
            justify-content: space-between;
        }
    }

    @media (max-width: 1032px) {
        .underflex {
            width: 475px;
        }

    }

    @media (max-width: 982px) {
        .underflex {
            width: 450px;
        }

    }

    @media (max-width: 932px) {
        .underflex {
            width: 425px;
        }

        #second-row {
            justify-content: space-around;
        }

    }

    @media (max-width: 882px) {
        .underflex {
            width: 395px;
        }

        #second-row {
            justify-content: space-around;
        }

    }

    @media (max-width: 822px) {
        .underflex {
            width: 350px;
        }

        #second-row {
            justify-content: space-around;
        }

    }

    @media (max-width: 732px) {
        .underflex {
            width: 700px;
            height: auto;
            overflow-y: unset;
        }
    }

    #oldcontent {
        width: 100%;
        min-height: 50vh;
        height: max-content !important;
    }






    .send-btns .button-wrapper {
        position: relative;
        width: 165px;
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

    .send-btns .button-wrapper span.label img {
        margin-right: 5px;
    }

    /* team chat */
    .msg-body {
        height: 30rem;
        overflow-y: scroll;
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

    .msg-body ul li.repaly {
        display: block;
        width: 100%;
        text-align: right;
        position: relative;
    }



    .msg-body ul li.repaly p {
        color: #fff;
        font-size: 14px;
        line-height: 1.5;
        font-weight: 400;
        padding: 15px;
        background: #4b7bec;
        display: inline-block;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        border-top-left-radius: 10px;
        margin-bottom: 0;
    }




    .time {
        display: block;
        color: #000;
        font-size: 12px;
        line-height: 1.5;
        font-weight: 400;
    }

    .role {
        display: table-header-group;
        color: green;
        font-size: 14px;
        font-weight: 700;
        line-height: 1.5;
        width: fit-content;
    }

    .imgessmm button {
        width: 200px;
    }

    .imgessmm button img {
        object-fit: contain;
        width: 70%;
    }

    #iamgeview {
        width: 100%;
    }

    .carousel-control-next,
    .carousel-control-prev {
        width: 8%;
        height: 80%;
        margin-top: 78px;
    }

    .carousel-inner img {
        object-fit: contain;
        height: 75%;
    }

    .carousel-item {
        height: 75%;
    }

    #imageviewcontent {
        background-color: aliceblue;
    }

    .carousel-inner .active {
        overflow: hidden;
        height: 100%;
    }

    #buttonsss {
        width: 100%;
        flex-wrap: wrap;
    }

    .acceptticket {
        width: 75%;
    }

    @media (max-width: 1024px) {
        .acceptticket {
            width: 85%;

        }
    }
</style>

<body>
    <div class="container-fluid px-3 mb-2 " id="first-row">
        <div class="row justify-content-between p-2" id='headingrow'>
            <div class="col-sm-5 p-2">
                <h3>Update Task</h3>
            </div>
            <div class="col-sm-2 p-2 text-end">
                <a class="btn btn-primary  p-2" href="<?php echo base_url() . 'index.php/SMM/Smm_dashboardControll/viewDashboard' ?>">Close</a>
            </div>

        </div>

    </div>



    <?php
    if (!empty($receiveddata)) {
        foreach ($receiveddata as $userData) {
            if ($userData->Smm_ticketValue == 0) { ?>

                <form method="post" action="<?php echo base_url('index.php/SMM/Smm_dashboardControll/acceptTicket'); ?>">
                    <!-- accept ticket  -->
                    <div class="container-fluid">

                        <div class="row  justify-content-center" id="accept-row">
                            <div class="d-flex mt-5 mx-2  flex-column acceptticket">

                                <div class="col-md-8  p-3" id="controlpanel">
                                    <div class="imageofuser text-center ">
                                        <?php if (!empty($addnewclient1)) {
                                            foreach ($addnewclient1 as $userData) {
                                                if ($userData['id'] === $receiveddata[0]->Client_id) { ?>
                                                    <img src="<?php echo base_url() ?>Image/PackageServies/<?php echo $userData['image']; ?>" alt="" class="mt-2" id="imageofuser">
                                                    <h4 class="mt-3"><?php echo  $userData['brand_name'] ?></h4>

                                        <?php }
                                            }
                                        } ?>
                                    </div>
                                    <div class="buttons justify-content-center">
                                        <?php
                                        $id_from_url = $this->session->userdata('user_id');
                                        $tid = $this->uri->segment(4);
                                        // Assuming $urlId contains the URL ID value
                                        ?>
                                        <input type="hidden" id="ticketValue" name="Smm_ticketValue" value="<?= $id_from_url; ?>">
                                        <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                                        <button type="submit" class="btn btn-success m-1" id="accept_tickett"> Accept Ticket</button>
                                    </div>
                                    <div class="buttons justify-content-center">
                                        <button class="btn btn-danger m-1">54 Questions</button>
                                        <button class="btn btn-danger m-1">TG Form</button>
                                        <button class="btn btn-danger m-1">CVP Form</button>
                                        <button class="btn btn-danger m-1">Pain Point</button>
                                        <button class="btn btn-danger m-1">Requirement</button>
                                        <button class="btn btn-danger m-1">Language</button>
                                        <button class="btn btn-danger m-1">Offer</button>
                                        <button class="btn btn-danger m-1">Digital File</button>
                                        <button class="btn btn-danger m-1">Ticket History</button>
                                        <button class="btn btn-danger m-1">Old Ticket</button>
                                    </div>
                                </div>
                                <div class="col-md-8 my-5 p-2" id="controlpanel">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Date</th>
                                                <td><?php if (!empty($receiveddata)) {
                                                        echo $receiveddata[0]->deadline_datetime;
                                                    } else {
                                                        echo "unauthorized";
                                                    } ?></td>
                                            </tr>
                                            <tr>
                                                <th>Festival:</th>
                                                <td>value</td>
                                            </tr>
                                            <tr>
                                                <th>Technique:</th>
                                                <td>value</td>
                                            </tr>
                                            <tr>
                                                <th>Task Details:</th>
                                                <td><?php if (!empty($receiveddata)) {
                                                        echo $receiveddata[0]->task_name;
                                                    } else {
                                                        echo "unauthorized";
                                                    } ?></td>
                                            </tr>

                                            <tr>
                                                <th>Status</th>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th>Content Cost (&#8377)</th>
                                                <td>value</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <div class="container-fluid">

                    <div class="row flex-row " id="second-row">
                        <div class="d-flex mt-5 mx-2  flex-column underflex">

                            <div class="col-md-8  p-3" id="controlpanel">
                                <div class="imageofuser text-center ">
                                    <?php if (!empty($addnewclient1)) {
                                        foreach ($addnewclient1 as $userData) {
                                            if ($userData['id'] === $receiveddata[0]->Client_id) { ?>

                                                <img src="<?php echo base_url() ?>Image/PackageServies/<?php echo $userData['image']; ?>" alt="" class="mt-2" id="imageofuser">
                                                <h4 class="mt-3"><?php echo  $userData['brand_name'] ?></h4>
                                    <?php }
                                        }
                                    } ?>
                                </div>
                                <div class="buttons justify-content-center">
                                    <button class="btn btn-danger m-1">54 Questions</button>
                                    <button class="btn btn-danger m-1">TG Form</button>
                                    <button class="btn btn-danger m-1">CVP Form</button>
                                    <button class="btn btn-danger m-1">Pain Point</button>
                                    <button class="btn btn-danger m-1">Requirement</button>
                                    <button class="btn btn-danger m-1">Language</button>
                                    <button class="btn btn-danger m-1">Offer</button>
                                    <button class="btn btn-danger m-1">Digital File</button>
                                    <button class="btn btn-danger m-1">Ticket History</button>
                                    <button class="btn btn-danger m-1">Old Ticket</button>
                                </div>
                            </div>


                            <div class="col-md-8  mt-5 p-2" id="controlpanel">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Date</th>
                                            <td><?php if (!empty($receiveddata)) {
                                                    echo $receiveddata[0]->deadline_datetime;
                                                } else {
                                                    echo "unauthorized";
                                                } ?></td>
                                        </tr>
                                        <tr>
                                            <th>Festival:</th>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <th>Technique:</th>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <th>Task Details:</th>
                                            <td><?php if (!empty($receiveddata)) {
                                                    echo $receiveddata[0]->task_name;
                                                } else {
                                                    echo "unauthorized";
                                                } ?></td>
                                        </tr>

                                        <tr>
                                            <th>Status</th>
                                            <td>value</td>
                                        </tr>
                                        <tr>
                                            <th>Payout (&#8377)</th>
                                            <td>value</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="col-md-8  mt-5 p-2" id="controlpanel">
                                <textarea name="oldcontent" id="oldcontent"></textarea>
                            </div>


                        </div>
                        <div class="d-flex mt-5 mx-2  flex-column underflex">

                            <div class="col-md-8  " id="controlpaneloftext">
                                <div id="summernote"></div>
                            </div>


                            <div class="col-md-8  my-5" id="controlpaneloftext">

                                <div class="row justify-content-center imgessmm">
                                    <?php if (!empty($receiveddata[0]->imageData)) {  ?>
                                        <button class="btn btn-dark p-2 m-2" data-bs-toggle="modal" data-bs-target="#iamgeview"><img src="<?php echo base_url() . 'Graphics_Image/' . $receiveddata[0]->imageData ?>" alt="" class="m-2  viewimage" data-value='0'></button>
                                    <?php } ?>
                                    <!-- <button class="btn btn-dark p-2 m-2" data-bs-toggle="modal" data-bs-target="#iamgeview"><img src="img-2.jpeg" alt="" class="m-2  viewimage" data-value='1'></button> -->

                                </div>
                            </div>

                            <div class="col-md-8  mb-5" id="controlpaneloftext">
                                <div class="border-bottom p-2">
                                    <h5 class="ms-5">Schedule</h5>
                                </div>
                                <div class="m-2">
                                    <h5 class="ms-5">Social media <span style="color:red;">*</span></h5>
                                    <div class="ms-5">
                                        <button type="button" id="Facebook" class="btn btn-outline-primary">Facebook</button>
                                        <button type="button" id="Instagram" class="btn btn-outline-primary">Instagram</button>
                                    </div>

                                </div>
                                <div class="border-top mb-2">

                                    <form id="myForm" method="post" action="<?php echo base_url('index.php/SMM/Smm_dashboardControll/updateSmmTask/') . $receiveddata[0]->id; ?>" enctype="multipart/form-data">
                                        <?php $tid = $this->uri->segment(4);
                                        ?>


                                        <input type="hidden" name="cr_Status" id="cr_Status">
                                        <input type="hidden" name="gr_Status" id="gr_Status">
                                        <input type="hidden" name="smm_Status" id="smm_Status">
                                        <input type="hidden" name="editor_content" id="newsummernote">
                                        <input type="hidden" name="tid" value="<?php echo $tid ?>">

                                        <div class="d-flex p-3 justify-content-end" id="buttonsss">
                                            <button class="btn btn-success m-2 " onclick="submitSmmChanges(7, '<?= $tid ?>')">Send to Client</button>
                                            <button class="btn btn-success m-2 " onclick="submitSmmChanges(8,'<?= $tid ?>')">Changes</button>
                                            <button class="btn btn-success m-2 " onclick="submitSmmChanges(6, '<?= $tid ?>>')">Manual</button>
                                            <button class="btn btn-success m-2 " onclick="submitSmmChanges(4, '<?= $tid ?>')">System</button>
                                        </div>
                                    </form>

                                </div>

                            </div>

                            <div class="col-md-8  mb-5" id="controlpaneloftext">
                                <div class="p-2  border-bottom">
                                    <h4 class="ms-2">Team Chat Box</h4>
                                </div>
                                <div class="p-2 msg-body">
                                    <ul id="msgbodychat">


                                        <?php
                                        $usersid =  $this->session->userdata('user_id');

                                        if (!empty($chat)) {


                                            foreach ($chat as $key) {    ?>
                                                <?php if ($key['userid'] == $usersid) { ?>
                                                    <li class="repaly">
                                                        <p><?php echo $key['message'] ?></p>
                                                        <span class="time"><?php echo $key['time'] ?></span>
                                                    </li>
                                                <?php } else { ?>
                                                    <li class="sender">
                                                        <p><span class="role"><?php echo $key['role'] ?></span>
                                                            <?php echo $key['message'] ?></p>
                                                        <span class="time"><?php echo $key['time'] ?></span>

                                                    </li>
                                        <?php }
                                            }
                                        } ?>




                                        <!-- <li class="sender">

                                <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                           </li>
                            <li class="repaly">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="sender">

                                <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="repaly">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="sender">

                                <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="repaly">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="sender">

                                <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="repaly">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="sender">

                                <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                            </li>
                            <li class="repaly">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                            </li> -->

                                    </ul>
                                </div>
                                <div class="pb-4">
                                    <div class="chatsend border-top p-1 pb-4 m-2">
                                        <div class="input-group mb-2 ">
                                            <input type="text" class="form-control " id='textmessage' placeholder="Enter Your message here ! . .">
                                            <span class="input-group-text btn btn-dark border" id="sendmessage"><i class='bx bxs-send'></i></span>
                                        </div>
                                        <!-- <div class="send-btns">
                                            <div class="attach">
                                                <div class="button-wrapper">
                                                    <span class="label">
                                                        <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title"> attached file
                                                    </span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File" onchange="updateFileName(this)">
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
    <?php }
        }
    } ?>

    <!-- Modal -->
    <div class="modal fade" id="iamgeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" id="imageviewcontent">

                <div class="modal-body">

                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">

                        </div>
                        <div class="carousel-inner">

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- script tag of Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                // placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            $('#summernote').summernote('disable');
            let receivedData = <?php echo json_encode($receiveddata); ?>;
            if (receivedData && receivedData.length > 0) {
                let editorContent = receivedData[0].editor_content;
                if (editorContent) {
                    $('.note-editable').html(editorContent);
                }
            }
        });


        // smm method


        function submitSmmChanges(smm_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('smm_Status').value = smm_Status;
            document.getElementById('tid').value = tid;

            // Submit the form
            document.getElementById('myForm').submit();
        }

        //   Graphics 
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('viewimage')) {
                    slider(event.target.getAttribute('data-value'))
                }
            });
        })

        function slider(selectedid) {

            console.log('check')
            console.log(selectedid)

            let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
            carouselindicators.innerHTML = "";
            let carouselinner = document.getElementsByClassName('carousel-inner')[0];

            carouselinner.style.height = '80vh'
            carouselinner.innerHTML = "";
            console.log(carouselindicators);
            console.log(carouselinner);

            let dynamicimages = document.getElementsByClassName('viewimage');
            Array.from(dynamicimages).forEach((ele, index) => {
                let datavalue = ele.getAttribute('data-value')
                //  lets create the button of slider 
                let btn = document.createElement('button');
                // lets create the div  for "carousel-item
                let div = document.createElement('div');
                // now we create image tag for append it with div
                let im = document.createElement('img');

                btn.setAttribute('data-bs-target', '#carouselExampleIndicators')
                btn.setAttribute('data-bs-slide-to', datavalue)
                im.src = ele.src;
                im.classList.add('d-block')
                im.classList.add('w-100', 'p-2')
                im.setAttribute('id', 'imagezoom');
                div.classList.add('carousel-item'); // add carousel class

                if (selectedid == datavalue) {
                    console.log(datavalue)
                    btn.classList.add('active');
                    btn.setAttribute('aria-current', 'true');
                    div.classList.add('active'); // add active class of selected image 

                }

                let innerimgdiv = document.createElement('div');
                innerimgdiv.classList.add('row', 'p-3', 'justify-content-between', 'border-bottom', 'mb-5');

                let a = document.createElement('a');
                a.classList.add('btn', 'btn-outline-success');
                a.style.width = 'fit-content';
                a.innerHTML = '<i class="bx bxs-download"></i>';
                a.href = ele.src;
                a.download = ele.name;


                let bt = document.createElement('button');
                bt.classList.add('btn', 'mt-2', 'mx-3', 'p-2', 'btn-warning');
                bt.innerHTML = `<i class='bx bx-x'></i>`;
                bt.setAttribute('data-bs-dismiss', 'modal')
                bt.style.width = 'fit-content';

                innerimgdiv.appendChild(a);
                innerimgdiv.appendChild(bt);





                btn.setAttribute('aria-label', 'Slide ' + datavalue);
                console.log(btn);
                carouselindicators.appendChild(btn);
                div.appendChild(innerimgdiv);
                div.appendChild(im);
                carouselinner.appendChild(div);

                const container = div; // Get the container of each image
                const img = im; // Get the image
                container.addEventListener("mousemove", (e) => {
                    const x = e.clientX - e.target.offsetLeft;
                    const y = e.clientY - e.target.offsetTop;
                    img.style.transformOrigin = `${x}px ${y}px`;
                    img.style.transform = "scale(2)";
                });
                container.addEventListener("mouseleave", () => {
                    img.style.transformOrigin = `center`;
                    img.style.transform = "scale(1)";
                });



            });



        }

        let Facebook = document.getElementById('Facebook');
        let Instagram = document.getElementById('Instagram');
        Facebook.addEventListener('click', function() {
            // Toggle the class between btn-outline-primary and btn-primary
            Facebook.classList.toggle('btn-outline-primary');
            Facebook.classList.toggle('btn-primary');
        });
        Instagram.addEventListener('click', function() {
            // Toggle the class between btn-outline-primary and btn-primary
            Instagram.classList.toggle('btn-outline-primary');
            Instagram.classList.toggle('btn-primary');
        });

        var myForm = document.getElementById('myForm');


        myForm.addEventListener('submit', function(event) {
            // // Update the value of 'editor_content' with the value of 'editor_content1'
            // document.getElementById('newsummernote').value = document.getElementById('summernote').value;
            document.getElementById('newsummernote').value = document.getElementsByClassName('note-editable')[0].innerHTML;
            console.log('ok');
            // event.preventDefault();
        });

        // for Team Chat 
        var sendmessage = document.getElementById('sendmessage');
        var textmessage = document.getElementById('textmessage');
        var msgbodychat = document.getElementById('msgbodychat');


        sendmessage.addEventListener('click', function() {
            console.log(textmessage.value);
            <?php $username =    $this->session->userdata('name'); ?>;
            <?php $userid =    $this->session->userdata('user_id'); ?>;
            <?php $tid =    $this->uri->segment(4); ?>;
            console.log('<?= $username ?>');
            console.log(<?= $userid ?>);
            console.log(<?= $tid ?>);

            const now = new Date();
            const hours = now.getHours(); // Convert to string and pad with zero if needed
            const minutes = now.getMinutes(); // Convert to string and pad with zero if needed
            const day = now.getDate(); // Convert to string and pad with zero if needed
            const month = now.getMonth(); // Convert to string and pad with zero if needed
            const year = now.getFullYear(); // Convert to string and pad with zero if needed
            const currentTime = day + ' : ' + (month + 1) + ' : ' + year + ' :' + hours + ':' + minutes;
            console.log(currentTime);

            const url = `<?= base_url() ?>index.php/teamchat/add`;

            let formdata = new FormData();
            formdata.append('userid', <?= $userid ?>)
            formdata.append('username', '<?= $username ?>')
            formdata.append('ticketid', <?= $tid ?>)
            formdata.append('message', textmessage.value)
            formdata.append('time', currentTime)
            if (textmessage.value == '') {
                alert('please enter the message ')
            } else {
                fetch(url, {
                        method: 'POST',
                        body: formdata
                    }).then(response => {
                        // Check if the response is successful
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        // Parse the JSON response
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        let li = document.createElement('li');
                        let p = document.createElement('p');
                        let span = document.createElement('span');
                        p.innerText = data.message;
                        span.innerText = data.time;
                        span.classList.add('time');
                        li.classList.add('repaly');
                        li.appendChild(p);
                        li.appendChild(span);
                        msgbodychat.appendChild(li);
                    }).catch(error => {
                        // Handle errors
                        console.error('There was a problem with your fetch operation:', error);
                    });
            }
        });
    </script>





</body>

</html>