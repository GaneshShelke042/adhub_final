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

        .sub-body {
            padding: 20px;
            margin: 10% auto;
            width: 50%;
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

        .close-pop {
            position: absolute;
            top: 15%;
            right: 20%;
            cursor: pointer;
            font-size: 40px;
            color: #fff;
            padding: 5px;
            border-radius: 50%;
            z-index: 999;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <section class="home">
        <div class="body">
            <div class="sub-body">
                <form method="post" name="AddNewClient" action="<?php echo base_url().'index.php/CR_Writer/Cr_Package_GSTContro/addnewpackage'?>">
                    <span class="close-pop" onclick="closePopup()">&times;</span>
                    <div class="fields">
                        <div class="input-field" style="width: 40%;  padding-left: 30px;">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" required>
                        </div>
                        <div class="input-field" style="width: 25%; padding-left: 30px;">
                            <label for="status">Status:</label>
                            <select id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="input-field" style="width: 25%; padding-left: 25px;">
                            <label for="Parent">CGST(%)</label>
                            <input type="number" placeholder="Enter CGST" name="cgst" required oninput="calculateTotal()">
                        </div>
                        <div class="input-field" style="width: 25%; padding-left: 25px;">
                            <label for="Parent">SGST(%)</label>
                            <input type="number" placeholder="Enter SGST" name="sgst" required oninput="calculateTotal()">
                        </div>
                        <div class="input-field" style="width: 15%; padding-left: 20px;">
                            <label for="Parent">Total(%)</label>
                            <input type="number" placeholder="Total" name="total" required id="total">
                        </div>
                    </div>
                    <div class="button-container">
                        <button class="submit-button"  name="Submit" value="submit">
                            <span>Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                        <button class="delete-button"  name="close" value="close" onclick="cancelAction()">
                            <span>Close</span>
                            <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
       function calculateTotal() {
    var cgst = parseFloat(document.getElementsByName('cgst')[0].value);
    var sgst = parseFloat(document.getElementsByName('sgst')[0].value);
    var total = cgst + sgst;
    document.getElementsByName('total')[0].value = total;
}


        function cancelAction() {
            // Redirect the page to the desired URL
            window.location.href = "your_desired_url_here";
        }
    </script>
</body>

</html>
