<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap');

    body {
        font-family: "Mukta", sans-serif;
        background-color: aliceblue;
    }

    .home-section {
        height: fit-content;
    }

    #right {
        box-shadow: 1px 0px 36px 0px rgba(0, 0, 0, 0.35);
        background-color: #ffff;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        height: fit-content;
    }

    #left {
        box-shadow: 1px 0px 36px 0px rgba(0, 0, 0, 0.35);
        background-color: #ffff;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        height: fit-content;

    }

    #chat {
        box-shadow: 1px 0px 36px 0px rgba(0, 0, 0, 0.35);
        background-color: #ffff;
        border-bottom-left-radius: 25px;
        border-bottom-right-radius: 25px;
        height: fit-content;
        display: none;
    }

    ul li {
        list-style: none;

    }

    #Groupname h6 {
        display: inline;
    }

    .carousel-inner img {
        width: 100%;
        height: 550px;
        object-fit: contain;
    }

    .carousel-control-next,
    .carousel-control-prev {
        width: 8%;
        height: 54%;
        /* margin-top: 78px; */
        align-self: center;
    }

    #gruopmember h6 {
        display: inline;
        color: #a1a09a;
    }

    #left ul li {
        list-style: circle !important;
    }

    #right ul li {
        width: 100%;
        max-width: 100%;
    }

    #right ul li .groupname {
        overflow-x: hidden;
    }

    ul li span img {
        width: 70px;
        border-radius: 50px;
        height: 70px;
        object-fit: cover;
        box-shadow: 1px 0px 36px 0px rgba(0, 0, 0, 0.35);
    }

    #chat span img {
        width: 50px;
        border-radius: 50px;
        height: 50px;
    }

    .chatmessage {
        height: 50vh;
        overflow-y: scroll;
        padding: 0;
    }

    .inputchatgroup {
        display: flex;
        align-items: center;
        padding: 10px;
        border-top: 1px solid #ccc;
    }

    .inputchatgroup input {
        flex: 1;
        border: none;
        padding: 10px;
        border-radius: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-right: 10px;
    }

    .inputchatgroup input:focus {
        outline: none;
    }

    .inputchatgroup .btn-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #007bff;
        color: white;
        font-size: 20px;
        margin-left: 5px;
        cursor: pointer;
    }

    .inputchatgroup .btn-icon:hover {
        background-color: #0056b3;
    }

    .chatmessage li.sender {
        display: block;
        width: 100%;
        position: relative;
    }

    .chatmessage li.sender p {
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

    .chatmessage li.sender img {
        color: #fff;
        height: 250px;
        width: 250px;
        object-fit: contain;
    }

    .chatmessage li.repaly {
        display: block;
        width: 100%;
        text-align: right;
        position: relative;
    }

    .chatmessage li.repaly img {
        color: #fff;
        height: 250px;
        width: 250px;
        object-fit: contain;

    }



    .chatmessage li.repaly p {
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



    @media (max-width: 374px) {

        .inputchatgroup input {
            padding: 8px;
            margin-right: 5px;
            width: 50%;
        }

        .btn-icon {
            width: 35px;
            height: 35px;
            font-size: 18px;
        }
    }

    #upload {
        display: none;
    }

    .time .bxs-trash {
        color: red;
        font-size: 20px;
    }
</style>

<body>


    <section class="home-section ">
        <div class="conatiner p-2">
            <div class="row justify-content-end ">
                <div class="col-md-2 p-2">
                    <a href="<?php echo base_url() ?>index.php/Admin/Admin_Groupchat/Manage" class="btn btn-primary mx-2"><i class='bx bxs-message-edit mx-2'></i>Manage</a>
                </div>
            </div>
            <div class="row p-3 justify-content-around">
                <div class="col-md-5 mt-2" id="right">
                    <div class="p-2">
                        <h5 class="border-bottom p-2">Groups</h5>
                        <?php if (!empty($Groups)) {
                            foreach ($Groups as $key) {
                                // echo "<pre>";
                                // print_r($key);
                                foreach ($newArray as $narray) {
                                    if ($key['id'] == $narray['Groupid']) {
                        ?>
                                        <ul>
                                            <li class="my-3  pb-2 d-flex" onclick=" openchatbox('<?php echo $key['Name']; ?>','<?php echo $key['id']; ?>','<?php echo $key['image']; ?>')">
                                                <div class="d-flex   flex-column">
                                                    <span class="">
                                                        <img src="<?= base_url() ?>chatprofile/<?= $key['image'] ?>" alt="">
                                                    </span>
                                                </div>
                                                <div class="d-flex  flex-column groupname">
                                                    <span id="Groupname" class="ms-4">
                                                        <h6><?php echo $key['Name']; ?></h6>
                                                    </span>
                                                    <span id="gruopmember" class="ms-4 gruopmember">
                                                        <h6>
                                                            <?php foreach ($narray['users'] as $user) {
                                                                echo $user['username'] . ",";
                                                            } ?>
                                                        </h6>
                                                    </span>
                                                </div>
                                            </li>
                                            <hr>
                                        </ul>
                        <?php
                                    }
                                }
                            }
                        } ?>
                    </div>
                </div>
                <div class="col-md-5 mt-2" id="left">
                    <div class="p-2">
                        <h5 class="border-bottom p-2">No Chat Are Selected</h5>
                        <ul>
                            <li class="my-3 pb-2 d-flex">

                                <div class="d-flex   flex-column">
                                    <span class="">
                                        <i class='bx bxs-left-arrow-square' style="font-size: 30px;"></i>
                                    </span>
                                </div>
                                <div class="d-flex  flex-column">
                                    <span id="Groupname" class="ms-4">
                                        <h6>Select Chat From Left Side </h6>
                                    </span>
                                    <!-- <span id="gruopmember" class="ms-4">
                                        <h6>You And Vinayak Mane, smca, Sayali Lole, Abhang Khutwad, Vaibhav Gaikwad</h6>
                                    </span> -->
                                </div>
                            </li>

                        </ul>


                    </div>
                </div>
                <div class="col-md-5 mt-2" id="chat">
                    <div class="p-2 border-bottom">
                        <ul>
                            <li class="mt-1  d-flex">
                                <div class="d-flex   flex-column">
                                    <span class="">
                                        <img src="" id="chatprofiletitleimg" alt="">
                                    </span>
                                </div>
                                <div class="d-flex  flex-column align-self-center">
                                    <span id="Groupname" class="ms-4 ">
                                        <h4>hello </h4>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="chatmessage my-2" id="chatmessage">
                        <li class="sender">

                            <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="sender">

                            <p> <span class="role  ">Content Writer</span>Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Perspiciatis repudiandae dolore accusantium officiis architecto enim
                                fuga at reiciendis necessitatibus? Voluptate eligendi dolorem temporibus. Nobis deserunt
                                quaerat velit accusamus beatae laudantium omnis et impedit, dolorum modi vel facilis
                                quisquam magni magnam dolor a alias eum minus autem recusandae. Atque, error ex.</p>
                            <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="sender">

                            <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="sender">

                            <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="sender">

                            <p> <span class="role  ">Content Writer</span> hi hell Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Obcaecati, est. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Non, odio conse</p> <span class="time">10:06 am</span>
                        </li>
                        <li class="repaly">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci, rem!</p> <span class="time">10:06 am</span>
                        </li>
                    </ul>
                    <div class="inputchatgroup p-2">
                        <input type="text" placeholder="Type a message" id="textmessage">
                        <div class="btn-icon">
                            <i class='bx bxs-file' id="fileicon"></i>
                            <input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File" onchange="updateFileName(this)">
                        </div>
                        <div class="btn-icon">
                            <i class='bx bxs-send' id="sendmessage"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- for carusle -->
        <div class="modal fade" id="iamgeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content" id="imageviewcontent">

                    <div class="modal-body ">

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

    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script>
        var groupid;
        var id;
        var imgdata;
        var chatmessages = document.getElementById('chatmessage');
        var chatprofiletitleimg = document.getElementById('chatprofiletitleimg');
        var left = document.getElementById('left');
        var chat = document.getElementById('chat');
        var chatGroupName = document.querySelector('#Groupname h4');
        var sendmessage = document.getElementById('sendmessage');
        var fileicon = document.getElementById('fileicon');


        const arrayofgroupmember = <?= json_encode($newArray) ?>;
        console.log('arraydata');
        console.log(arrayofgroupmember);
        console.log('arraydata');
        var u = 0;
        var v = 0;
        
        var userid = <?php echo $this->session->userdata('user_id') ?>;

        function openchatbox(str, id, image) {
            // var scrollableDiv = document.getElementById('scrollableDiv');
            left.style.display = "none";
            chat.style.display = "block";
            chatprofiletitleimg.src = `<?= base_url() ?>chatprofile/${image}`;
            chatGroupName.innerText = str;
            groupid = id;
            chatmessages.innerHTML = "";
            document.getElementById('chat').style.display = 'block';


            let url = `<?= base_url() ?>index.php/Chat/show/${groupid}`;
            console.log(url);
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {

                    // console.log(data);
                    if (data && data.length > 0) {



                        data.forEach(message => {
                            let li = document.createElement('li');

                            for (let i = 0; i < arrayofgroupmember[id - 1].users.length; i++) {
                                // console.log(arrayofgroupmember[id - 1].users[i]);

                                // if (message.userid == "1")  //for sender
                                if (message.userid == arrayofgroupmember[id - 1].users[i].userid) //for sender
                                {
                                    // console.log(message);
                                    if (message.userid == userid) {

                                        if (message.message != "") {
                                            let p = document.createElement('p');
                                            let span = document.createElement('span');
                                            let i = document.createElement('i');
                                            i.classList.add('bx', 'bxs-trash', 'mx-2');
                                            i.setAttribute('data-message-delete', message.id);
                                            i.addEventListener("click", function(event) {

                                                var messageId = this.getAttribute(
                                                    "data-message-delete");
                                                if (confirm(
                                                        "Are you sure you want to delete this message?"
                                                    )) {
                                                    // Call the method to delete the message (you can implement this)
                                                    // alert(messageId);
                                                    deleteMessage(messageId);
                                                }
                                            });

                                            p.innerText = message.message;
                                            span.innerText = message.message_created;
                                            span.classList.add('time');
                                            span.appendChild(i);
                                            li.appendChild(p);
                                            li.appendChild(span);
                                            // console.log(message);
                                            li.classList.add('repaly');
                                            chatmessages.appendChild(li);
                                        }

                                        if (message.image) {
                                            let p = document.createElement('p');
                                            let time = document.createElement('span');
                                            let neli = document.createElement('li');
                                            let i = document.createElement('i');
                                            i.classList.add('bx', 'bxs-trash', 'mx-2');
                                            i.setAttribute('data-message-delete', message.id);
                                            i.addEventListener("click", function(event) {

                                                var messageId = this.getAttribute(
                                                    "data-message-delete");
                                                if (confirm(
                                                        "Are you sure you want to delete this message?"
                                                    )) {
                                                    // Call the method to delete the message (you can implement this)
                                                    // alert(messageId);
                                                    deleteMessage(messageId);
                                                }
                                            });
                                            let img = document.createElement('img');
                                            time.innerText = message.message_created;
                                            time.appendChild(i);
                                            time.classList.add('time');
                                            img.src = `<?php echo base_url() ?>/uploadschat/${message.image}`;
                                            img.classList.add("userimage");
                                            img.setAttribute('data-value-userimage', u);
                                            img.setAttribute('data-bs-toggle', 'modal');
                                            img.setAttribute('data-bs-target', '#iamgeview');
                                            p.appendChild(img);
                                            neli.appendChild(p);
                                            neli.appendChild(time);
                                            neli.classList.add('repaly');
                                            chatmessages.appendChild(neli);
                                            u++;
                                        }
                                        break;
                                    } else {
                                        // console.log(message);
                                        if (message.message != '') {

                                            let p = document.createElement('p');
                                            let role = document.createElement('span');
                                            let time = document.createElement('span');

                                            role.innerText = arrayofgroupmember[id - 1].users[i].username;
                                            role.classList.add('role');
                                            time.classList.add('time');

                                            let block = document.createElement('span');
                                            block.innerText = message.message
                                            time.innerText = message.message_created;

                                            p.appendChild(role);
                                            p.appendChild(block);
                                            li.appendChild(p);

                                            li.appendChild(time);
                                            li.classList.add('sender');
                                            chatmessages.appendChild(li);

                                        }
                                        if (message.image) {
                                            let p = document.createElement('p');
                                            let neli = document.createElement('li');
                                            let role = document.createElement('span');
                                            let time = document.createElement('span');
                                            let img = document.createElement('img');
                                            role.innerText = arrayofgroupmember[id - 1].users[i].username;
                                            role.classList.add('role');
                                            time.innerText = message.message_created;
                                            time.classList.add('time');
                                            img.src = `<?php echo base_url() ?>/uploadschat/${message.image}`;
                                            img.classList.add('usergroupimage');
                                            img.setAttribute('data-value-usergroupimage', v);
                                            img.setAttribute('data-bs-toggle', 'modal');
                                            img.setAttribute('data-bs-target', '#iamgeview');
                                            p.appendChild(role);
                                            p.appendChild(img);
                                            neli.appendChild(p);
                                            neli.appendChild(time);
                                            neli.classList.add('sender');
                                            chatmessages.appendChild(neli);
                                            v++;
                                        }
                                        break;
                                    }
                                }
                            }
                        });

                        scrollToBottom();

                    } else {
                        console.log('No messages found.');
                    }

                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

        }

        sendmessage.addEventListener('click', () => {
            let message = document.getElementById('textmessage').value;
            console.log(message);
            let url = `<?= base_url() ?>index.php/Chat/add`;
            console.log(url);
            // ul.style.zIndex = 99;
            // Get the file input element
            let fileInput = document.getElementById('upload');
            // Get the selected file from the input element
            let file = fileInput.files[0];
            // <i class='bx bxs-trash ms-2'></i>
            // console.log('file');
            console.log(file);

            // Create a FormData object to send both text and image data
            let formData = new FormData();
            formData.append('message', message);
            formData.append('groupid', groupid);
            formData.append('id',userid);

            formData.append('image', file);

            fetch(url, {
                method: 'POST',
                body: formData
            }).
            then((res) => {
                return res.json();
            }).then((res) => {
                console.log(res);
                if (file && file.name) {
                    // Create a list item for the file name and append it to the ul
                    let liFile = document.createElement('li');
                    let p = document.createElement('p');
                    let img = document.createElement('img');
                    let time = document.createElement('span');
                    let i = document.createElement('i');
                    i.addEventListener("click", function(event) {

                        var messageId = this.getAttribute("data-message-delete");
                        if (confirm("Are you sure you want to delete this message?")) {
                            // Call the method to delete the message (you can implement this)
                            // alert(messageId);
                            deleteMessage(messageId);
                        }
                    });
                    img.src = "<?php echo base_url() ?>/uploadschat/" + res.image;
                    img.classList.add('userimage');
                    img.setAttribute('data-value-userimage', u);
                    img.setAttribute('data-bs-toggle', 'modal');
                    img.setAttribute('data-bs-target', '#iamgeview');
                    p.appendChild(img);
                    time.innerText = res.time;
                    time.classList.add('time');
                    i.classList.add('bx', 'bxs-trash', 'mx-2');
                    i.addEventListener("click", function(event) {

                        var messageId = this.getAttribute("data-message-delete");
                        if (confirm("Are you sure you want to delete this message?")) {
                            // Call the method to delete the message (you can implement this)
                            // alert(messageId);
                            deleteMessage(messageId);
                        }
                    });
                    time.appendChild(i);
                    liFile.appendChild(p);
                    liFile.appendChild(time);
                    liFile.classList.add('repaly')
                    chatmessages.appendChild(liFile);
                    fileInput.value = ''; // This line clears the file input
                    u++;
                }

                if (message != "") {
                    let li = document.createElement('li');
                    let i = document.createElement('i');
                    i.classList.add('bx', 'bxs-trash', 'mx-2');
                    i.addEventListener("click", function(event) {

                        var messageId = this.getAttribute("data-message-delete");
                        if (confirm("Are you sure you want to delete this message?")) {
                            // Call the method to delete the message (you can implement this)
                            // alert(messageId);
                            deleteMessage(messageId);
                        }
                    });
                    li.classList.add('repaly')
                    let p = document.createElement('p');
                    p.innerText = message;
                    let time = document.createElement('span');
                    time.innerText = res.time;
                    time.classList.add('time');
                    time.appendChild(i);
                    li.appendChild(p);
                    li.appendChild(time);
                    chatmessages.appendChild(li);
                    document.getElementById('textmessage').value = '';
                }

                scrollToBottom();
                // selectedImage.style.display = 'none';
            })

        })


        fileicon.addEventListener('click', function() {
            let upload = document.getElementById('upload');
            upload.click();
        })

        function updateFileName(input) {
            // Check if a file is selected
            if (input.files.length > 0) {
                // Get the file object from the input element
                var file = input.files[0];
                var selectedImage = document.getElementById('selectedImage');
                var selectedImagediv = document.getElementById('selectedImagediv');
                // selectedImagediv.style.display='block';
                ul.style.zIndex = 0;
                // Check if the selected file is an image
                if (file.type.startsWith('image/')) {
                    // selectedImagediv.style.display = 'block';
                    // Create a FileReader object to read the file
                    var reader = new FileReader();

                    console.log(reader);
                    // Set up the FileReader onload event handler
                    reader.onload = function(event) {
                        // Update the src attribute of the img tag with the data URL of the selected image
                        selectedImage.src = event.target.result;
                        imgdata = event.target.result;
                        selectedImage.style.display = 'block'; // Show the image
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(file);

                } else if (file.type === 'application/pdf') {

                    // Check if PDF.js is initialized and the worker source is set
                    if (!pdfjsLib.GlobalWorkerOptions.workerSrc) {
                        pdfjsLib.GlobalWorkerOptions.workerSrc =
                            'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
                    }

                    // Create a FileReader object to read the file
                    var reader = new FileReader();

                    console.log(reader);
                    // Set up the FileReader onload event handler
                    reader.onload = function(event) {
                        // Read the file as an ArrayBuffer
                        var arrayBuffer = event.target.result;
                        // Load the PDF document from the ArrayBuffer
                        pdfjsLib.getDocument({
                                data: arrayBuffer
                            })
                            .promise
                            .then(pdf => {
                                // PDF loaded successfully, you can now work with the PDF
                                console.log('PDF loaded:', pdf);
                                // Example: Fetch the first page of the PDF
                                pdf.getPage(1).then(page => {
                                    console.log('Page 1 loaded:', page);
                                    // Render the page, etc.
                                }).catch(error => {
                                    console.error('Error loading page:', error);
                                });
                            })
                            .catch(error => {
                                console.error('Error loading PDF:', error);
                            });
                    };

                    // Read the file as an ArrayBuffer
                    reader.readAsArrayBuffer(file);
                } else {
                    alert('Please select an image file.');
                }
            }
            scrollToBottom();
        }



        function deleteMessage(messageId) {
            // Make an AJAX request to delete the message
            fetch(`<?= base_url() ?>index.php/chat/delete/${messageId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                }).then((res) => {
                    console.log(res);
                    window.location.reload();
                })
            // .catch(error => {
            //     console.error('Error deleting message:', error);
            // });
        }



        function scrollToBottom() {
            var chatMessageContainer = document.getElementById('chatmessage');
            chatMessageContainer.scrollTop = chatMessageContainer.scrollHeight;
        }

        window.onload = function() {
            scrollToBottom();
        };

        document.addEventListener('DOMContentLoaded', function() {

            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('userimage')) {
                    slideruser(event.target.getAttribute('data-value-userimage'))
                }

                if (event.target.classList.contains('usergroupimage')) {
                    sliderforgroupuser(event.target.getAttribute('data-value-usergroupimage'))
                }

            });
        });


        function slideruser(selectedidofimage) {
            console.log(selectedidofimage)

            let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
            let carouselinner = document.getElementsByClassName('carousel-inner')[0];
            carouselindicators.innerHTML = '';
            carouselinner.innerHTML = '';
            console.log(carouselindicators);
            let dynamicimages = document.getElementsByClassName('userimage');
            Array.from(dynamicimages).forEach((ele, index) => {
                // console.log(ele, index);
                let newbtn = document.createElement('button');
                newbtn.setAttribute('data-bs-target', '#carouselExampleIndicators');
                newbtn.setAttribute('data-bs-slide-to', index);
                newbtn.setAttribute("aria-label", "Slide " + (index + 1));
                if (index == selectedidofimage) {
                    newbtn.setAttribute("aria-current", "true");
                    newbtn.classList.add("active");
                }
                carouselindicators.appendChild(newbtn);
                let innerdiv = document.createElement('div');
                let innerimg = document.createElement('img');


                let innerimgdiv = document.createElement('div');
                innerimgdiv.classList.add('row', 'p-3', 'justify-content-between', 'border-bottom', 'mb-3');

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

                innerimg.src = ele.src;

                innerdiv.classList.add('carousel-item');

                if (index == selectedidofimage) {
                    innerdiv.classList.add('active');
                }

                innerdiv.appendChild(innerimgdiv);
                innerdiv.appendChild(innerimg);
                carouselinner.appendChild(innerdiv);
            });
            console.log(carouselindicators);
            console.log(carouselinner);
        }

        function sliderforgroupuser(selectedidofimage) {
            console.log(selectedidofimage)

            let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
            let carouselinner = document.getElementsByClassName('carousel-inner')[0];
            carouselindicators.innerHTML = '';
            carouselinner.innerHTML = '';
            console.log(carouselindicators);
            let dynamicimages = document.getElementsByClassName('usergroupimage');
            Array.from(dynamicimages).forEach((ele, index) => {
                // console.log(ele, index);
                let newbtn = document.createElement('button');
                newbtn.setAttribute('data-bs-target', '#carouselExampleIndicators');
                newbtn.setAttribute('data-bs-slide-to', index);
                newbtn.setAttribute("aria-label", "Slide " + (index + 1));
                if (index == selectedidofimage) {
                    newbtn.setAttribute("aria-current", "true");
                    newbtn.classList.add("active");
                }
                carouselindicators.appendChild(newbtn);
                let innerdiv = document.createElement('div');
                let innerimg = document.createElement('img');


                let innerimgdiv = document.createElement('div');
                innerimgdiv.classList.add('row', 'p-3', 'justify-content-between', 'border-bottom', 'mb-3');

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

                innerimg.src = ele.src;

                innerdiv.classList.add('carousel-item');

                if (index == selectedidofimage) {
                    innerdiv.classList.add('active');
                }

                innerdiv.appendChild(innerimgdiv);
                innerdiv.appendChild(innerimg);
                carouselinner.appendChild(innerdiv);
            });
            console.log(carouselindicators);
            console.log(carouselinner);
        }
    </script>




</body>

</html>