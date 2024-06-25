<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS for form layout */


        form {
            background-color: #fff;
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
        .checkbox-container {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            /* Align items with space between */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Add box shadow */
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }

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
        .home-section{
            margin-top:2%;
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
    </style>
</head>

<body>
    <section class="home-section">
    <div class="main-content">
    <div class="box-container">
        <form method="POST">


            <h1>Update role</h1>
            <input type="hidden" name="role_id" >

            <label for="Role_name">Name:</label>
            <input type="text" name="Role_name" placeholder="Content Writer Teacher">
            <!-- Status Dropdown -->
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="pending">Pending</option>
            </select>

            <!-- >KYC Dropdown -->
            <label for="kyc">KYC form:</label>
            <select id="kyc" name="kyc">
                <option>Agree</option>
                <option>Disagree</option>
            </select>

            <!-- Agreement Dropdown -->
            <label for="agreement">Agreement:</label>
            <select id="agreement" name="agreement">
                <option value="agree">Agree</option>
                <option value="disagree">Disagree</option>
            </select>



            <!-- Checkboxes with separate titles and checkbox styles -->
            <section>
                <div class="checkbox-container">
                    <div class="">
                        <label for="checkbox" class="checkbox-label">Schedule</label>
                        <input type="checkbox" id="checkbox1" name="Schedule" value="View" class="checkbox-input">View<br>
                    </div>

                    <div class="">
                        <label for="checkbox" class="checkbox-label">Document List</label>
                        <input type="checkbox" id="checkbox1" name="Document_List" value="View" class="checkbox-input">View<br>
                    </div>
                    <div class="" > 
                <label for="checkbox1" class="checkbox-label">Dashboard</label>
                <input type="hidden" id="checkbox1" name="Dashboard[]" value="NULL" class="checkbox-input"><br>
                <input type="checkbox" id="checkbox1" name="Dashboard[]" value="Urgent" class="checkbox-input">Urgent<br>
                <input type="checkbox" id="checkbox2" name="Dashboard[]" value="In_Review" class="checkbox-input">In Review<br>
                <input type="checkbox" id="checkbox3" name="Dashboard[]" value="Today" class="checkbox-input">Today<br>
                <input type="checkbox" id="checkbox4" name="Dashboard[]" value="Changes" class="checkbox-input">Changes<br>
                <input type="checkbox" id="checkbox5" name="Dashboard[]" value="Rewrite" class="checkbox-input">Rewrite<br>
                <input type="checkbox" id="checkbox6" name="Dashboard[]" value="Approved_by_Hand" class="checkbox-input">Approved by Hand<br>
                <input type="checkbox" id="checkbox7" name="Dashboard[]" value="Send_To_Client" class="checkbox-input">Send To Client<br>
                <input type="checkbox" id="checkbox8" name="Dashboard[]" value="Approved_by_Client" class="checkbox-input">Approved by Client<br>
                <input type="checkbox" id="checkbox9" name="Dashboard[]" value="reassigned" class="checkbox-input">reassigned<br>
                <input type="checkbox" id="checkbox10" name="Dashboard[]" value="Advance" class="checkbox-input">Advance<br>
                <input type="checkbox" id="checkbox11" name="Dashboard[]" value="Hold" class="checkbox-input">Hold<br>
                <input type="checkbox" id="checkbox12" name="Dashboard[]" value="All" class="checkbox-input">All<br>
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
                </div>
                <div class="checkbox-container">
                    <!-- <div class="box">
                        <label for="checkbox" class="checkbox-label">Leads</label>
                        <input type="checkbox" id="checkbox1" name="Leads" value="facebook" class="checkbox-input">facebook<br>

                    </div> -->

                    <div class="box">
                        <label for="checkbox" class="checkbox-label">Social Media</label>
                        <input type="checkbox" id="checkbox1" name="Media" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Media" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Media" value="3" class="checkbox-input">Edit<br>
                        <input type="checkbox" id="checkbox1" name="Media" value="4" class="checkbox-input">facebook<br>
                    </div>

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
                    <div class="box">
                        <label for="checkbox" class="checkbox-label">My Videos</label>
                        <input type="checkbox" id="checkbox1" name="Videos" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Videos" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Videos" value="3" class="checkbox-input">Edit<br>
                    </div>

                    <div class="box">
                        <label for="checkbox" class="checkbox-label">My Exams</label>
                        <input type="checkbox" id="checkbox1" name="Exams" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Exams" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Exams" value="3" class="checkbox-input">Edit<br>
                    </div>

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
                    <div>
                        <label for="checkbox" class="checkbox-label">Package Category</label>
                        <input type="checkbox" id="checkbox1" name="PCategory" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="PCategory" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="PCategory" value="3" class="checkbox-input">Edit<br>
                    </div>

                    <div class="box">
                        <label for="checkbox" class="checkbox-label">Package GST</label>
                        <input type="checkbox" id="checkbox1" name="GST" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="GST" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="GST" value="3" class="checkbox-input">Edit<br>
                    </div>

                    <div>
                        <label for="checkbox" class="checkbox-label">Package Service</label>
                        <input type="checkbox" id="checkbox1" name="PService" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="PService" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="PService" value="3" class="checkbox-input">Edit<br>
                    </div>
                    <div>
                        <label for="checkbox" class="checkbox-label">Package</label>
                        <input type="checkbox" id="checkbox1" name="Package" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Package" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Package" value="3" class="checkbox-input">Edit<br>
                    </div>
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


                    <div>
                        <label for="checkbox" class="checkbox-label">Client</label>
                        <input type="checkbox" id="checkbox1" name="Client" value="1" class="checkbox-input">view<br>
                        <input type="checkbox" id="checkbox1" name="Client" value="2" class="checkbox-input">Add On<br>
                        <input type="checkbox" id="checkbox1" name="Client" value="3" class="checkbox-input">Edit<br>
                    </div>

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
        </div>
    </section>
</body>

</html>