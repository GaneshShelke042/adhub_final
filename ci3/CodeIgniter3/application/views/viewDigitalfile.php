<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <style>
        .container {
            max-width: 100%;

            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-top: 70px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            border-collapse: collapse;
            width: 100%;

        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f4f6f4;
        }

        button {

            color: #fff;
            border: none;
            padding: 10px 20px;
            /* Adjust padding to change button size */
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }


        /* 

        button.hold {
            background-color: #ffcc00;
        }

        button.delete {
            background-color: #8A0000;
        }

        button.unhold {
            background-color: #e68a00;
        }

        button.active {
            background-color: #00cc00;
        }

        button.edit {
            background-color: #ff9900;
        }

        button.view {
            background-color: #1a75ff;
        }

        button.chat {
            background-color: #9933ff;
        }

        button.setting {
            background-color: #ff5050;
        }

        button i {
            align-content: center;
            margin-right: 5px;
        } */

        .additional-buttons {
            display: flex;
        }

        /* .additional-buttons button {
            margin-right: 10px;
            Adjust the margin as needed
        } */

        /* Positioning for the new button */
        .add-new-button {
            position: absolute;
            top: 10px;
            right: 10px;
            margin-right: 20px;
        }

        /* Style for the search bar */
        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            width: 30%;
            padding: 10px;
            margin-top: 8px;
            font-size: 17px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container-popup {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .popup {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            border-radius: 8px;
            position: relative;
        }


        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor:
                pointer;
        }

        /* switch */

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

        /* Add custom styling to the drop zone */
        .dropzone {
            border: 2px dashed #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
        }

        .file-preview {
            display: inline-block;
            margin: 5px;
        }

        .preview-image {
            max-width: 100px;
            max-height: 100px;
        }

        .preview-video {
            max-width: 150px;
        }

        .dynamicimage {
            width: 75px;
            height: 75px;
            display: inline-block;
        }

        .dynamicvideo {
            width: 75px;
            height: 75px;
            display: inline-block;
        }


        .deleteimagee {
            width: 75px;
            height: 75px;
            display: inline-block;
        }

        .deletevideo {
            width: 75px;
            height: 75px;
            display: inline-block;
        }



        .clickimage {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .imagethatclick {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        #imageshow img {
            width: 100%;
            height: 500px;
            object-fit: contain;
        }

        #imageview {
            display: none;
            position: absolute;
            top: 0;
            background-color: #888;
        }

        #imageviewcontent {
            background-color: #000;
            opacity: 1;
        }

        .carousel-inner img {
            width: 100%;
            height: 550px;
            object-fit: contain;
        }

        .carousel-inner video {
            height: 550px;
            /* Adjust as needed */
        }

        .carousel-control-next,
        .carousel-control-prev {
            width: 8%;
            height: 80%;
            margin-top: 78px;
        }
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->
        <button class="add-new-button">
            <a href="<?= base_url() ?>index.php/Digitalfile/addnew" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"></i> Add New</a>
        </button>


        <div class="container">
            <!-- New button added for adding new entries -->


            <!-- Search bar -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Total File</th>
                        <th>Created On</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $srno = 0 ?>
                    <?php if (!empty($sortedLogoArray)) {
                        foreach ($sortedLogoArray as $key => $value) { ?>
                            <tr> <?php $srno++ ?>
                                <td><?= $srno  ?></td>
                                <td><?php echo $key ?></td>
                                <td>Logo</td>
                                <td><?php echo count($value) ?></td>
                                <td><?php echo $value[0]['created_on'] ?></td>

                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="showimage('<?php echo $key ?>','Logo','<?php echo $value[0]['Client_id'] ?>')"><i class="fa-solid fa-eye"></i></button></td>

                                <td> <button class="btn btn-warning" onclick="deltedata('<?php echo $key ?>','Logo','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-trash-alt'></i> </button> </td>

                                <td> <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="deleteimage('<?php echo $key ?>','Logo','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-message-alt-edit'></i></button> </td>
                            </tr>

                        <?php }
                    } else {  ?>
                        <tr>
                            <td colspan="8">No logo availiable</td>
                        </tr>
                    <?php } ?>



                    <?php if (!empty($sortedProspectArray)) {
                        foreach ($sortedProspectArray as $key => $value) { ?>
                            <tr> <?php $srno++ ?>
                                <td><?= $srno  ?></td>
                                <td><?php echo $key ?></td>
                                <td>Prospect</td>
                                <td><?php echo count($value) ?></td>
                                <td><?php echo $value[0]['created_on'] ?></td>
                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="showimage('<?php echo $key ?>','Prospect','<?php echo $value[0]['Client_id'] ?>')"><i class="fa-solid fa-eye"></i></button></td>

                                <td> <button class="btn btn-warning" onclick="deltedata('<?php echo $key ?>','Prospect','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-trash-alt'></i> </button> </td>


                                <td> <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="deleteimage('<?php echo $key ?>','Prospect','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-message-alt-edit'></i></button> </td>

                            </tr>

                        <?php }
                    } else {  ?>
                        <tr>
                            <td colspan="8">No Prospect availiable</td>
                        </tr>
                    <?php } ?>





                    <?php if (!empty($sortedOld_DesignsArray)) {
                        foreach ($sortedOld_DesignsArray as $key => $value) { ?>
                            <tr> <?php $srno++ ?>
                                <td><?= $srno  ?></td>
                                <td><?php echo $key ?></td>
                                <td>Old_Designs</td>
                                <td><?php echo count($value) ?></td>
                                <td><?php echo $value[0]['created_on'] ?></td>

                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="showimage('<?php echo $key ?>','Old Designs','<?php echo $value[0]['Client_id'] ?>')"><i class="fa-solid fa-eye"></i></button></td>

                                <td> <button class="btn btn-warning" onclick="deltedata('<?php echo $key ?>','Old Designs','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-trash-alt'></i> </button> </td>

                                <td> <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="deleteimage('<?php echo $key ?>','Old Designs','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-message-alt-edit'></i></button> </td>
                            </tr>

                        <?php }
                    } else {  ?>
                        <tr>
                            <td colspan="8">No Old Designs availiable</td>
                        </tr>
                    <?php } ?>




                    <?php if (!empty($sortedOthersArray)) {
                        foreach ($sortedOthersArray as $key => $value) { ?>
                            <tr> <?php $srno++ ?>
                                <td><?= $srno  ?></td>
                                <td><?php echo $key ?></td>
                                <td>Others</td>
                                <td><?php echo count($value) ?></td>
                                <td><?php echo $value[0]['created_on'] ?></td>

                                <td><button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="showimage('<?php echo $key ?>','Others','<?php echo $value[0]['Client_id'] ?>')"><i class="fa-solid fa-eye"></i></button></td>


                                <td> <button class="btn btn-warning" onclick="deltedata('<?php echo $key ?>','Others','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-trash-alt'></i> </button> </td>

                                <td> <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#clientdetail" onclick="deleteimage('<?php echo $key ?>','Others','<?php echo $value[0]['Client_id'] ?>')"> <i class='bx bxs-message-alt-edit'></i></button> </td>
                            </tr>

                        <?php }
                    } else {  ?>
                        <tr>
                            <td colspan="8">No Others availiable</td>
                        </tr>
                    <?php } ?>


                </tbody>

            </table>
        </div>


        <!-- 
        <div class="container" id="imageview">
            <div class="row justify-content-end">
                <div class="col-md-2 d-flex">

                    <a href="" class="mx-3 btn btn-outline-success" id="imagedownload"> <i class='bx bxs-downvote'></i></a>

                    <a class="btn btn-outline-secondary" id="imageclose"><i class="fa-solid fa-rectangle-xmark"></i></a>

                </div>

            </div>
            <div class="row justify-content-center">
                <div class="col-md-7" id="imageshow">
                    <img src="<?= base_url() ?>DigitalFiles/mahadev.jpg" alt="">
                </div>
            </div>
        </div> -->





        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Digital Files</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="<?= base_url() ?>index.php/Digitalfile/add/<?= $id ?>" enctype="multipart/form-data" method="post">

                        <div class="modal-body">
                            <div class="d-flex justify-content-around">
                                <div class="m-2  flex-column " style="width: 50%;">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="Name">
                                </div>
                                <div class="m-2 flex-column " style="width: 25%;">
                                    <label for="exampleFormControlselect" class="form-label">Type</label>
                                    <select class="form-select" aria-label="Default select example" id="exampleFormControlselect" name="Type">
                                        <option selected> select menu</option>
                                        <option value="Logo">Logo</option>
                                        <option value="Prospect">Prospect</option>
                                        <option value="Old Designs">Old Designs</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="m-2 flex-column " style="width: 25%;">
                                    <label for="exampleFormControlselectstatus" class="form-label">Status</label>
                                    <select class="form-select" aria-label="Default select example" id="exampleFormControlselectstatus" name="Status">
                                        <option selected> select menu</option>
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="m-2">
                                <label for="dropZone" class="form-label">Attachment</label>
                                <div id="dropZone" class="dropzone">
                                    <p class="text-center">Drag & Drop files here or click to browse</p>
                                    <!-- Hidden file input -->
                                    <input type="file" id="fileInput" name="file[]" class="file-input" accept="image/*,video/*" multiple style="display: none;">
                                    <div id="preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



        <!-- view Modal -->
        <div class="modal fade" id="clientdetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Client Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body d-flex justify-content-center">
                        <table id="viewmodel">

                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>

                    </form>

                </div>
            </div>
        </div>



        <!-- picture Modal -->
        <!-- <div class="modal fade" id="iamgeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header ">

                  
                        <a class="btn btn-outline-success" id="imagedownload"><i class='bx bxs-download'></i></a>
                        <button type="button" class="btn mt-2 mx-3 p-2 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>



                    </div>
                    <div class="modal-body">
                        <div id="imageshow">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- for carusle -->
        <div class="modal fade" id="iamgeview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-fullscreen">
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







        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        <script>
            var viewmodel = document.getElementById('viewmodel');
            var imagedownload = document.getElementById('imagedownload');
            var imageclose = document.getElementById('imageclose');
            var popimage = document.querySelector('#imageshow img');

            var name;
            var type;
            var value;


            document.addEventListener('DOMContentLoaded', function() {

                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('dynamicimage')) {
                        slider(event.target.getAttribute('data-value'))
                    }

                    if (event.target.classList.contains('dynamicvideo')) {
                        slidervideo(event.target.getAttribute('data-value'))
                    }

                });

                // for delete image
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('deleteimagee')) {
                        // If the clicked element has the class 'dynamicdelte' (i.e., an image),
                        // open a modal to display the image
                        console.log('hi');
                        console.log(event.target.name);
                        deleteimagedata(event.target.name);

                    }
                    if (event.target.classList.contains('deletevideo')) {
                        // If the clicked element has the class 'dynamicdelte' (i.e., an image),
                        // open a modal to display the image
                        console.log('hi');
                        console.log(event.target.getAttribute('data-video-name'));
                        deletevideodata(event.target.getAttribute('data-video-name'));

                    }
                });


                // for status change
                document.addEventListener('click', function(event) {
                    if (event.target.classList.contains('statuschange')) {
                        // If the clicked element has the class 'statuschange' (i.e., an image),
                        // open a modal to display the image
                        console.log('hi');

                        let btn = document.getElementsByClassName('statuschange')[0];
                        if (btn.innerText == 'Active') {
                            btn.innerText = 'InActive';
                            btn.classList.remove('btn-primary')
                            btn.classList.add('btn-danger')
                        } else if (btn.innerText == 'InActive') {
                            btn.innerText = 'Active';
                            btn.classList.remove('btn-danger')
                            btn.classList.add('btn-primary')
                        }

                        console.log(btn.innerText);


                        let elementsArray = Array.from(document.getElementsByClassName('deleteimagee'));

                        elementsArray.forEach(element => {
                            console.log(element.name); // Access the name property of each element
                            let url = `<?= base_url() ?>index.php/Digitalfile/updatestatus`;
                            console.log(url);

                            let formdata = new FormData();
                            formdata.append('Status', btn.innerText)
                            formdata.append('id', element.name)

                            console.log(formdata);
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
                                    window.location.reload();
                                })

                        });
                    }
                });


            })

            function slider(selectedidofimage) {
                console.log(selectedidofimage)

                let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
                let carouselinner = document.getElementsByClassName('carousel-inner')[0];
                carouselindicators.innerHTML = '';
                carouselinner.innerHTML = '';
                console.log(carouselindicators);
                let dynamicimages = document.getElementsByClassName('dynamicimage');
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

            function slidervideo(selectedidofimage) {
                console.log(selectedidofimage)

                let carouselindicators = document.getElementsByClassName('carousel-indicators')[0];
                let carouselinner = document.getElementsByClassName('carousel-inner')[0];
                carouselindicators.innerHTML = '';
                carouselinner.innerHTML = '';
                console.log(carouselindicators);
                let dynamicvideo = document.getElementsByClassName('dynamicvideo');
                Array.from(dynamicvideo).forEach((ele, index) => {
                    // Create carousel indicator button
                    let newbtn = document.createElement('button');
                    newbtn.setAttribute('data-bs-target', '#carouselExampleIndicators');
                    newbtn.setAttribute('data-bs-slide-to', index);
                    newbtn.setAttribute("aria-label", "Slide " + (index + 1));
                    if (index == selectedidofimage) {
                        newbtn.setAttribute("aria-current", "true");
                        newbtn.classList.add("active");
                    }
                    carouselindicators.appendChild(newbtn);

                    // Create carousel item div
                    let innerdiv = document.createElement('div');
                    innerdiv.classList.add('carousel-item');
                    if (index == selectedidofimage) {
                        innerdiv.classList.add('active');

                    }
                    // Create video element
                    let innervideo = document.createElement('video');
                    innervideo.src = ele.src;
                    innervideo.name = ele.name;


                    innervideo.classList.add('d-block', 'w-100'); // Ensure video takes full width
                    innervideo.controls = true; // Add controls to video

                    // Create control buttons div
                    let innervideodiv = document.createElement('div');
                    innervideodiv.classList.add('row', 'p-3', 'justify-content-between', 'border-bottom', 'mb-3');

                    // Download button
                    let a = document.createElement('a');
                    a.classList.add('btn', 'btn-outline-success');
                    a.style.width = 'fit-content';
                    a.innerHTML = '<i class="bx bxs-download"></i>';
                    a.href = ele.src;
                    a.download = ele.name;

                    // Close button
                    let bt = document.createElement('button');
                    bt.classList.add('btn', 'mt-2', 'mx-3', 'p-2', 'btn-warning');
                    bt.innerHTML = `<i class='bx bx-x'></i>`;
                    bt.setAttribute('data-bs-dismiss', 'modal')
                    bt.style.width = 'fit-content';

                    // Append buttons to control div
                    innervideodiv.appendChild(a);
                    innervideodiv.appendChild(bt);

                    // Append control div and video to carousel item
                    innerdiv.appendChild(innervideodiv);
                    innerdiv.appendChild(innervideo);

                    // Append carousel item to carousel inner
                    carouselinner.appendChild(innerdiv);
                });
                console.log(carouselindicators);
                console.log(carouselinner);
            }

            function deleteimagedata(id) {

                let a = confirm("Are you sure you want to delete the image");
                if (a) {
                    let formdata = new FormData();
                    formdata.append('id', id)
                    let url = `<?= base_url('index.php/Digitalfile/deleteparticularimage') ?>`;
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
                            window.location.reload();
                        })
                        .catch(error => {
                            console.error('There was a problem with your fetch operation:', error);
                        });
                } else {
                    window.location.reload();
                }
            }


            function deletevideodata(id) {

                let a = confirm("Are you sure you want to delete the Video");
                if (a) {
                    let formdata = new FormData();
                    formdata.append('id', id)
                    let url = `<?= base_url('index.php/Digitalfile/deleteparticularimage') ?>`;
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
                            window.location.reload();
                        })
                        .catch(error => {
                            console.error('There was a problem with your fetch operation:', error);
                        });
                } else {
                    window.location.reload();
                }
            }

            function showimage(name, type, clientid) {
                this.name = name;
                this.value = clientid;
                this.type = type;
                viewmodel.innerHTML = '';
                console.log(name)
                console.log(type)
                console.log(clientid)

                let formdata = new FormData();
                formdata.append('Name', name)
                formdata.append('Type', type)
                formdata.append('Client_id', clientid)

                // console.log(formdata);
                let url = `<?= base_url('index.php/Digitalfile/showimage') ?>`;
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
                        // Handle the JSON data received from the controller
                        console.log(data);
                        let key = document.createElement('td');
                        let value = document.createElement('td');
                        let tr = document.createElement('tr');
                        data.forEach(element => {




                            let tr = document.createElement('tr');
                            let tr1 = document.createElement('tr');
                            let tr2 = document.createElement('tr');

                            // Create table cells for 'Name' and 'Type'
                            let nameCell = document.createElement('td');
                            nameCell.innerText = 'Name';
                            tr.appendChild(nameCell);

                            let valueName = document.createElement('td');
                            valueName.innerText = element[0]['Name'];
                            tr.appendChild(valueName);

                            let typeCell = document.createElement('td');
                            typeCell.innerText = 'Type';
                            tr1.appendChild(typeCell);

                            let valueType = document.createElement('td');
                            valueType.innerText = element[0]['Type'];
                            tr1.appendChild(valueType);


                            let statusCell = document.createElement('td');
                            statusCell.innerText = 'Status';
                            tr2.appendChild(statusCell);

                            let valueStatus = document.createElement('td');
                            valueStatus.innerText = element[0]['Status'];
                            tr2.appendChild(valueStatus);






                            // Append the row to the viewmodel
                            viewmodel.appendChild(tr);
                            viewmodel.appendChild(tr1);
                            viewmodel.appendChild(tr2);

                            let newRow = document.createElement('tr');
                            let filesCell = document.createElement('td');
                            filesCell.innerText = 'Files';
                            filesCell.colSpan = 2;
                            newRow.appendChild(filesCell);
                            viewmodel.appendChild(newRow);


                            let rowforimage = document.createElement('tr');
                            let colforimage = document.createElement('td');
                            colforimage.colSpan = 2;
                            let i = 0;
                            let v = 0;
                            element.forEach(e => {
                                if (e.file == '.jpeg' || e.file == '.jpg' || e.file == '.png'  ||e.file == '.JPEG' || e.file == '.JPG' || e.file == '.PNG'  ) {
                                    let btnimage = document.createElement('button');
                                    let img = document.createElement('img');
                                    img.src = `<?= base_url() ?>/DigitalFiles/${e.image}`;
                                    img.name = e.image;
                                    img.classList.add('dynamicimage');
                                    img.setAttribute('data-value', i)
                                    btnimage.classList.add('mx-2');
                                    btnimage.appendChild(img)
                                    btnimage.classList.add('d-inline')
                                    btnimage.setAttribute('data-bs-toggle', 'modal');
                                    btnimage.setAttribute('data-bs-target', '#iamgeview');
                                    colforimage.appendChild(btnimage);
                                    i++;
                                } else {
                                    let btnimage = document.createElement('button');
                                    let video = document.createElement('video');
                                    video.src = `<?= base_url() ?>/DigitalFiles/${e.image}`;
                                    video.name = e.image;
                                    video.classList.add('dynamicvideo');
                                    video.setAttribute('data-value', v)
                                    btnimage.classList.add('mx-2');
                                    btnimage.appendChild(video)
                                    btnimage.classList.add('d-inline')
                                    btnimage.setAttribute('data-bs-toggle', 'modal');
                                    btnimage.setAttribute('data-bs-target', '#iamgeview');
                                    colforimage.appendChild(btnimage);
                                    v++;
                                }
                            });
                            rowforimage.appendChild(colforimage);
                            viewmodel.appendChild(rowforimage);
                        });

                    })
                    .catch(error => {
                        // Handle errors
                        console.error('There was a problem with your fetch operation:', error);
                    });


            }

            function deltedata(name, type, clientid) {
                // viewmodel.innerHTML = '';
                console.log(name)
                console.log(type)
                console.log(clientid)

                let formdata = new FormData();
                formdata.append('Name', name)
                formdata.append('Type', type)
                formdata.append('Client_id', clientid)

                // console.log(formdata);
                let url = `<?= base_url('index.php/Digitalfile/deletedata') ?>`;
                fetch(url, {
                        method: 'POST',
                        body: formdata
                    })
                    // .then(response => {
                    //     if (!response.ok) {
                    //         throw new Error('Network response was not ok');
                    //     }
                    //     return response.json();
                    // })
                    .then(() => {
                        console.log();
                        window.location.reload();
                    }).catch(error => {
                        console.error('There was a problem with your fetch operation:', error);
                    });
            }

            function deleteimage(name, type, clientid) {

                viewmodel.innerHTML = '';
                console.log(name)
                console.log(type)
                console.log(clientid)

                let formdata = new FormData();
                formdata.append('Name', name)
                formdata.append('Type', type)
                formdata.append('Client_id', clientid)

                // console.log(formdata);
                let url = `<?= base_url('index.php/Digitalfile/showimage') ?>`;
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
                        // Handle the JSON data received from the controller
                        console.log(data);
                        let key = document.createElement('td');
                        let value = document.createElement('td');
                        let tr = document.createElement('tr');
                        data.forEach(element => {

                            let tr = document.createElement('tr');
                            let tr1 = document.createElement('tr');
                            let tr2 = document.createElement('tr');

                            // Create table cells for 'Name' and 'Type'
                            let nameCell = document.createElement('td');
                            nameCell.innerText = 'Name';
                            tr.appendChild(nameCell);

                            let valueName = document.createElement('td');
                            valueName.innerText = element[0]['Name'];
                            tr.appendChild(valueName);

                            let typeCell = document.createElement('td');
                            typeCell.innerText = 'Type';
                            tr1.appendChild(typeCell);

                            let valueType = document.createElement('td');
                            valueType.innerText = element[0]['Type'];
                            tr1.appendChild(valueType);



                            let statusCell = document.createElement('td');
                            statusCell.innerText = 'Status';
                            tr2.appendChild(statusCell);

                            let valueStatus = document.createElement('td');
                            let btn = document.createElement('button');
                            btn.innerText = element[0]['Status'];
                            btn.classList.add('btn')

                            if (btn.innerText == 'Active') {
                                btn.classList.add('btn-primary')
                            } else if (btn.innerText == 'InActive') {
                                btn.classList.add('btn-danger')
                            }


                            btn.classList.add('statuschange')
                            valueStatus.appendChild(btn);
                            tr2.appendChild(valueStatus);



                            // Append the row to the viewmodel
                            viewmodel.appendChild(tr);
                            viewmodel.appendChild(tr1);
                            viewmodel.appendChild(tr2);

                            let newRow = document.createElement('tr');
                            let filesCell = document.createElement('td');
                            filesCell.innerText = 'Files';
                            filesCell.colSpan = 2;
                            newRow.appendChild(filesCell);
                            viewmodel.appendChild(newRow);


                            let rowforimage = document.createElement('tr');
                            let colforimage = document.createElement('td');
                            colforimage.colSpan = 2;
                            element.forEach(e => {
                                // console.log(e.image);
                                console.log(e);

                                if (e.file == '.jpeg' || e.file == '.jpg' || e.file == '.png' ||e.file == '.JPEG' || e.file == '.JPG' || e.file == '.PNG') {

                                    let btnimage = document.createElement('button');
                                    let img = document.createElement('img');
                                    img.src = `<?= base_url() ?>/DigitalFiles/${e.image}`;
                                    img.name = e.id;
                                    img.classList.add('deleteimagee');
                                    btnimage.classList.add('mx-2');
                                    btnimage.appendChild(img)
                                    btnimage.classList.add('d-inline')
                                    // btnimage.classList.add('deleteimagee');
                                    colforimage.appendChild(btnimage);

                                } else {
                                    let btnimage = document.createElement('button');
                                    let video = document.createElement('video');
                                    video.src = `<?= base_url() ?>/DigitalFiles/${e.image}`;
                                    video.setAttribute('data-video-name', e.id);
                                    video.classList.add('deletevideo');
                                    btnimage.classList.add('mx-2');
                                    btnimage.appendChild(video)
                                    btnimage.classList.add('d-inline')
                                    // btnimage.classList.add('deleteimagee');
                                    colforimage.appendChild(btnimage);
                                }


                            });
                            rowforimage.appendChild(colforimage);
                            viewmodel.appendChild(rowforimage);
                        });

                    })
                    .catch(error => {
                        // Handle errors
                        console.error('There was a problem with your fetch operation:', error);
                    });


            }

            // // Wait for the document to be fully loaded
            // document.addEventListener('DOMContentLoaded', function() {
            //     // Select the drop zone and file input elements
            //     const dropZone = document.getElementById('dropZone');
            //     const fileInput = document.getElementById('fileInput');
            //     const preview = document.getElementById('preview');

            //     // Prevent default behavior for drag events
            //     dropZone.addEventListener('dragover', function(e) {
            //         e.preventDefault();
            //         dropZone.classList.add('drag-over');
            //     });

            //     dropZone.addEventListener('dragleave', function() {
            //         dropZone.classList.remove('drag-over');
            //     });

            //     dropZone.addEventListener('drop', function(e) {
            //         e.preventDefault();
            //         dropZone.classList.remove('drag-over');

            //         const files = e.dataTransfer.files;
            //         handleFiles(files);
            //     });

            //     // Add an event listener to the file input for change event
            //     fileInput.addEventListener('change', function() {
            //         const files = fileInput.files;
            //         handleFiles(files);
            //     });

            //     // Function to handle selected files
            //     function handleFiles(files) {
            //         // Clear previous previews
            //         preview.innerHTML = '';

            //         // Loop through each selected file
            //         Array.from(files).forEach(file => {
            //             const filePreview = document.createElement('div');
            //             filePreview.classList.add('file-preview');

            //             // Check if the file is an image
            //             if (file.type.startsWith('image/')) {
            //                 const img = document.createElement('img');
            //                 img.classList.add('preview-image');
            //                 img.src = URL.createObjectURL(file);
            //                 filePreview.appendChild(img);
            //             } else if (file.type.startsWith('video/')) {
            //                 const video = document.createElement('video');
            //                 video.classList.add('preview-video');
            //                 video.src = URL.createObjectURL(file);
            //                 video.controls = true;
            //                 filePreview.appendChild(video);
            //             }

            //             preview.appendChild(filePreview);
            //         });
            //     }
            // });
            // Wait for the document to be fully loaded
            document.addEventListener('DOMContentLoaded', function() {
                // Select the drop zone and file input elements
                const dropZone = document.getElementById('dropZone');
                const fileInput = document.getElementById('fileInput');
                const preview = document.getElementById('preview');

                // Prevent default behavior for drag events
                dropZone.addEventListener('dragover', function(e) {
                    e.preventDefault();
                    dropZone.classList.add('drag-over');
                });

                dropZone.addEventListener('dragleave', function() {
                    dropZone.classList.remove('drag-over');
                });

                dropZone.addEventListener('drop', function(e) {
                    e.preventDefault();
                    dropZone.classList.remove('drag-over');

                    const files = e.dataTransfer.files;
                    handleFiles(files);
                });

                // Add an event listener to the drop zone for click event
                dropZone.addEventListener('click', function() {
                    fileInput.click(); // Trigger the file input click event
                });

                // Add an event listener to the file input for change event
                fileInput.addEventListener('change', function() {
                    const files = fileInput.files;
                    handleFiles(files);
                });

                // Function to handle selected files
                function handleFiles(files) {
                    // Clear previous previews
                    preview.innerHTML = '';

                    // Loop through each selected file
                    Array.from(files).forEach(file => {
                        const filePreview = document.createElement('div');
                        filePreview.classList.add('file-preview');

                        // Check if the file is an image
                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.classList.add('preview-image');
                            img.src = URL.createObjectURL(file);
                            filePreview.appendChild(img);
                        } else if (file.type.startsWith('video/')) {
                            const video = document.createElement('video');
                            video.classList.add('preview-video');
                            video.src = URL.createObjectURL(file);
                            video.controls = true;
                            filePreview.appendChild(video);
                        }

                        preview.appendChild(filePreview);
                    });
                }
            });
        </script>


</body>

</html>