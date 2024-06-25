<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


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

        .home-section {
            margin-top: 2%;
        }
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>
    <section class="home-section">
        <!-- Button to trigger the popup -->
        <button class="add-new-button">
            <a href="<?php echo base_url() ?>index.php/Admin/Admin_Groupchat/add"><i class='bx bxs-message-alt-add'></i>ADD</a>
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
                        <th>Group</th>
                        <th>NAME</th>
                        <th>MEMBER</th>
                        <th>CREATED ON</th>
                        <th>STATUS</th>
                        <th colspan="2">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($values)) {
                        foreach ($values as $key) {

                            // echo $key;
                            $Name = '';
                            $created_on = '';
                            $Status = '';
                            $sum = 0;

                            foreach ($data as $da) {
                                foreach ($da as $minidata) {

                                    if ($key == $minidata['Groupid']) {
                                        $Name = $minidata['Name'];
                                        $created_on = $minidata['created_on'];
                                        $Status = $minidata['Status'];
                                        $sum = $sum + 1;
                                    }
                                }
                            }
                            // echo "<br>";
                            // echo $Name;
                            // echo "<br>";
                            // echo $created_on;
                            // echo "<br>";
                            // echo $Status;
                            // echo "<br>";
                            // echo "<br>";

                            echo "<tr>";
                            echo "<td>$key</td>";
                            echo "<td>Group </td>";
                            echo "<td>$Name</td>"; // Add your Name column data here
                            echo "<td>$sum</td>"; // Display the sum of Members
                            echo "<td>$created_on</td>";
                            // Add your Created On column data here
                            // echo   "<input type='hidden' value ='$Status' >";
                            // echo "<td>$Status</td>"; // Add your Status column data here
                            echo "<td><button class='btn status-btn' data-status='$Status'   data-bs-toggle='modal' data-bs-target='#exampleModal' onclick ='statuschange(`$Status`, `$key`)'>$Status</button></td>"; // Add your Actions column data here
                            echo "<td><a href='" . base_url() . "index.php/Admin/Admin_Groupchat/update/$key' class='btn btn-primary'><i class='bx bxs-message-alt-edit'></i></a></td>"; // Add your Actions column data here
                            //  Add your Actions column data here
                            echo "<td><a href='" . base_url() . "index.php/Admin/Admin_Groupchat/View/$key' class='btn btn-info'><i class='bx bxs-low-vision' ></i></a></td>"; // Add your Actions column data here
                            echo "</tr>";
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="8">no record found</td>
                        </tr>
                    <?php } ?>
                </tbody>


            </table>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row text-center">
                            <h5>Are You Sure You Want To Make Changes</h5>
                            <input type="hidden" id="popstatusinput">
                            <input type="hidden" id="popstatusinputid">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="changeHappen()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script>
        const popstatusinput = document.getElementById('popstatusinput');
        const popstatusinputid = document.getElementById('popstatusinputid');

        function statuschange(status, ID) {
            if (status == 'InActive') {
                popstatusinput.value = 'Active';
            } else if (status == 'Active') {
                popstatusinput.value = 'InActive';
            }
            popstatusinputid.value = ID;
        }

        document.addEventListener('DOMContentLoaded', () => {
            const statusButtons = document.querySelectorAll('.status-btn');
            statusButtons.forEach(button => {
                const status = button.getAttribute('data-status');
                if (status === 'InActive') {
                    button.classList.add('btn-danger');
                } else if (status === 'Active') {
                    button.classList.add('btn-success');
                }
            });
        });

        function changeHappen() {
            // alert('The Status is '+ popstatusinput.value + ' And The Group Id is '+popstatusinputid.value);

            let formData = new FormData();
            formData.append('Status', popstatusinput.value);
            formData.append('Groupid', popstatusinputid.value);

            let url = `<?= base_url() ?>index.php/Groupchat/ChangeStatus`;


            fetch(url, {
                method: 'POST',
                body: formData
            }).then((res) => {
                // console.log(res);
                return res.json();
            }).then((res) => {
                // console.log('res');
                console.log(res);
                window.location.reload();
            }).catch((err) => {
                console.log(err);
            })
        }
    </script>
</body>

</html>