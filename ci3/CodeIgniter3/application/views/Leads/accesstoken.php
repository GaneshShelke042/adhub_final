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
        /* Adjust padding to change button size */
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        margin-bottom: 6px;
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

    .add-new-button {
        position: absolute;
        top: 10px;
        right: 10px;
        margin-right: 20px;
    }

    .accesstoken {
        max-width: 500px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->


        <div class="container">
            <!-- New button added for adding new entries -->
            <!-- <button class="add-new-button" data-bs-toggle="modal" data-bs-target="#addmodal">
                <i class="fas fa-plus"></i> Add New</a>
            </button> -->


            <!-- Search bar -->
            <div class="search-container">
                <input type="text" id="searchInput" placeholder="Search...">
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Accesstoken</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <td id="id"><?= $Accesstoken->id ?></td>
                        <td class="accesstoken" id="token"> <?= $Accesstoken->Accesstoken ?> </td>
                        <td>


                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodel" onclick="editmodeldata()">Edit</button>

                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </section>



    <!-- Add Modal -->
    <!-- <div class="modal fade" id="addmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url() . 'index.php/Leads/accesstoken' ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Accesstoken" class="form-label">Enter Access token</label>
                            <textarea class="form-control" id="Accesstoken" rows="3" name="Accesstoken"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div> -->

    <!-- edit model -->

    <div class="modal fade" id="editmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Model</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo base_url() . 'index.php/Leads/editAccesstoken' ?>" method="post" id="editformaccess">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="editAccesstoken" class="form-label">Enter Access token</label>
                            <textarea class="form-control" id="editAccesstoken" rows="3" name="editAccesstoken"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function editmodeldata()
        {
            let str = document.getElementById("token").innerText;
            let id = document.getElementById("id").innerText;
            console.log(str);
            let editAccesstoken = document.getElementById("editAccesstoken");
            editAccesstoken.innerText = str;
            let editformaccess = document.getElementById('editformaccess');
            console.log(editformaccess.action);
            editformaccess.action = "http://localhost/adhub/ci3/CodeIgniter3/index.php/Leads/editAccesstoken" + "/" + id;
            console.log(editformaccess.action);
        }
    </script>
</body>

</html>