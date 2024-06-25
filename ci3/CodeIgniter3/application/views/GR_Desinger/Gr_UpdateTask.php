<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link tag of Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- for input  -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


    <!-- for icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- font awesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        width: 150px;
        border-radius: 50px;
        height: 150px;
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


    .drop-section {
        border: 2px dashed #ccc;
        padding: 20px;
        text-align: center;
        cursor: pointer;
    }

    .drop-section.highlight {
        border-color: #2185d0;
    }

    #fileInput,
    #fileInputPSD {
        display: none;
        /* Hide the file input element */
    }

    .media-preview,
    .media-history {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .media-preview img,
    .media-preview video,
    .media-history img,
    .media-history video {
        max-width: 450px;
        max-height: 350px;
    }

    .image-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }

    .image-preview img {
        max-width: 150px;
        max-height: 150px;
    }

    .acceptticket {
        width: 75%;
    }

    @media (max-width: 1024px) {
        .acceptticket {
            width: 85%;

        }
    }

    /*  for psd */
    #mediaPreviewPSD img {
        width: 150px;
        height: 150px;
    }

    #progressContainer {
        width: 100%;
        background-color: #f3f3f3;
        margin-top: 10px;
    }

    #progressBar {
        width: 0%;
        height: 30px;
        background-color: #4caf50;
        text-align: center;
        line-height: 30px;
        color: white;
    }

    /* for img zoom */

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

    .carousel-inner video {
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

    /* For Digital File */
    #digitalfile {
        display: none !important;
    }

    .b {
        width: 150px;
        height: 150px;
    }

    .imgfortbody {
        width: 150px;
        height: 150px;
        display: block;
        object-fit: cover;
    }

    #imageviewcontent {
        background-color: #000;
    }


    .videofortbody {
        height: 150px;
        width: 150px;
        object-fit: contain;
    }

    .imagecontainer {
        display: flex;
        flex-wrap: wrap;
    }

    #language {
        background-color: #fff;
        display: none !important;
    }

    #Question54 {
        background-color: #fff;
        display: none !important;
    }

    #painpoint {
        background-color: #fff;
        display: none !important;
    }

    #offer {
        background-color: #fff;
        display: none !important;
    }

    /* teamchat  */

    .msg-body ul li.repaly p img {
        width: 250px;
        height: 250px;
        object-fit: contain;
    }

    .msg-body ul li.sender p img {
        width: 250px;
        height: 250px;
        object-fit: contain;
    }

    #selectedImagediv {
        display: none;
    }

    #selectedImagediv img {
        display: none;
    }

    .time i {
        color: red;
        font-size: 18px;
        margin: 0 10px;
    }
</style>

