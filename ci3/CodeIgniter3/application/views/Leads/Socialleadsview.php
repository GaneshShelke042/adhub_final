<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .container {
        max-width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        /* margin-top: 70px; */
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
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        margin-bottom: 6px;
    }

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

    .add-new-button {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: 20px;
    }
</style>

<body>
    <section class="home-section">
        <div class="container">
            <button class="add-new-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                <a href="#"><i class="fas fa-plus"></i> Add New</a>
            </button>

            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client</th>
                        <th>Campaign</th>
                        <th>Total Leads</th>
                        <th>Network</th>
                        <th>Created ON</th>
                        <th>Status</th>
                        <th colspan="4">Actions</th>
                    </tr>
                </thead>
                <tbody>



                    <?php if (!empty($result)) {
                        foreach ($result as $r) {
                    ?>


                            <?php if (!empty($leads)) {
                                foreach ($leads as $l) {
                                    if ($r->id == $l['clients']) {

                            ?>
                                        <tr>
                                            <td><?php echo $l['id'] ?></td>

                                            <td> <?php
                                                    echo $r->brand_name;
                                                    ?></td>

                                            <td><?php echo $l['name'] ?></td>
                                            <td>leads</td>
                                            <td><?php echo $l['type'] ?></td>
                                            <td><?php echo $l['createdon'] ?></td>

                                            <td><button type="button" class="btn status-button" data-status="<?= $l['status'] ?>" data-ID="<?= $l['id'] ?>"><?php echo $l['status'] ?></button>
                                            </td>

                                            <td>
                                                <a class="btn btn-primary" onclick="editdata('<?= $l['id'] ?>','<?= $l['name'] ?>','<?= $l['clients'] ?>','<?= $l['formid'] ?>','<?= $l['mobileno'] ?>','<?= $l['type'] ?>','<?= $r->brand_name ?>')"><i class='bx bxs-message-square-edit' style='color:#ffffff'></i></a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url() . "index.php/Leads/Delete/" . $l["id"] ?>" class="btn btn-warning"><i class='bx bxs-trash' style='color:#ffffff'></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-success" onclick="viewdata('<?= $l['name'] ?>','<?= $l['status'] ?>','<?= $l['clients'] ?>','<?= $l['formid'] ?>','<?= $l['mobileno'] ?>','<?= $l['type'] ?>','<?= $l['createdon'] ?>','<?= $r->brand_name  ?>')"><i class='bx bxs-low-vision'></i></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="<?php echo base_url()."index.php/Leads/Fetchdata/" . $l["id"]  ?>"><i class='bx bxs-data' style='color:#e2dada'></i></a>
                                            </td>
                                        </tr>
                    <?php }
                                }
                            }
                        }
                    } ?>
                </tbody>
            </table>

            <!-- modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add New Campaign</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url() . "index.php/Leads/view/" . $type ?>" method="POST">
                            <div class="modal-body">
                                <div class="mb-3 row px-3">
                                    <div class="col-md-5">
                                        <label for="Name">Campaign Name</label>
                                        <input type="text" class="form-control" id="Name" name="name">
                                        <?= form_error("name") ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Status1">Status</label>
                                        <select class="form-select" id="Status1" name="status">
                                            <option selected disabled>Choose Status</option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                        <?= form_error("status") ?>

                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <div class="col-md-6">
                                        <label for="Clients1">Clients</label>
                                        <select class="form-select" id="Clients1" name="clients">
                                            <option selected disabled>Choose Client</option>
                                            <?php if (!empty($result)) {
                                                foreach ($result as $value) {
                                            ?>
                                                    <option value="<?= $value->id ?>"><?= $value->brand_name ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <?= form_error("clients") ?>

                                    </div>
                                    <div class="col-md-5">
                                        <label for="Form_id1">Form ID</label>
                                        <input type="text" class="form-control" id="Form_id1" name="formid">
                                        <?= form_error("formid") ?>

                                    </div>
                                </div>
                                <div class="mb-3 row px-3">
                                    <div class="col-md-5">
                                        <label for="mobileno1">Mobile No</label>
                                        <input type="text" class="form-control" id="mobileno1" name="mobileno">
                                        <?= form_error("mobileno") ?>

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- View data -->
            <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title viewdatabyname" id="staticBackdropLabel">View Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 row px-3">
                                <div class="col-md-5">
                                    <label for="viewName">Campaign Name</label>
                                    <input type="text" class="form-control" id="viewName" name="name" readonly>
                                </div>
                                <div class="col-md-5">
                                    <label for="viewStatus">Status</label>
                                    <input type="text" class="form-control" id="viewStatus" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row px-3">
                                <div class="col-md-5">
                                    <label for="viewClients">Clients</label>
                                    <input type="text" class="form-control" id="viewClients" readonly>
                                </div>
                                <div class="col-md-5">
                                    <label for="viewForm_id">Form ID</label>
                                    <input type="text" class="form-control" id="viewForm_id" name="formid" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row px-3">
                                <div class="col-md-5">
                                    <label for="viewMobileno">Mobile No</label>
                                    <input type="text" class="form-control" id="viewMobileno" name="mobileno" readonly>
                                </div>
                                <div class="col-md-5">
                                    <label for="viewCreatedOn">Created On</label>
                                    <input type="text" class="form-control" id="viewCreatedOn" name="mobileno" readonly>
                                </div>
                            </div>

                            <div class="mb-3 row px-3">
                                <div class="col-md-5">
                                    <label for="viewNetwork">Network</label>
                                    <input type="text" class="form-control" id="viewNetwork" name="mobileno" readonly>
                                </div>

                            </div>



                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Edit model -->


            <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title Editmodelclientname" id="staticBackdropLabel ">Edit Data </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <?php echo form_open(base_url() . "index.php/Leads/editdata") ?>
                        <div class="modal-body">


                            <div class="mb-3 row px-3">
                                <div class="col-md-12">
                                    <!-- <label for="editID">edit ID</label> -->
                                    <input type="text" class="form-control" id="editID" name="editID" hidden>
                                </div>
                            </div>


                            <div class="mb-3 row px-3">
                                <div class="col-md-5">
                                    <label for="editName">Campaign Name</label>
                                    <input type="text" class="form-control" id="editName" name="editName">
                                </div>
                                <div class="col-md-5">
                                    <label for="editClients">Clients</label>
                                    <input type="text" class="form-control" id="editClients" name="editClients" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row px-3">

                                <div class="col-md-5">
                                    <label for="editForm_id">Form ID</label>
                                    <input type="text" class="form-control" id="editForm_id" name="editForm_id">
                                </div>
                                <div class="col-md-5">
                                    <label for="editMobileno">Mobile No</label>
                                    <input type="text" class="form-control" id="editMobileno" name="editMobileno">
                                </div>
                            </div>
                            <div class="mb-3 row px-3">

                                <div class="col-md-5">
                                    <label for="edittype">Network</label>
                                    <input type="text" class="form-control" id="edittype" name="edittype">
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>



            <!-- status model -->

            <!-- Button trigger modal -->

            <!-- Modal -->

            <div class="modal fade" id="statusmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <?php echo form_open((base_url() . "index.php/Leads/editstatus")) ?>
                        <div class="modal-body ">
                            <div class="d-flex justify-content-center mb-3">
                                <i class="fa-solid fa-question" style="font-size: 5rem;"></i>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p style="font-size: 30px;">Are You Sure</p>
                            </div>

                            <div>
                                <input type="text" id="changablestatus" name="changablestatus" >
                                <input type="text" id="changableID" name="changableID" >
                            </div>

                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>






        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function viewdata(name, status, clients, formid, mobileno, type, createdon, viewdatabyname) {
            document.getElementById('viewName').value = name;
            document.getElementById('viewStatus').value = status;
            document.getElementById('viewClients').value = clients;
            document.getElementById('viewForm_id').value = formid;
            document.getElementById('viewMobileno').value = mobileno;
            document.getElementById('viewCreatedOn').value = createdon;
            document.getElementById('viewNetwork').value = type;
            console.log(document.getElementsByClassName('viewdatabyname')[0].innerText = "View Data " + viewdatabyname);

            // // Add additional fields if needed
            var myModal = new bootstrap.Modal(document.getElementById('view'), {
                keyboard: false
            });
            myModal.show();
        }


        function editdata(id, name, clients, formid, mobileno, type, editclientname) {
            document.getElementById('editID').value = id;
            document.getElementById('editName').value = name;
            // document.getElementById('editStatus').value = status;
            document.getElementById('editClients').value = clients;
            document.getElementById('editForm_id').value = formid;
            document.getElementById('editMobileno').value = mobileno;
            document.getElementById('edittype').value = type;
            // document.getElementById('Editmodelclientname').value += editclientname;
            console.log(document.getElementsByClassName('Editmodelclientname')[0].innerText = "Edit Data " + editclientname);

            // // Add additional fields if needed
            var myModaledit = new bootstrap.Modal(document.getElementById('edit'), {
                keyboard: false
            });
            myModaledit.show();
        }


        document.addEventListener('DOMContentLoaded', function() {
            const statusButtons = document.querySelectorAll('.status-button');

            statusButtons.forEach(button => {
                const status = button.getAttribute('data-status');
                changecolour(button, status);
            });

            function changecolour(button, status) {
                button.textContent = status; // Set the text content of the button

                // Set background color based on the value of status
                if (status === "Active") {
                    button.style.backgroundColor = "green";
                    button.style.color = "white";
                } else if (status === "Inactive") {
                    button.style.backgroundColor = "red";
                    button.style.color = "white";
                } else {
                    button.style.backgroundColor = "blue"; // Default color
                }
            }
        });

        let status = document.querySelectorAll(".status-button");

        status.forEach(button => {
            button.addEventListener('click', function() {
                const status = button.getAttribute('data-status');
                const Id = button.getAttribute('data-ID');
                console.log(status);
                console.log(Id);

                var myModalstatusmodel = new bootstrap.Modal(document.getElementById('statusmodel'), {
                    keyboard: false
                });
                let changablestatus = document.getElementById("changablestatus")
                let changableID = document.getElementById("changableID")
                changablestatus.value = status; // correct it
                if (changablestatus.value === "Active") {
                    changablestatus.value = "Inactive";
                    changableID.value = Id;
                } else if (changablestatus.value === "Inactive") {
                    changablestatus.value = "Active";
                    changableID.value = Id;
                }

                myModalstatusmodel.show();
            });
        })
    </script>
</body>

</html>