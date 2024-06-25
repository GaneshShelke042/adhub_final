<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General Styles */

        form {
            width: 80%;
            margin-top: 16px;
            margin-left: 15%;
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

        .error {
            color: red;
            font-size: 0.9em;
            display: none;
        }

        .error-message {
            color: red;
            display: none;
            margin-left: 30px;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <section class="home">
        <div class="body">
            <div class="sub-body">
                <form method="post" name="AddNewClient" action="<?php echo base_url() . 'index.php/UserRoleContro/updateData/' . $userData['id'] ?>">

                    <div class="fields">
                        
                        <div class="input-field" style="width: 80%;  padding-left: 30px;">
                                <label for="new-password" style="margin-left: -70%">New Password</label>
                                <input type="password" id="new-password" name="password" placeholder="New Password" required>
                            </div>
                            <div class="input-field" style="width: 80%;  padding-left: 30px;">
                                <label for="confirm-password" style="margin-left: -55%">Confirm New Password</label>
                                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm New Password" required>
                            </div>
                            <div class="error-message" id="error-message">Passwords do not match.</div>

                            <div class="input-field" style="width: 80%;  padding-left: 30px;">
                                <label style="margin-left: -65%">Admin Password</label>
                                <input type="password" name="admin_password" placeholder="Admin Password" required>
                            </div>


                        </div>
                        <div class="button-container">
                            <button class="submit-button" name="Submit" value="submit">
                                <span>Submit</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                            <button class="delete-button" name="close" value="close" onclick="cancelAction()">
                                <span>Close</span>
                                <i class="uil uil-navigator"></i>
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </section>
    <script>

const newPasswordInput = document.getElementById('new-password');
        const confirmPasswordInput = document.getElementById('confirm-password');
        const errorMessage = document.getElementById('error-message');

        function validatePasswords() {
            if (newPasswordInput.value !== confirmPasswordInput.value) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        }

        newPasswordInput.addEventListener('input', validatePasswords);
        confirmPasswordInput.addEventListener('input', validatePasswords);
        function cancelAction() {
            // Redirect the page to the desired URL
            window.location.href = "viewRoles";
        }
    </script>
</body>

</html>