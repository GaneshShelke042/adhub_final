<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-x7G2g6iWGBnhi6KP0O8eSbLcAOeyUby4pb6L2f44rnAXU6cfJjsh5i86rVrbcA6OaYpH6PhTc1Gi9aKafDGEtVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            margin-right: 15PX;
            border: 1px solid #ccc;
            border-radius: 8px;

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
            background-color: #00008B;
            color: #fff;
            border: none;
            padding: 10px 15px;
            /* Adjust padding to change button size */
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            margin-bottom: 6px;
        }

        button.hold {
            background-color: #ffcc00;
        }

        button.permission {
            background-color: #3c3f98;
        }

        button.details {
            background-color: #3198d5;
        }

        button.delete {
            background-color: #dc0030;
        }

        button.unhold {
            background-color: #e68a00;
        }

        button.active {
            background-color: #00cc00;
        }

        button.edit {
            background-color: #2c72ca;
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
            top: 90px;
            right: 5%;
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

        .home-section {
            width: 100%;
            margin-top: 1%;
        }

        .btn-success {
            background-color: #28a745;
            border-radius: 5px;
            padding: 5px;
            color: #ffff
        }

        .btn-danger {
            background-color: #ff473d;
            border-radius: 5px;
            padding: 5px;
            color: #ffff;
        }

        a {
            color: #ffff;
        }

        .hold {
            background-color: #ffcc00;
            border-radius: 5px;
            padding: 5px;
            color: #ffff
        }

        .main-content {

            margin: 0;
            width: 100%;
            margin: 20px auto;
            margin-top: 0px;
            background-color: #efefef;
            overflow: hidden;
            padding: 40px 30px 30px 30px;

        }

        .box-container {
            /* display: flex; */
            /* justify-content: space-evenly;  */
            width: 100%;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 20px;

        }
        .close-pop {
            /* position: absolute; */
            margin-left: 90%;
            top: 15%;
            right: 30%;
            cursor: pointer;
            font-size: 40px;
            color: #972222;
            padding: 5px;
            border-radius: 50%;
            z-index: 999;
        }
    </style>

    <title>Extended Table with Buttons</title>
</head>

<body>

    <section class="home-section">
        <div class="main-content">
            <div class="box-container">


                <div class="container">
                    <!-- New button added for adding new entries -->
                    <span class="close-pop" onclick="closePopup()">&times;</span>

                    <!-- Search bar -->

                    <table>
                        <thead>
                            <tr>

                                <th>question</th>
                                <th>ans</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample row, you can dynamically generate rows using JavaScript -->

                            <?php
                            if (!empty($Ans)) {
                                foreach ($Ans as $userData) {
                                    foreach ($question as $Que) {
                                        foreach ($addnewclient1 as $client_id) {
                                            if ($client_id['id'] == $userData['client_id'] && ($Que['requirement']) == trim($userData['form_name'])) {
                                                // Split the 'question' and 'ans' fields by commas
                                                $questions = explode(',', $userData['question']);
                                                $answers = explode(',', $userData['ans']);

                                                // Get the maximum count of split parts to ensure both arrays are iterated properly
                                                $maxCount = max(count($questions), count($answers));

                                                for ($i = 0; $i < $maxCount; $i++) {
                                                    $questionPart = isset($questions[$i]) ? trim($questions[$i]) : '';
                                                    $answerPart = isset($answers[$i]) ? trim($answers[$i]) : '';
                            ?>
                                                    <tr>
                                                        <td><?php echo $questionPart; ?></td>
                                                        <td><?php echo $answerPart; ?></td>
                                                    </tr>
                                <?php
                                                }
                                                // Break out of the inner loops as we found the matching row
                                                break 2; // Break out of both $question and $addnewclient1 loops
                                            }
                                        }
                                    }
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="2">Record not found</td>
                                </tr>
                            <?php
                            }
                            ?>








                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



</body>

</html>