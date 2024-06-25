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

    /* tl content writer */
    .buttonsofassigning {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 30px;
    }

    .buttonsofassigning .button {
        width: 100px;
        color: #000;
        /* background-color: red; */
    }

    #hold {
        background-color: orange;
    }

    #reassign {
        background-color: yellow;
    }

    #rewrite {
        background-color: pink;
    }

    #changes {
        background-color: aquamarine;
    }

    #approve {
        background-color: antiquewhite;
    }


    @media (max-width :822px) {
        .buttonsofassigning {
            display: flex;
            padding: 0;

        }

        .buttonsofassigning .button {
            display: inline;
        }
    }

    @media (max-width :733px) {
        .buttonsofassigning {
            display: flex;
            padding: 10px;

        }

        .buttonsofassigning .button {
            display: inline;
        }
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

    .imagecontainer {
        display: flex;
        flex-wrap: wrap;
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
                <a class="btn btn-primary  p-2" href="<?php echo base_url() ?>index.php/Head_CR_Writer/Head_Cr_dashboardControll/viewDashboard">Close</a>
            </div>

        </div>

    </div>

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
                        <button class="btn btn-danger m-1">54 Questions</button>
                        <button class="btn btn-danger m-1">TG Form</button>
                        <button class="btn btn-danger m-1">CVP Form</button>
                        <button class="btn btn-danger m-1">Pain Point</button>
                        <button class="btn btn-danger m-1">Requirement</button>
                        <button class="btn btn-danger m-1">Language</button>
                        <button class="btn btn-danger m-1">Offer</button>
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
                                <th>Content Cost (&#8377)</th>
                                <td>value</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <?php if ($receiveddata[0]->cr_Status == 4) {  ?>
                    <div class="col-md-8  mt-5 p-2" id="controlpanel">
                        <textarea name="oldcontent" id="oldcontent">
                    <?php
                    if (!empty($receiveddata)) {
                        echo strip_tags($receiveddata[0]->editor_content);
                    } else {
                        echo "unauthorized";
                    }
                    ?>
                </textarea>


                    </div>

                <?php } else { ?>
                    <style>
                        #oldcontent {
                            display: none;
                        }
                    </style>
                <?php } ?>





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

                <div class="col-md-8  " id="controlpaneloftext">
                    <div id="summernote"></div>
                </div>


                <div class="col-md-8  my-5" id="controlpaneloftext">
                    <?php $tid = $this->uri->segment(4);
                    ?>
                    <form id="myForm" method="post" action="<?php echo base_url('index.php/Head_CR_Writer/Head_Cr_dashboardControll/updateTask'); ?>">

                        <div class="buttonsofassigning">
                            <input type="hidden" name="cr_Status" id="cr_Status">
                            <input type="hidden" name="gr_Status" id="gr_Status">
                            <input type="hidden" name="smm_Status" id="smm_Status">
                            <input type="hidden" name="editor_content" id="newsummernote">
                            <input type="hidden" name="tid" value="<?php echo $tid ?>">

                            <button class="btn  button m-2 " id="hold" onclick="submitCrChanges(11, <?php echo $tid; ?>)">Hold</button>

                            <a data-bs-toggle="modal" class="btn  button m-2 " id="reassign" data-bs-target="#reassignmodel"> Re Assign</a>


                            <!-- reassign Modal -->
                            <div class="modal fade" id="reassignmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <select class="form-select" aria-label="Default select example" id="ticketValue" name="ticketValue">

                                                <?php
                                                if (!empty($userResult)) {
                                                    foreach ($userResult as $userData) {
                                                        // Check if the user's role is 'Content_Writer'
                                                        if ($userData['role'] === 'Content_Writer') {
                                                            // Check if this user is selected
                                                            $selected = ($userData['id'] == $receiveddata[0]->ticketValue) ? 'selected' : '';
                                                            // Output the option element
                                                            echo '<option value="' . htmlspecialchars($userData['id'], ENT_QUOTES, 'UTF-8') . '" ' . $selected . '>' . htmlspecialchars($userData['name'], ENT_QUOTES, 'UTF-8') . '</option>';
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success mx-1" onclick="submitCrChanges(9, <?php echo $tid; ?>)">Changes</button>
                                            <!-- <button id="submitButton" type="button" class="btn btn-secondary" data-dismiss="modal">Submit</button> -->
                                            <!-- Add submit button if needed -->
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <button class="btn  button m-2 " id="rewrite" onclick="submitCrChanges(5, <?php echo $tid; ?>)">Re Write</button>
                            <button class="btn  button m-2 " id="changes" onclick="submitCrChanges(4, <?php echo $tid; ?>)">Changes</button>
                            <button class="btn  button m-2 " id="approve" onclick="submitCrChanges(6, <?php echo $tid; ?>)">Approve</button>
                        </div>
                    </form>
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
                                        if (!empty($key['message'])) { ?>
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


        <!-- script tag of Bootstrap -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


        <script>
            var myForm = document.getElementById('myForm');
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


            document.addEventListener("DOMContentLoaded", function(event) {
                console.log("DOM fully loaded and parsed");
                // Your code to run after the DOM is ready
                let data = document.querySelector('.note-editable');

                data.innerHTML = `<?php echo $receiveddata[0]->editor_content; ?>`;
            });


            myForm.addEventListener('submit', function(event) {
                // Update the value of 'editor_content' with the value of 'editor_content1'
                document.getElementById('newsummernote').value = document.querySelector('.note-editable').innerHTML;
                // event.preventDefault();
                // console.log(  document.getElementById('newsummernote'));
                // console.log(  'newsummernote');
            });

            function submitCrChanges(cr_Status, tid) {
                // Set the values of cr_Status and tid in the form
                document.getElementById('cr_Status').value = cr_Status;
                document.getElementById('tid').value = tid;
                // // Submit the form
                myForm.submit();

            }

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
                            pdfjsLib.GlobalWorkerOptions.workerSrc =
                                'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
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

                    for (const [category, itemsByName] of Object.entries(res)) {
                        console.log(`Category: ${category}`);

                        for (const [name, items] of Object.entries(itemsByName)) {
                            const tr = document.createElement('tr');

                            const td1 = document.createElement('td');
                            td1.innerText = name;

                            const td2 = document.createElement('td');
                            td2.classList.add('imagecontainer', 'd-flex');

                            items.forEach(item => {
                                console.log(item.image);
                                let b = document.createElement('div');
                                let bimg = document.createElement('img');
                                // b.classList.add('b');
                                // b.classList.add('mx-2 ',' my-2');
                                b.classList.add('b', 'mx-2', 'my-2');
                                bimg.src = '<?php echo base_url() ?>DigitalFiles/' + item.image;
                                bimg.classList.add('imgfortbody');
                                b.appendChild(bimg);
                                td2.appendChild(b);
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
        </script>





</body>

</html>