<body>
    <div class="container-fluid px-3 mb-2 " id="first-row">
        <div class="row justify-content-between p-2" id='headingrow'>
            <div class="col-sm-5 p-2">
                <h3>Update Task</h3>
            </div>
            <div class="col-sm-2 p-2 text-end">
                <a class="btn btn-primary  p-2" href="<?php echo base_url() . 'index.php/GR_Desinger/Gr_dashboardControll/viewDashboard' ?>">Close</a>
            </div>

        </div>

    </div>


    <?php
    if (!empty($receiveddata)) {
        foreach ($receiveddata as $userData) {
            if ($userData->Gr_ticketValue == 0) { ?>

                <form method="post" action="<?php echo base_url('index.php/GR_Desinger/Gr_dashboardControll/acceptTicket'); ?>">
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
                                        <input type="hidden" id="ticketValue" name="Gr_ticketValue" value="<?= $id_from_url; ?>">
                                        <input type="hidden" name="tid" value="<?php echo $tid; ?>">
                                        <button type="submit" class="btn btn-success m-1" id="accept_tickett"> Accept
                                            Ticket</button>
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
                                                <th>Ticket Id :</th>
                                                <td><?php if (!empty($receiveddata)) {
                                                        echo $receiveddata[0]->id;
                                                    } else {
                                                        echo "unauthorized";
                                                    } ?></td>
                                            </tr>
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
                <!-- inner part ticket -->
                <div class="container-fluid">
                    <div class="row flex-row " id="second-row">

                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="base">

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
                                    <button class="btn btn-danger m-1" onclick="question54()">54 Questions</button>
                                    <button class="btn btn-danger m-1">TG Form</button>
                                    <button class="btn btn-danger m-1">CVP Form</button>
                                    <button class="btn btn-danger m-1" onclick="questionpainpoint()">Pain Point</button>
                                    <button class="btn btn-danger m-1">Requirement</button>
                                    <button class="btn btn-danger m-1" onclick="language()">Language</button>
                                    <button class="btn btn-danger m-1" onclick="questionoffer()">Offer</button>
                                    <button class="btn btn-danger m-1" onclick="digt(<?= $receiveddata[0]->Client_id; ?>)">Digital
                                        File</button>
                                    <button class="btn btn-danger m-1">Ticket History</button>
                                    <button class="btn btn-danger m-1">Old Ticket</button>
                                </div>
                            </div>


                            <div class="col-md-8  mt-5 p-2" id="controlpanel">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Ticket Id :</th>
                                            <td><?php if (!empty($receiveddata)) {
                                                    echo $receiveddata[0]->id;
                                                } else {
                                                    echo "unauthorized";
                                                } ?></td>
                                        </tr>
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
                                            <th>Design Cost (&#8377)</th>
                                            <td>0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <?php if ($receiveddata[0]->gr_Status == 4) {  ?>
                                <div class="col-md-8  mt-5 p-2" id="controlpanel">
                                    <div class="media-history" id="mediahistory">
                                        <?php if (!empty($receiveddata[0]->imageData)) {  ?>
                                            <img src="<?php echo base_url() . 'Graphics_Image/' . $receiveddata[0]->imageData ?>" alt="<?= $receiveddata[0]->imageData ?>">
                                        <?php }  ?>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <style>
                                    #oldcontent {
                                        display: none;
                                    }
                                </style>
                            <?php } ?>





                        </div>



                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="language">
                            <div class="row p-3 justify-content-between border-bottom mb-2" id="controlpanel">
                                <h4 style="width: fit-content;">Languages</h4>
                                <button class="btn btn-primary" style="width: fit-content; " onclick="closelang()"><i class="fa-solid fa-x"></i></button>
                            </div>
                            <div class="row" id="controlpanel">
                                <div class="col-12 mt-2">
                                    <table class="table">
                                        <thead class="border">
                                            <tr class="border">
                                                <th class="border">
                                                    Question
                                                </th>
                                                <th class="border">
                                                    Ans
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="border">
                                            <?php if (!empty($language)) {
                                                foreach ($language as $l) {
                                            ?>
                                                    <tr class="border">
                                                        <td class="border"><?= $l['question'] ?></td>
                                                        <td class="border"><?= $l['answer'] ?></td>
                                                    </tr>
                                            <?php

                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="Question54">
                            <div class="row p-3 justify-content-between border-bottom mb-2" id="controlpanel">
                                <h4 style="width: fit-content;">54 Question</h4>
                                <button class="btn btn-primary" style="width: fit-content; " onclick="close54()"><i class="fa-solid fa-x"></i></button>
                            </div>

                            <div class="row" id="controlpanel">
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr class="border">
                                                <th class="border">
                                                    Question
                                                </th>
                                                <th class="border">
                                                    Ans
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="border">
                                            <?php if (!empty($Question54)) {
                                                foreach ($Question54 as $l) {
                                            ?>
                                                    <tr class="border">
                                                        <td class="border"><?= $l['question'] ?></td>
                                                        <td class="border"><?= $l['answer'] ?></td>
                                                    </tr>
                                            <?php

                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                        </div>

                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="painpoint">
                            <div class="row p-3 justify-content-between border-bottom mb-2" id="controlpanel">
                                <h4 style="width: fit-content;">Pain Point</h4>
                                <button class="btn btn-primary" style="width: fit-content; " onclick="closepainpoint()"><i class="fa-solid fa-x"></i></button>
                            </div>
                            <div class="row" id="controlpanel">
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr class="border">
                                                <th class="border">
                                                    Question
                                                </th>
                                                <th class="border">
                                                    Ans
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="border">
                                            <?php if (!empty($painpoint)) {
                                                foreach ($painpoint as $l) {
                                            ?>
                                                    <tr class="border">
                                                        <td class="border"><?= $l['question'] ?></td>
                                                        <td class="border"><?= $l['answer'] ?></td>
                                                    </tr>
                                            <?php

                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>

                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="offer">
                            <div class="row p-3 justify-content-between border-bottom mb-2" id="controlpanel">
                                <h4 style="width: fit-content;">offer</h4>
                                <button class="btn btn-primary" style="width: fit-content; " onclick="closeoffer()"><i class="fa-solid fa-x"></i></button>
                            </div>
                            <div class="row" id="controlpanel">
                                <div class="col-12">
                                    <table class="table">
                                        <thead>
                                            <tr class="border">
                                                <th class="border">
                                                    Question
                                                </th>
                                                <th class="border">
                                                    Ans
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="border">
                                            <?php if (!empty($Offer)) {
                                                foreach ($Offer as $l) {
                                            ?>
                                                    <tr class="border">
                                                        <td class="border"><?= $l['question'] ?></td>
                                                        <td class="border"><?= $l['answer'] ?></td>
                                                    </tr>
                                            <?php

                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>


                        <div class="d-flex mt-5 mx-2  flex-column underflex" id="digitalfile">
                            <div class="col-md-8  p-3" id="controlpanel">
                                <div class="row justify-content-between px-3 border-bottom pb-2">
                                    <h5 style="width: fit-content;">Digital File</h5>
                                    <button class="btn btn-primary" style="width: fit-content;" id="digitalclose" onclick="cl()"><i class="fa-solid fa-xmark"></i></button>

                                </div>
                                <div class="row mt-2">
                                    <table class="table border">
                                        <thead>
                                            <tr>
                                                <th class="border" style="width: 25%;">Name</th>
                                                <th class="border">Files</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbodyfordigifile">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>



                        <div class="d-flex mt-5 mx-2  flex-column underflex">
                            <form id="myForm" method="post" action="<?php echo base_url('index.php/GR_Desinger/Gr_dashboardControll/updateGRTask/') . $receiveddata[0]->id; ?>" enctype="multipart/form-data">

                                <div class="col-md-8  " id="controlpaneloftext">
                                    <div id="summernote"></div>
                                </div>


                                <div class="col-md-8  my-5" id="controlpaneloftext">
                                    <div class="p-2 text-start border-bottom">
                                        <h5 class="ms-3">Upload File</h5>
                                    </div>

                                    <div class="drop-section" id="dropSection">
                                        <p>Click here to select images and videos</p>
                                    </div>
                                    <input type="file" id="fileInput" name="imageData" accept="image/*, video/*" multiple />
                                    <div class="media-preview" id="mediaPreview">
                                        <?php if (!empty($receiveddata[0]->imageData)) {  ?>

                                            <img src="<?php echo base_url() . 'Graphics_Image/' . $receiveddata[0]->imageData ?>" alt="<?= $receiveddata[0]->imageData ?>" class="viewimage" data-bs-toggle="modal" data-bs-target="#iamgeview">
                                        <?php }  ?>
                                    </div>

                                    <div class="p-2 text-start border-top">
                                        <?php $tid = $this->uri->segment(4);
                                        ?>
                                        <input type="hidden" name="cr_Status" id="cr_Status">
                                        <input type="hidden" name="gr_Status" id="gr_Status">
                                        <input type="hidden" name="smm_Status" id="smm_Status">
                                        <input type="hidden" name="editor_content" id="newsummernote">
                                        <input type="hidden" name="Gr_ticketValue" id="Gr_ticketValue" value="<?= $receiveddata[0]->Gr_ticketValue ?>">
                                        <input type="hidden" name="tid" id="tid" value="<?php echo $tid ?>">
                                        <input type="submit" class="btn btn-primary form-control" onclick="submitGrChanges(2,'<?php echo $tid ?>')">
                                    </div>

                                </div>
                            </form>

                            <form id="myForm1" method="post" action="<?php echo base_url('index.php/GR_Desinger/Gr_dashboardControll/updateGRTask/') . $receiveddata[0]->id; ?>" enctype="multipart/form-data">
                                <div class="col-md-8  mb-5" id="controlpaneloftext">
                                    <div class="p-2 text-start border-bottom">
                                        <h5 class="ms-3">Upload PSD File</h5>
                                    </div>

                                    <div class="drop-section" id="dropPSDSection">
                                        <p>Click here to select PSD</p>
                                    </div>
                                    <input type="file" id="fileInputPSD" name="psdfile" accept=".psd" multiple />
                                    <div class="media-preview" id="mediaPreviewPSD">
                                        <?php if (!empty($receiveddata[0]->psdfile)) { ?>

                                            <div class="media-container">
                                                <a href="<?= base_url() ?>psdFile_Graphics/<?= $receiveddata[0]->psdfile ?>" download="<?= $receiveddata[0]->psdfile ?>">
                                                    <img src="<?= base_url() ?>img/psd.png" alt='<?= $receiveddata[0]->psdfile ?>'>
                                                </a>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div id="progressContainer">
                                        <div id="progressBar"></div>
                                    </div>


                                    <div class="p-2 text-start border-top">
                                        <?php $tid = $this->uri->segment(4);
                                        ?>
                                        <input type="hidden" name="cr_Status" id="cr_Status1">
                                        <input type="hidden" name="gr_Status" id="gr_Status1">
                                        <input type="hidden" name="smm_Status" id="smm_Status1">
                                        <input type="hidden" name="editor_content" id="newsummernote1">
                                        <input type="hidden" name="Gr_ticketValue" id="Gr_ticketValue1" value="<?= $receiveddata[0]->Gr_ticketValue ?>">
                                        <input type="hidden" name="tid" id="tid1" value="<?php echo $tid ?>">
                                        <input type="submit" class="btn btn-primary form-control" onclick="submitGrChanges(2,'<?php echo $tid ?>')">
                                    </div>
                                </div>
                            </form>



                            <div class="col-md-8  mb-5" id="controlpaneloftext">
                                <div class="p-2  border-bottom">
                                    <h4 class="ms-2">Team Chat Box</h4>
                                </div>
                                <div class="p-2 msg-body">
                                    <ul id="msgbodychat">

                                        <?php
                                        $usersid =  $this->session->userdata('user_id');

                                        if (!empty($chat)) {
                                            foreach ($chat as $key) { ?>
                                                <?php if ($key['userid'] == $usersid) {
                                                    if (!empty($key['message'])) { ?>
                                                        <li class="repaly">
                                                            <p><?php echo $key['message'] ?></p>
                                                            <span class="time"><?php echo $key['time'] ?> <i class='bx bxs-trash-alt deletemessage' data-teamchat-id="<?= $key['id'] ?>"></i> </span>
                                                        </li>
                                                    <?php }
                                                    if (!empty($key['image'])) { ?>
                                                        <li class="repaly">
                                                            <p><img src="<?php echo base_url() ?>/teamchat/<?php echo $key['image'] ?>" alt="<?php echo $key['image'] ?>"></p>
                                                            <span class="time"><?php echo $key['time'] ?><i class='bx bxs-trash-alt deletemessage' data-teamchat-id="<?= $key['id'] ?>"></i> </span>
                                                        </li>
                                                    <?php }
                                                } else {
                                                    if (!empty($key['message'])) 
                                                    { ?>
                                                        <li class="sender">
                                                            <p><span class="role"><?php echo $key['role'] ?></span><?php echo $key['message'] ?></p>
                                                            <span class="time"><?php echo $key['time'] ?><span>
                                                        </li>
                                                    <?php }
                                                    if (!empty($key['image'])) { ?>
                                                        <li class="sender">
                                                            <p><span class="role"><?php echo $key['role'] ?></span>
                                                                <img src="<?php echo base_url() ?>/teamchat/<?php echo $key['image'] ?>" alt="<?php echo $key['image'] ?>">
                                                            </p>
                                                            <span class="time"><?php echo $key['time'] ?></span>
                                                        </li>
                                                <?php }
                                                } ?>
                                        <?php }
                                        }
                                        ?>

                                    </ul>


                                    <div id="selectedImagediv" class="d-flex justify-content-center">
                                        <img id="selectedImage" class="selectedImage" src="#" alt="">
                                    </div>
                                </div>
                                <div class="pb-4">
                                    <div class="chatsend border-top p-1 pb-4 m-2">
                                        <div class="input-group mb-2 ">
                                            <input type="text" class="form-control " id='textmessage' placeholder="Enter Your message here ! . .">
                                            <span class="input-group-text btn btn-dark border" id="sendmessage"><i class='bx bxs-send'></i></span>
                                        </div>
                                        <div class="send-btns">
                                            <div class="attach">
                                                <div class="button-wrapper">
                                                    <span class="label">
                                                        <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title"> attached file
                                                    </span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File" onchange="updateFileName(this)">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- slider Modal -->
                <div class="modal fade" id="iamgeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
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
    <?php }
        }
    } ?>






    <!-- script tag of Bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: '',
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

        //   Graphics 
        document.addEventListener('DOMContentLoaded', () => {
            const dropSection = document.getElementById('dropSection');
            const fileInput = document.getElementById('fileInput');
            const mediaPreview = document.getElementById('mediaPreview');

            dropSection.addEventListener('click', () => {
                document.getElementById('mediaPreview').innerHTML = ""
                fileInput.click(); // Simulate click on file input when drop section is clicked
            });

            fileInput.addEventListener('change', (e) => {
                const selectedFiles = e.target.files;

                if (selectedFiles.length > 0) {
                    displayMedia(selectedFiles);
                }
            });

            function displayMedia(files) {
                for (const file of files) {
                    const reader = new FileReader();

                    reader.onload = function(event) {
                        const fileUrl = event.target.result;

                        const mediaElement = createMediaElement(file, fileUrl);
                        mediaPreview.appendChild(mediaElement);
                    };

                    reader.readAsDataURL(file);
                }
            }

            function createMediaElement(file, fileUrl) {
                const mediaElement = document.createElement(file.type.startsWith('image/') ? 'img' : 'video');
                mediaElement.src = fileUrl;
                mediaElement.alt = file.name;

                if (file.type.startsWith('video/')) {
                    mediaElement.controls = true; // Show video controls
                }

                return mediaElement;
            }
        });



        // For PSD
        $(document).ready(function() {
            const dropSection = document.getElementById('dropPSDSection');
            const fileInput = document.getElementById('fileInputPSD');
            const mediaPreview = document.getElementById('mediaPreviewPSD');
            const progressContainer = document.getElementById('progressContainer');
            const progressBar = document.getElementById('progressBar');

            dropSection.addEventListener('click', () => {
                fileInput.click(); // Simulate click on file input when drop section is clicked
            });

            fileInput.addEventListener('change', (e) => {
                const selectedFiles = e.target.files;

                if (selectedFiles.length > 0) {
                    displayMedia(selectedFiles);
                }
            });

            function displayMedia(files) {
                const totalFiles = files.length;
                let loadedFiles = 0;

                progressContainer.style.display = 'block'; // Show the progress bar

                for (const file of files) {
                    if (file.type === 'application/x-photoshop' || file.name.endsWith('.psd')) {
                        // For PSD files, we cannot display content, so we use a placeholder
                        const mediaContainer = createMediaContainer(file);
                        mediaPreview.appendChild(mediaContainer);
                        updateProgress(++loadedFiles, totalFiles);
                    } else {
                        const reader = new FileReader();
                        reader.onload = function(event) {
                            const fileUrl = event.target.result;
                            const mediaElement = createMediaElement(file, fileUrl);
                            const deleteButton = createDeleteButton(file, mediaContainer);
                            mediaContainer.appendChild(mediaElement);
                            mediaContainer.appendChild(deleteButton);
                            mediaPreview.appendChild(mediaContainer);
                            updateProgress(++loadedFiles, totalFiles);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            }

            function createMediaContainer(file) {
                const mediaContainer = document.createElement('div');
                const mediaElement = createPlaceholderElement(file);
                const deleteButton = createDeleteButton(file, mediaContainer);
                mediaContainer.classList.add('media-container');
                mediaContainer.appendChild(mediaElement);
                mediaContainer.appendChild(deleteButton);
                return mediaContainer;
            }

            function createMediaElement(file, fileUrl) {
                const mediaElement = document.createElement(file.type.startsWith('image/') ? 'img' : 'video');
                mediaElement.src = fileUrl;
                mediaElement.alt = file.name;

                if (file.type.startsWith('video/')) {
                    mediaElement.controls = true; // Show video controls
                }

                return mediaElement;
            }

            function createPlaceholderElement(file) {
                const placeholderElement = document.createElement('img');
                placeholderElement.src =
                    '<?= base_url('img') ?>/psd.png'; // Replace with the actual path to your PSD icon
                placeholderElement.alt = file.name;

                return placeholderElement;
            }

            function createDeleteButton(file, mediaContainer) {
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.classList.add('btn', 'btn-danger', 'm-1');
                deleteButton.addEventListener('click', () => {
                    mediaPreview.removeChild(mediaContainer);
                });
                return deleteButton;
            }

            function updateProgress(loaded, total) {
                const percentComplete = (loaded / total) * 100;
                progressBar.style.width = percentComplete + '%';
                progressBar.textContent = Math.round(percentComplete) + '%';

                if (percentComplete === 100) {
                    setTimeout(() => {
                        progressContainer.style.display =
                            'none'; // Hide the progress bar after a brief delay
                    }, 2000);
                }
            }
        });






        var myForm = document.getElementById('myForm');
        var myForm1 = document.getElementById('myForm1');


        myForm.addEventListener('submit', function(event) {
            // // Update the value of 'editor_content' with the value of 'editor_content1'
            // document.getElementById('newsummernote').value = document.getElementById('summernote').value;
            document.getElementById('newsummernote').value = document.getElementsByClassName('note-editable')[0]
                .innerHTML;
            console.log('ok');
            // event.preventDefault();
        });

        myForm1.addEventListener('submit', function(event) {
            // // Update the value of 'editor_content' with the value of 'editor_content1'
            // document.getElementById('newsummernote').value = document.getElementById('summernote').value;
            document.getElementById('newsummernote1').value = document.getElementsByClassName('note-editable')[0]
                .innerHTML;
            console.log('ok');
            // event.preventDefault();
        });


        function submitGrChanges(gr_Status, tid) {
            // Set the values of cr_Status and tid in the form
            document.getElementById('gr_Status').value = gr_Status;
            document.getElementById('gr_Status1').value = gr_Status;
            document.getElementById('tid').value = tid;

            // myForm.submit();
        }

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

            const url = `<?= base_url() ?>index.php/teamchat/add1`;

            console.log(url);


            let fileInput = document.getElementById('upload');
            // Get the selected file from the input element
            let file = fileInput.files[0];


            console.log('file');
            console.log(file);
            console.log('file end');

            // Create a FormData object to send both text and image data
            let formdata = new FormData();
            formdata.append('image', file);
            formdata.append('userid', <?= $userid ?>)
            formdata.append('username', '<?= $username ?>')
            formdata.append('ticketid', <?= $tid ?>)
            formdata.append('message', textmessage.value)
            formdata.append('time', currentTime)

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

                    if (data.image != "") {
                        let img = document.createElement('img');
                        let p = document.createElement('p');
                        img.src = "<?php echo base_url() ?>/teamchat/" + data.image;
                        let li = document.createElement('li');
                        let i = document.createElement('i');
                        i.classList.add('bx', 'bxs-trash-alt');
                        // i.setAttribute('data-teamchat-deleted',);
                        li.classList.add('repaly');
                        p.appendChild(img);
                        li.appendChild(p);
                        let span = document.createElement('span');
                        span.innerText = data.time;
                        span.classList.add('time');
                        span.appendChild(i);
                        li.appendChild(span);
                        msgbodychat.appendChild(li);
                        console.log(fileInput.files[0]);
                        fileInput.value = '';
                        console.log(fileInput.files[0]);
                    }
                    if (data.message != "") {
                        let li = document.createElement('li');
                        let i = document.createElement('i');
                        i.classList.add('bx', 'bxs-trash-alt');
                        let p = document.createElement('p');
                        let span = document.createElement('span');
                        p.innerText = data.message;
                        span.innerText = data.time;
                        span.classList.add('time');
                        span.classList.add('time');
                        span.appendChild(i);
                        li.classList.add('repaly');
                        li.appendChild(p);
                        li.appendChild(span);
                        msgbodychat.appendChild(li);
                        textmessage.value = "";
                    }
                    scrollToBottom();
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with your fetch operation:', error);
                });

        });

        function deleteMessage(messageId) {
            // Make an AJAX request to delete the message
            fetch(`<?php echo base_url(); ?>index.php/teamchat/delete/${messageId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then((res) => {
                    console.log(res);
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error deleting message:', error);
                });

        }


        function updateFileName(input) {
            // Check if a file is selected
            if (input.files.length > 0) {
                var file = input.files[0];

                // Handle image files
                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        var selectedImage = document.getElementById('selectedImage');
                        selectedImage.src = event.target.result;
                        // selectedImage.style.display = 'block'; // Show the image
                    };

                    reader.readAsDataURL(file);

                } else if (file.type === 'application/pdf') {
                    // Ensure PDF.js worker source is set
                    if (!pdfjsLib.GlobalWorkerOptions.workerSrc) {
                        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
                    }

                    var reader = new FileReader();

                    reader.onload = function(event) {
                        var arrayBuffer = event.target.result;

                        // Load the PDF document from the ArrayBuffer
                        pdfjsLib.getDocument({
                            data: arrayBuffer
                        }).promise.then(pdf => {
                            console.log('PDF loaded:', pdf);

                            // Fetch and log the first page of the PDF
                            pdf.getPage(1).then(page => {
                                console.log('Page 1 loaded:', page);
                                // Add code to render or handle the PDF page
                            }).catch(error => {
                                console.error('Error loading page:', error);
                            });
                        }).catch(error => {
                            console.error('Error loading PDF:', error);
                        });
                    };

                    reader.readAsArrayBuffer(file);
                } else {
                    alert('Please select an image or PDF file.');
                }
            }
        }


        function scrollToBottom() {
            var chatMessageContainer = document.querySelectorAll('.msg-body')[0];
            chatMessageContainer.scrollTop = chatMessageContainer.scrollHeight;
        }

        document.addEventListener('DOMContentLoaded', function() {
            scrollToBottom();
            let deletemessageid = document.querySelectorAll('.deletemessage');
            deletemessageid.forEach(ele => {
                ele.addEventListener('click', function() {
                    deleteMessage(ele.getAttribute('data-teamchat-id'));
                })
            })
        });



        //   Graphics 
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('viewimage')) {
                    slider(event.target.getAttribute('data-value'))
                }
                if (event.target.classList.contains('imgfortbody')) {
                    sliderdigi(event.target.getAttribute('data-digifile'))
                }
                if (event.target.classList.contains('videofortbody')) {
                    sliderdigivideo(event.target.getAttribute('data-digifile-video'))
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


        function sliderdigi(selectedid) {

            console.log('check')
            console.log(selectedid)

            let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
            carouselindicators.innerHTML = "";
            let carouselinner = document.getElementsByClassName('carousel-inner')[0];

            carouselinner.style.height = '80vh'
            carouselinner.innerHTML = "";
            console.log(carouselindicators);
            console.log(carouselinner);

            let dynamicimages = document.getElementsByClassName('imgfortbody');
            Array.from(dynamicimages).forEach((ele, index) => {
                let datavalue = ele.getAttribute('data-digifile')
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

        function sliderdigivideo(selectedid) {

            console.log('check')
            console.log(selectedid)

            let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
            carouselindicators.innerHTML = "";
            let carouselinner = document.getElementsByClassName('carousel-inner')[0];

            carouselinner.style.height = '80vh'
            carouselinner.innerHTML = "";
            console.log(carouselindicators);
            console.log(carouselinner);

            let dynamicimages = document.getElementsByClassName('videofortbody');
            Array.from(dynamicimages).forEach((ele, index) => {
                let datavalue = ele.getAttribute('data-digifile-video')
                console.log("datavalue");
                console.log(datavalue);
                //  lets create the button of slider 
                let btn = document.createElement('button');
                // lets create the div  for "carousel-item
                let div = document.createElement('div');
                // now we create image tag for append it with div
                let video = document.createElement('video');

                btn.setAttribute('data-bs-target', '#carouselExampleIndicators')
                btn.setAttribute('data-bs-slide-to', datavalue)
                video.src = ele.src;
                video.classList.add('d-block')
                video.classList.add('w-100', 'p-2')
                video.controls = true;
                video.setAttribute('id', 'video');

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
                div.appendChild(video);
                carouselinner.appendChild(div);
            });
            console.log(carouselindicators);
            console.log(carouselinner);
        }


        var tempdiv = document.createElement('div');

        function digt(clientid) {
            let base = document.getElementById('base');
            let digitalfile = document.getElementById('digitalfile');
            tempdiv.innerHTML = base.innerHTML;
            base.innerHTML = digitalfile.innerHTML;
            digitalfile.innerHTML = tempdiv.innerHTML;
            console.log(clientid);

            let url = "<?php echo base_url(); ?>" + "index.php/Digitalfile/retriveddata/" + clientid;
            console.log(url);

            let formdata = new FormData();
            formdata.append('Client_id', clientid);

            const tbodyfordigifile = document.querySelector('#base #tbodyfordigifile');

            fetch(url, {
                method: 'POST',
                body: formdata
            }).then(res => {
                return res.json();
            }).then(res => {
                // Clear previous rows
                tbodyfordigifile.innerText = "";
                let i = 0;
                let v = 0;
                for (const [category, itemsByName] of Object.entries(res)) {
                    console.log(`Category: ${category}`);

                    for (const [name, items] of Object.entries(itemsByName)) {
                        const tr = document.createElement('tr');

                        const td1 = document.createElement('td');
                        td1.innerText = name;

                        const td2 = document.createElement('td');
                        td2.classList.add('imagecontainer', 'd-flex');

                        items.forEach(item => {

                            console.log(item);
                            console.log(item.image);
                            if (item.file == '.jpeg' || item.file == '.jpg' || item.file == '.png') {


                                let b = document.createElement('div');
                                let bimg = document.createElement('img');
                                // b.classList.add('b');
                                // b.classList.add('mx-2 ',' my-2');
                                b.classList.add('b', 'mx-2', 'my-2');
                                bimg.src = '<?php echo base_url() ?>DigitalFiles/' + item.image;
                                bimg.classList.add('imgfortbody');
                                bimg.setAttribute('data-digifile', i);
                                bimg.setAttribute('data-bs-toggle', 'modal');
                                bimg.setAttribute('data-bs-target', '#iamgeview');
                                b.appendChild(bimg);
                                td2.appendChild(b);
                                i++;
                            } else {
                                let b = document.createElement('div');
                                let bvideo = document.createElement('video');
                                // b.classList.add('b');
                                // b.classList.add('mx-2 ',' my-2');
                                b.classList.add('b', 'mx-2', 'my-2');
                                bvideo.src = '<?php echo base_url() ?>DigitalFiles/' + item.image;
                                bvideo.classList.add('videofortbody');
                                bvideo.setAttribute('data-digifile-video', v);
                                bvideo.setAttribute('data-bs-toggle', 'modal');
                                bvideo.setAttribute('data-bs-target', '#iamgeview');
                                b.appendChild(bvideo);
                                td2.appendChild(b);
                                v++;
                            }
                        });
                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tbodyfordigifile.appendChild(tr);
                    }
                }
                console.log(tbodyfordigifile)
            }).catch(error => {
                console.error('Error:', error);
            });
        }



        console.log("Script started executing...");

        function cl() {
            let base = document.getElementById('base');
            let digitalfile = document.getElementById('digitalfile');
            tempdiv.innerHTML = base.innerHTML;
            base.innerHTML = digitalfile.innerHTML;
            digitalfile.innerHTML = tempdiv.innerHTML;
        }

        var temp = document.createElement('div');

        function language() {
            const base = document.getElementById('base');
            const language = document.getElementById('language');

            temp.innerHTML = base.innerHTML;
            base.innerHTML = language.innerHTML;
            // base.style.backgroundColor = "#fff";
            language.innerHTML = temp.innerHTML;

        }

        function closelang() {
            const base = document.getElementById('base');
            const language = document.getElementById('language');
            language.innerHTML = base.innerHTML;
            base.innerHTML = temp.innerHTML

        }



        function question54() {
            const base = document.getElementById('base');
            const Question54 = document.getElementById('Question54');

            temp.innerHTML = base.innerHTML;
            base.innerHTML = Question54.innerHTML;
            Question54.innerHTML = temp.innerHTML;
        }


        function close54() {
            const base = document.getElementById('base');
            const Question54 = document.getElementById('Question54');
            Question54.innerHTML = base.innerHTML;
            base.innerHTML = temp.innerHTML
        }



        function questionpainpoint() {
            const base = document.getElementById('base');
            const painpoint = document.getElementById('painpoint');

            temp.innerHTML = base.innerHTML;
            base.innerHTML = painpoint.innerHTML;
            painpoint.innerHTML = temp.innerHTML;
        }


        function closepainpoint() {
            const base = document.getElementById('base');
            const painpoint = document.getElementById('painpoint');
            painpoint.innerHTML = base.innerHTML;
            base.innerHTML = temp.innerHTML
        }

        function questionoffer() {
            const base = document.getElementById('base');
            const offer = document.getElementById('offer');

            temp.innerHTML = base.innerHTML;
            base.innerHTML = offer.innerHTML;
            offer.innerHTML = temp.innerHTML;
        }


        function closeoffer() {
            const base = document.getElementById('base');
            const offer = document.getElementById('offer');
            offer.innerHTML = base.innerHTML;
            base.innerHTML = temp.innerHTML
        }
    </script>





</body>


</html>