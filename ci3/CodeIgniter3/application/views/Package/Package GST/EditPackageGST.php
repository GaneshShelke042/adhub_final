<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Styles */

        form {
            margin-top: 16px;
            background-color: #fff;
            overflow: hidden;
            border-radius: 8px;
            /* box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1); */
            padding: 20px;
        }

        .input-field {
            margin-bottom: 20px;
        }

        .fields {
            display: flex;
            flex-wrap: wrap;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            width: auto;
            margin: 4px 0;
        }

        input,
        select,
        textarea {
            outline: none;
            font-size: 14px;
            font-weight: 400;
            color: #333;
            border-radius: 5px;
            border: 1px solid #aaa;
            padding: 0 15px;
            height: 42px;
            margin: 8px 0;
        }

        input:is(:focus, :valid) {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.13);
        }

        /* Form Layout */


        .sub-body {
            padding: 20px;
            margin: 10% auto;
            /* Centering content vertically and horizontally */
            width: 50%;
            /* Adjust the width as needed */

        }

       
        .button-container {
            display: flex;
            justify-content: center;
        }

        .button-container button {
            margin: 0 10px;
            text-align: center;
        }

        .delete-button {
            background-color: #FFA500;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
        }

        .submit-button {
            border-radius: 4px;
            cursor: pointer;
        }

        .button {
            text-align: center;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            .input-field {
                width: 100%;
                /* Make input fields full width on smaller screens */
            }
        }

        .close-pop {
    position: absolute;
    top: 15%;
    right: 20%;
    cursor: pointer;
    font-size: 40px;
    color: #fff; /* Change color as needed */
    padding: 5px; /* Adjust padding as needed */
    border-radius: 50%; /* Make it round */
    z-index: 999; /* Ensure it appears above other content */
}

    </style>

    <title>Document</title>
</head>

<body>
    <section class="home">
        <div class="body">
        
            <div class="sub-body">
           
                <form method="post" action="<?php echo site_url('index.php/Package_GSTContro/updateData/' . $userData['id']); ?>">
                <span class="close-pop" onclick="closePopup()">&times;</span>
                    <div class="fields">

                        <div class="input-field" style="width: 40%;  padding-left: 30px;">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name"  value="<?php echo set_value('name', $userData['name']); ?>"  required>
                        </div>


                        <div class="input-field" style="width: 25%; padding-left: 30px;">
                            <label for="status">Status:</label>
                            <select id="status" name="status">
                            <option value="1" <?php echo ($userData['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                                <option value="0" <?php echo ($userData['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>
                            </select>
                        </div>


                        <div class="input-field" style="width: 25%; padding-left: 25px;">
                            <label for="Parent">CGST(%)</label>
                            <input type="number" placeholder="Enter CGST" name="cgst"  value="<?php echo $userData['cgst']; ?>"   required>
                        </div>

                        <div class="input-field" style="width: 25%; padding-left: 25px;">
                            <label for="Parent">SGST(%)</label>
                            <input type="number" placeholder="Enter SGST" name="sgst"  value="<?php echo $userData['sgst']; ?>"    required>
                        </div>

                        <div class="input-field" style="width: 15%; padding-left: 20px;">
                            <label for="Parent">Total(%)</label>
                            <input type="text" placeholder="Total" name="total"  value="<?php echo $userData['total']; ?>"    required>
                        </div>
                    </div>
                    <div class="button-container">
                        <button class="submit-button"  name="Submit" value="submit">
                            <span>Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>

                        <button class="delete-button"  name="close" value="close">
                            <span>Close</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                    

                </form>



                <!-- <div class="button" style="margin-top: -15%;">
                    <button class="submit-button" onclick="submitForm()">
                        <span>Submit</span>
                        <i class="uil uil-navigator"></i>
                    </button>

                    <button class="delete-button" onclick="closePopup()">
                        <span>Close</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                </div> -->
            </div>
        </div>
    </section>

</body>

</html>