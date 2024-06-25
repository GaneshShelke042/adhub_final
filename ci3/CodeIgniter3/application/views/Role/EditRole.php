<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS for form layout */


        form {
            margin-top: 2%;
            background-color: #D5D6E2;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* CSS for dropdowns */
        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* CSS for checkboxes */
      

        .checkbox-container>div {

            flex: 1;
        }

        .checkbox-label {
            font-weight: bold;
            margin-left: 5px;
            color: #557ae9;
        }

        .checkbox-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
            vertical-align: middle;
        }

        /* CSS for submit button */
        .submit-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }

        .submit-btn:hover {
            background-color: #0056b3;
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

        .container {
            background-color: #fff;
            margin-left: 2%;
            width: 90%;
            height: fit-content;
            border-bottom-right-radius: 10px;
            border-bottom-left-radius: 10px;
        }



        .checkbox-label,
        .details-label {
            margin-left: 0px;
            width: 100%;
            display: block;
            background-color: blue;
            color: white;
            padding: 10px;
            font-size: 18px;
            text-align: center;
        }

        .checkbox-container {
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .checkbox-item {
            flex: 5 5 calc(50% - 50px);
            /* Two checkboxes per row */
            display: flex;
            align-items: center;
        }

        .checkbox-input {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <section class="home-section">
        <div class="main-content">
            <form method="POST">


                <h1>Update role</h1>

                <label for="name">Name:</label>
                <input type="text" name="Role_name" placeholder="Content Writer Teacher" value="<?php echo set_value('Role_name', $result['Role_name']); ?>">
                <!-- Status Dropdown -->
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="active" <?php echo ($result['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?php echo ($result['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                    <option value="pending" <?php echo ($result['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                </select>

                <!-- >KYC Dropdown -->
                <label for="kyc">KYC form:</label>
                <select id="kyc" name="kyc">
                    <option value="Agree" <?php echo ($result['kyc_form'] == 'Agree') ? 'selected' : ''; ?>>Agree</option>
                    <option value="Disagree" <?php echo ($result['kyc_form'] == 'Disagree') ? 'selected' : ''; ?>>Disagree</option>
                </select>

                <!-- Agreement Dropdown -->
                <label for="agreement">Agreement:</label>
                <select id="agreement" name="agreement">
                    <option value="agree" <?php echo ($result['agreement'] == 'Agree') ? 'selected' : ''; ?>>Agree</option>
                    <option value="disagree" <?php echo ($result['agreement'] == 'Disagree') ? 'selected' : ''; ?>>Disagree</option>
                </select>



                <!-- Checkboxes with separate titles and checkbox styles -->
                <section>
                    <div class="checkbox-container">


                        <div class="container">
                            <label for="checkbox" class="checkbox-label">Client</label>
                            <div class="checkbox-container">
                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Client']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Edit', 'Hold', 'Permission',
                                    'Details', 'Add_On', 'Status', 'delete'
                                );

                                // Additional checkboxes that depend on "Details"
                                $additionalCheckboxValues = array('54Question', 'TGForm', 'Requirement', 'lang', 'PainPoint', 'offer', 'complete_Calendar');

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Client[]" value="<?php echo $value ?>" <?php echo $isChecked ? 'checked' : ''; ?> class="checkbox-input" onchange="handleCheckboxChange(this, '<?php echo $value ?>')">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="container" id="details-label" style="display: none;">
                            <label for="checkbox1" class="checkbox-label" >Details</label>
                        

                        <div id="additional-checkboxes"class="checkbox-container" style="display: none;">
                            <?php
                            // Loop through each additional checkbox value and create the checkbox
                            foreach ($additionalCheckboxValues as $value) {
                                // Check if the current value exists in the database array
                                $isChecked = in_array($value, $dashboardValues);
                            ?>
                                <div class="checkbox-item">
                                    <input type="checkbox" id="checkbox<?php echo $value ?>" name="Client[]" value="<?php echo $value ?>" <?php echo $isChecked ? 'checked' : ''; ?> class="checkbox-input">
                                    <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                </div>
                            <?php } ?>
                        </div>
                        </div>
                        <!-- Container for displaying additional checkboxes -->



                       <div class="container">
                            <label for="checkbox1" class="checkbox-label">Calendar-Type</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Calendar-Type']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Calendar-Type[]" value="<?php echo $value ?>" <?php echo set_checkbox('Calendar-Type[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="container">
                            <label for="checkbox" class="checkbox-label">Document List</label>
                            <input type="checkbox" id="checkbox1" name="Document_List" value="View" <?php echo set_checkbox('Document_List', 'View', ($result['Document_List'] == 'View')); ?> class="checkbox-input">View<br>
                        </div>

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Dashboard</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Dashboard']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'Urgent', 'In_Review', 'Today', 'Changes', 'Rewrite', 'All',
                                    'Approved_by_Hand', 'Send_To_Client', 'Approved_by_Client',
                                    'reassigned', 'Advance', 'Hold'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Dashboard[]" value="<?php echo $value ?>" <?php echo set_checkbox('Dashboard[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>

                    <div class="checkbox-container">

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Package Category</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Package_Category']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="PCategory[]" value="<?php echo $value ?>" <?php echo set_checkbox('Dashboard[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Package GST</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Package_GST']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="GST[]" value="<?php echo $value ?>" <?php echo set_checkbox('Dashboard[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Package Service</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Package_Service']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="PService[]" value="<?php echo $value ?>" <?php echo set_checkbox('Dashboard[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Package</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Package']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Package[]" value="<?php echo $value ?>" <?php echo set_checkbox('Dashboard[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="checkbox-container">

                 

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Social Media</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Social_Media']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Social_Media[]" value="<?php echo $value ?>" <?php echo set_checkbox('Social_Media[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">My Videos</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['My_Videos']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Videos[]" value="<?php echo $value ?>" <?php echo set_checkbox('Videos[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>




                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">My Exams</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['My_Exams']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit', 'delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Exams[]" value="<?php echo $value ?>" <?php echo set_checkbox('Exams[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                       

                    </div>

                    <div class="checkbox-container">

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Forms</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Forms']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="Forms[]" value="<?php echo $value ?>" <?php echo set_checkbox('Forms[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Generate Calendar</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['GenerateCalendar']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="GenerateCalendar[]" value="<?php echo $value ?>" <?php echo set_checkbox('GenerateCalendar[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Client package</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['ClientPackage']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="ClientPackage[]" value="<?php echo $value ?>" <?php echo set_checkbox('ClientPackage[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Digital File</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['digitalfile']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="digitalfile[]" value="<?php echo $value ?>" <?php echo set_checkbox('digitalfile[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    <div class="checkbox-container">

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Users</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['users']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete','forgot_pass', 'permission'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="users[]" value="<?php echo $value ?>" <?php echo set_checkbox('users[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>



                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Setting</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['setting']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete','forgot_pass', 'permission'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="setting[]" value="<?php echo $value ?>" <?php echo set_checkbox('setting[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Payment</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['setting']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'Boasting_Payment', 'SMC_Payment', 'Payment_Mode','GST','Installment Panel', 'Banking Setion'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="setting[]" value="<?php echo $value ?>" <?php echo set_checkbox('setting[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                    </div>

                    <div class="checkbox-container">


                        
                    <div class="container">
                            <label for="checkbox1" class="checkbox-label">Group Chat</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['Groupchat']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete','forgot_pass', 'permission'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="groupchat[]" value="<?php echo $value ?>" <?php echo set_checkbox('groupchat[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="checkbox-container">


                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Task List</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['taskList']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="taskList[]" value="<?php echo $value ?>" <?php echo set_checkbox('taskList[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>







                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Custom Task</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['customTask']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="customTask[]" value="<?php echo $value ?>" <?php echo set_checkbox('customTask[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>





                        <div class="container">
                            <label for="checkbox1" class="checkbox-label">Task Category</label>
                            <div class="checkbox-container">

                                <?php
                                // Explode the database value into an array
                                $dashboardValues = explode(', ', $result['taskCategory']);

                                // Define the checkbox values
                                $checkboxValues = array(
                                    'view', 'Add_On', 'Edit','delete'
                                );

                                // Loop through each checkbox value and create the checkbox
                                foreach ($checkboxValues as $value) {
                                    // Check if the current value exists in the database array
                                    $isChecked = in_array($value, $dashboardValues);
                                ?>
                                    <div class="checkbox-item">
                                        <input type="checkbox" id="checkbox<?php echo $value ?>" name="taskCategory[]" value="<?php echo $value ?>" <?php echo set_checkbox('taskCategory[]', $value, $isChecked); ?> class="checkbox-input">
                                        <label for="checkbox<?php echo $value ?>"><?php echo $value ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>




                    </div>

              




                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Document</label>
                        <input type="checkbox" id="checkbox1" name="Document[]" value="1" class="checkbox-input">View<br>
                        <input type="checkbox" id="checkbox1" name="Document[]" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Document[]" value="3" class="checkbox-input">edit<br>

                    </div> -->


                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Document Category</label>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="View" class="checkbox-input">View<br>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="Add On" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="edit" class="checkbox-input">edit<br>
                    </div> -->


                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Report</label>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Report" class="checkbox-input">Report<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Client Calendar" class="checkbox-input">Client Calendar<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Client User" class="checkbox-input">Client User<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Ticket History" class="checkbox-input">Ticket History<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Incentive" class="checkbox-input">Incentive<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="My Incentive" class="checkbox-input">My Incentive<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Ticket Data" class="checkbox-input">Ticket Data<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Activity" class="checkbox-input">Activity<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Work Dashboard" class="checkbox-input">Work Dashboard<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="Unclear Incentive" class="checkbox-input">Unclear Incentive<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="My Unclear Incentive" class="checkbox-input">My Unclear Incentive<br>
                        <input type="checkbox" id="checkbox1" name="Report[]" value="User Daily Work Report" class="checkbox-input">User Daily Work Report<br>

                    </div> -->
                   
                    <div class="checkbox-container">


                      

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Webchat</label>
                        <input type="checkbox" id="checkbox1" name="Webchat[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Webchat[]" value="edit" class="checkbox-input">Edit<br>

                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Groupchat</label>
                        <input type="checkbox" id="checkbox1" name="Groupchat[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Groupchat[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Groupchat[]" value="Edit" class="checkbox-input">Edit<br>
                        <input type="checkbox" id="checkbox1" name="Groupchat[]" value="manage" class="checkbox-input">manage<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">My Checklist</label>
                        <input type="checkbox" id="checkbox1" name="Checklist[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Checklist[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Checklist[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                    </div>
                    <div class="checkbox-container">
                       

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Checklist Access</label>
                        <input type="checkbox" id="checkbox1" name="Access[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Access[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Access[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Checklist Review</label>
                        <input type="checkbox" id="checkbox1" name="Review[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Review[]" value="Edit" class="checkbox-input">Edit<br>

                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Onetime Checklist</label>
                        <input type="checkbox" id="checkbox1" name="Onetime[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Onetime[]" value="Add on" class="checkbox-input">Add On<br>
                    </div> -->
                    </div>



                    <div class="checkbox-container">

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Other Category</label>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Category[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Poster</label>
                        <input type="checkbox" id="checkbox1" name="Poster[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Poster[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Poster[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Other Poster</label>
                        <input type="checkbox" id="checkbox1" name="OPoster[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="OPoster[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="OPoster[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Customert</label>
                        <input type="checkbox" id="checkbox1" name="Customert[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Customert[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Customert[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                    </div>
                    <div class="checkbox-container">
                       
                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Forms</label>
                        <input type="checkbox" id="checkbox1" name="Forms[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Forms[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Forms[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                    </div>


                    <div class="checkbox-container">
                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">KYC</label>
                        <input type="checkbox" id="checkbox1" name="KYC[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="KYC[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="KYC[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Exam</label>
                        <input type="checkbox" id="checkbox1" name="Exam[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Exam[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Exam[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Video</label>
                        <input type="checkbox" id="checkbox1" name="Video[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Video[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Video[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Video Access</label>
                        <input type="checkbox" id="checkbox1" name="VideoAccess[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="VideoAccess[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="VideoAccess[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->


                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Calendar</label>
                        <input type="checkbox" id="checkbox1" name="Calendar[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Calendar[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Calendar[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                    </div>


                    <div class="checkbox-container">


                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Exam Access</label>
                        <input type="checkbox" id="checkbox1" name="ExamAcc[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="ExamAcc[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="ExamAcc[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Exam Result</label>
                        <input type="checkbox" id="checkbox1" name="ExamRes[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="ExamRes[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="ExamRes[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Task</label>
                        <input type="checkbox" id="checkbox1" name="Task[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Task[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Task[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->


                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Client</label>
                        <input type="checkbox" id="checkbox1" name="Client" value="1" <?php echo set_checkbox('Client', '1', ($result['Client'] == '1')); ?> class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Client" value="2" <?php echo set_checkbox('Client', '2', ($result['Client'] == '2')); ?> class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Client" value="3" <?php echo set_checkbox('Client', '3', ($result['Client'] == '3')); ?> class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Pages</label>
                        <input type="checkbox" id="checkbox1" name="Pages[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Pages[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Pages[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                    </div>
                    <div class="checkbox-container">
                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Role</label>
                        <input type="checkbox" id="checkbox1" name="Role[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Role[]" value="Add " class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Role[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Filemanager</label>
                        <input type="checkbox" id="checkbox1" name="Filemanager[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Filemanager[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Filemanager[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Notification</label>
                        <input type="checkbox" id="checkbox1" name="Notification[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Notification[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Notification[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">User</label>
                        <input type="checkbox" id="checkbox1" name="User[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="User[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="User[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Languages</label>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="Edit" class="checkbox-input">Edit<br>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="checkbox1" class="checkbox-input">Translation<br>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="checkbox1" class="checkbox-input">Update Translation<br>
                        <input type="checkbox" id="checkbox1" name="Languages[]" value="checkbox1" class="checkbox-input">Delete<br>
                    </div> -->

                    </div>


                    <div class="checkbox-container">
                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Settings</label>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Basic" class="checkbox-input">Basic<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Theme" class="checkbox-input">Theme<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Captcha" class="checkbox-input">Captcha<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Google Drive" class="checkbox-input">Google Drive<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="PWA" class="checkbox-input">PWA<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Client" class="checkbox-input">Client<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Firebase" class="checkbox-input">Firebase<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Backup" class="checkbox-input">Backup<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="SEO" class="checkbox-input">SEO<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Updates" class="checkbox-input">Updates<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Application" class="checkbox-input">Application<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Email" class="checkbox-input">Email<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Payment Gateway" class="checkbox-input">Payment Gateway<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="Build Your Pc" class="checkbox-input">Build Your Pc<br>
                        <input type="checkbox" id="checkbox1" name="Settings[]" value="License" class="checkbox-input">License<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Custom Task</label>
                        <input type="checkbox" id="checkbox1" name="Custom Task[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Custom Task[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Custom Task[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Task Category</label>
                        <input type="checkbox" id="checkbox1" name="Task Category[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Task Category[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Task Category[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Size</label>
                        <input type="checkbox" id="checkbox1" name="Size[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Size[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Size[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                        <!-- <div>
                        <label for="checkbox" class="checkbox-label">Gallery</label>
                        <input type="checkbox" id="checkbox1" name="Gallery[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                    </div>
                    <div class="checkbox-container">
                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Gallery Category</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Cat[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Cat[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Cat[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->

                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Gallery Color</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Color[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Color[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Color[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>

                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery File Type</label>
                        <input type="checkbox" id="checkbox1" name="Gallery File[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery File[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery File[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>
                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery Orientation</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Orientation[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Orientation[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Orientation[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> 
                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery Style</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Style[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Style[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Style[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>-->
                    </div>


                    <div class="checkbox-container">
                        <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Gallery People</label>
                        <input type="checkbox" id="checkbox1" name="Gallery People[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery People[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery People[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>

                    <div class="box">
                        <label for="checkbox" class="checkbox-label">Gallery People Number</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Number[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Number[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Number[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>

                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery People Age</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Age[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Age[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Age[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>
                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery People Gender</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Gender[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Gender[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Gender[]" value="Edit" class="checkbox-input">Edit<br>
                    </div>
                    <div>
                        <label for="checkbox" class="checkbox-label">Gallery People Ethnicity</label>
                        <input type="checkbox" id="checkbox1" name="Gallery Ethnicity[]" value="view" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Ethnicity[]" value="Add on" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Gallery Ethnicity[]" value="Edit" class="checkbox-input">Edit<br>
                    </div> -->
                    </div>
                </section>




                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Submit</button>

            </form>
        </div>
    </section>
</body>
<script>
    function handleCheckboxChange(checkbox, value) {
        // Check if the changed checkbox is "Details"
        if (value === 'Details') {
            // Get the details label container
            var detailsLabel = document.getElementById('details-label');

            // Show or hide the details label based on the state of the "Details" checkbox
            if (checkbox.checked) {
                detailsLabel.style.display = 'block';
                document.getElementById('additional-checkboxes').style.display = 'block';
            } else {
                detailsLabel.style.display = 'none';
                document.getElementById('additional-checkboxes').style.display = 'none';
            }
        }
    }

    // Check if the "Details" checkbox is already checked on page load
    window.onload = function() {
        var detailsCheckbox = document.getElementById('checkboxDetails');
        if (detailsCheckbox && detailsCheckbox.checked) {
            document.getElementById('details-label').style.display = 'block';
            document.getElementById('additional-checkboxes').style.display = 'block';
        }
    }
</script>

</html>