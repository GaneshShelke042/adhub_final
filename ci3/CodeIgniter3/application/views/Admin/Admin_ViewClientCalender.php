
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add Font Awesome CDN link -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            margin-right: 15PX;
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
            /* background-color: #00008B; */
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

        /* button.hold {
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
        } */
        button.edit {
            background-color: #ff9900;
        }
        button.delete {
            background-color: #8A0000;
        }
        button i {
            align-content: center;
            margin-right: 5px;
        }

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
        .home-section{
        margin-top: 2%;
       }
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>

    <section class="home-section">

    <?php
        if (!empty($addnewclient1)) {

            $id_from_url = $this->uri->segment(4); // Assuming the ID is the third segment in the URL

        ?>
            <button class="add-new-button" style="background-color: #00008B;"><a href="<?php echo base_url() . 'index.php/Admin/Admin_UpdateClientContro/genrateCalender/' . $id_from_url ?>"><i class="fas fa-plus"></i> Genrate Calender</a>
            </button>
        <?php
        }

        ?>

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
                        <th>From Day & Date</th>
                        <th>To Day & Date</th>
                        <th>Package</th>
                        <!-- <th>Type</th> -->
                        <th>Days</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Sample row, you can dynamically generate rows using JavaScript -->
                    <?php
                    if (!empty($result)) {
                        // Extracting the last date from the last element of the $result array


                        foreach ($result as $userData) {
                            foreach ($addnewclient1 as $package) {
                                // foreach ($addnewclient1 as $package) {
                                // Check if the URL ID matches the database field 'client_id'

                                if ($userData['Client_id'] == $id_from_url && $package['id'] == $id_from_url) {

                    ?>
                                    <tr>
                                        <td><?php echo $userData['id'] ?></td>
                                        <td><?php echo $userData['start_date'] ?></td>

                                        <td>
                                            <?php
                                            // Find the position of the last comma
                                            $lastCommaPosition = strrpos($userData['date_formatted'], ',');

                                            // Check if a comma exists
                                            if ($lastCommaPosition !== false) {
                                                // Extract the substring starting from the position after the last comma
                                                $substringAfterLastComma = substr($userData['date_formatted'], $lastCommaPosition + 1);

                                                // Trim the substring to remove any surrounding whitespace
                                                $substringAfterLastComma = trim($substringAfterLastComma);

                                                // Check if the substring after the last comma is empty
                                                if (!empty($substringAfterLastComma)) {
                                                    echo $substringAfterLastComma; // Output the substring after the last comma
                                                } else {
                                                    // If empty, extract the substring before the last comma
                                                    $substringBeforeLastComma = substr($userData['date_formatted'], 0, $lastCommaPosition);
                                                    // Find the position of the second to last comma
                                                    $secondToLastCommaPosition = strrpos($substringBeforeLastComma, ',');
                                                    if ($secondToLastCommaPosition !== false) {
                                                        // Extract the substring starting from the position after the second to last comma
                                                        $substringAfterSecondToLastComma = substr($substringBeforeLastComma, $secondToLastCommaPosition + 1);
                                                        echo trim($substringAfterSecondToLastComma); // Output the substring after the second to last comma
                                                    } else {
                                                        // If no second to last comma is found, display the entire substring before the last comma
                                                        echo $substringBeforeLastComma;
                                                    }
                                                }
                                            } else {
                                                // If no comma is found, display the original string
                                                echo $userData['date_formatted'];
                                            }
                                            ?>
                                        </td>


                                        <td><?php echo $package['package'] ?></td>
                                        <td><?php echo $userData['number_of_days'] ?></td>
                                        <td><?php echo $userData['Created_On'] ?></td>
                                        <td colspan="2" class="additional-buttons">
                                        <button class="edit">
                                            <a href="<?php echo base_url() . 'index.php/Admin/Admin_UpdateClientContro/editData/' . $userData['id'] ?>" class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </button>
                                        <button class="delete">
                                            <a href="<?php echo base_url() . 'index.php/Admin/Admin_UpdateClientContro/deleteData/' . $userData['delet_id'] ?>" class="btn btn-primary">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </button>
                                        <!--button class="chat">
                                            <a href="http://localhost/adhub/ci3/CodeIgniter3/index.php/User_con/clientDetails" class="btn btn-primary">
                                                <i class="fas fa-comments"></i>
                                            </a>
                                        </button-->
                                    </td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">record not found</td>
                        </tr>
                    <?php
                    }
                    ?>


                </tbody>
            </table>
        </div>
    </section>

    <script>
        function openLink() {
            window.location.href = "http://localhost/newc/bcit-ci-CodeIgniter-bcb17eb/index.php/user/client"; // Replace "https://example.com" with your desired URL
        }
    </script>


</body>

</html>