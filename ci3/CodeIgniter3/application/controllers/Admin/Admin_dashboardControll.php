<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_dashboardControll extends CI_Controller
{
    public $db;
    public $form_validation;
    public $RoleModel;
    public $Curd_model;
    public $CustomTaskModel;
    public $Head_TL_TeamModel;
    public $AddNewCalendarModel;
    public $UpdateTaskModel;
    public $upload;
    public $Cr_WriterModel;
    public $UpdateClientPermissionModel;
    public $session;
    public $teamchat_model;
    public $UserModel;
    public $Forms;
    public $ClientFormModel;



    public function __construct()
    {



        parent::__construct();

        $this->load->model('UpdateClientPermissionModel');
        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV



        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^

    }


    //for view         

    function viewDashboard()
    {
        $this->load->model('CR_WriterModel/Cr_WriterModel');

        // Set the name condition
        $name = 'Admin';
        $statuses = $this->Cr_WriterModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];

        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];

        $this->load->view('Admin\Admin_SideHeadFoot.php', $data);


        echo $id_from_url = $this->session->userdata('user_id');
        echo $name_from_url = $this->session->userdata('name');

        // $this->load->model('Curd_model');
        // $addnewclient1 = $this->Curd_model->viewData();
        // $data1 = array();
        // $data1['addnewclient1'] = $addnewclient1;

        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->viewDashbord();

        $data1 = array();
        $data1['result'] = $result;


        $this->load->model('UpdateClientPermissionModel');
        $User = $this->UpdateClientPermissionModel->viewData();

        $matchedClients = [];
        // $Login_id = $this->session->userdata('user_id');

        foreach ($result as $client) {
            foreach ($User as $user) {
                // Check if both client_id and user_id match
                if ($client['Client_id'] == $user['client_id'] && $user['User_id'] == $id_from_url) {
                    // Add the matched client to the list
                    $matchedClients[] = $client;
                    // Break out of the inner loop once a match is found
                    break;
                }
            }
        }

        $data1['matchedClients'] = $matchedClients;

        $this->load->view('Admin\Admin_Dashboard.php', $data1);
    }




    public function updateTask()
    {
        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');

        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');

        $this->load->model('Curd_model');

        $this->load->model('UpdateTaskModel');
        $this->load->model('UserModel');
        $this->load->model('teamchat_model');

        $this->load->model('Forms');
        $this->load->model('ClientFormModel');

        $id = $this->uri->segment(4);


        $Ans = $this->Forms->viewAns();

        $data['Ans'] = $Ans;

        $form_name = $this->Forms->viewAns();
        $data['form_name'] = $form_name;

        $question = $this->ClientFormModel->view();
        $data['question'] = $question;


        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;
        $chat = $this->teamchat_model->viewdatabyticketid($data['receiveddata'][0]->id);
        $data['chatdata'] = $chat;
        $userResult = $this->UserModel->viewData();
        $data['userResult'] = $userResult;
        foreach ($data['chatdata'] as $key) {
            # code...
            $role = $this->UserModel->viewIdrole($key['userid']);
            $key['role'] = $role[0]['role'];
            $data['chat'][] = $key;
        }
        // echo"<pre>";
        // print_r($data['chat']);

        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Language Form Not Filled.";
            }
            // Print the grouped data

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled.";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["painpoint"]) {
                    // print_r($key);
                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled.";
            }
            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled.";
            }

            // echo "<pre>";
            // print_r($data['Offer']);

        }


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('Admin\Admin_Cr_UpdateTask.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            $imageData = NULL; // Initialize image data
            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['file_name']; // Get full path to the uploaded file
                    echo "<pre>";
                    print_r($this->upload->data());
                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                    return;
                }
            }
            // Load the model
            $this->load->model('UpdateTaskModel');
            print_r($editor_content);
            print_r($tid);
            print_r($cr_Status);
            print_r($tid);
            // Update the task
            if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                // If update is successful, redirect to dashboard
                redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
            } else {
                // If update fails, handle the error
                echo $this->upload->display_errors();
                echo "Update failed";
            }
        }
    }

    // Custom callback function for image upload validation
    // Custom callback function for image upload validation
    public function image_upload()
    {
        // Check if no file is selected for upload
        if (empty($_FILES['imageData']['name'])) {
            // No file selected, validation passes
            return TRUE;
        } else {
            // File selected, continue with other validations
            return TRUE;
        }
    }



    public function updateGRTask()
    {
        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');
        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');

        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');
        $this->load->model('Curd_model');
        $this->load->model('UpdateTaskModel');
        $this->load->model('UserModel');
        $this->load->model('teamchat_model');

        $this->load->model('Forms');
        $this->load->model('ClientFormModel');

        $id = $this->uri->segment(4);


        $Ans = $this->Forms->viewAns();

        $data['Ans'] = $Ans;

        $form_name = $this->Forms->viewAns();
        $data['form_name'] = $form_name;

        $question = $this->ClientFormModel->view();
        $data['question'] = $question;

        $addnewclient1 = $this->Curd_model->viewData();
        $data['addnewclient1'] = $addnewclient1;
        $userResult = $this->UserModel->viewData();
        $data['userResult'] = $userResult;
        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;
        $chat = $this->teamchat_model->viewdatabyticketid($data['receiveddata'][0]->id);
        $data['chatdata'] = $chat;
        foreach ($data['chatdata'] as $key) {
            # code...
            $role = $this->UserModel->viewIdrole($key['userid']);
            $key['role'] = $role[0]['role'];
            $data['chat'][] = $key;
        }

        // echo"<pre>";
        // print_r($data);


        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Language Form Not Filled";
            }
            // Print the grouped data

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["painpoint"]) {
                    // print_r($key);
                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled";
            }
            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled";
            }

            // echo "<pre>";
            // print_r($data['Offer']);

        }









        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('Admin/Admin_Gr_UpdateTask.php', $data); // Pass data to the view
            // echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            // Initialize image data
            // echo "<pre>";
            // print_r($data['receiveddata']);
            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['file_name']; // Get full path to the uploaded file

                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                    return;
                }

                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
                }
            }

            if (!empty($_FILES['psdfile']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './psdFile_Graphics/';
                $config['allowed_types'] = 'psd';
                $config['max_size'] = 512000; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('psdfile')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $psdfile = $upload_data['file_name']; // Get full path to the uploaded file
                    // echo "<pre>";
                    // print_r($psdfile);

                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                }
                if ($this->UpdateTaskModel->updatepsd($tid, $psdfile, $cr_Status, $gr_Status)) {
                    redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
                }
                redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
            } else {
                $this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content,  $data['receiveddata'][0]->imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue);
                // If update is successful, redirect to dashboard
                redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
            }
        }
    }

    public function updateSmmTask()
    {



        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');

        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');



        $this->load->model('Curd_model');

        $this->load->model('UpdateTaskModel');
        $this->load->model('teamchat_model');
        $this->load->model('UserModel');
        $this->load->model('Forms');
        $this->load->model('ClientFormModel');

        $id = $this->uri->segment(4);


        $Ans = $this->Forms->viewAns();

        $data['Ans'] = $Ans;

        $form_name = $this->Forms->viewAns();
        $data['form_name'] = $form_name;

        $question = $this->ClientFormModel->view();
        $data['question'] = $question;
        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;
        $chat = $this->teamchat_model->viewdatabyticketid($data['receiveddata'][0]->id);
        $data['chatdata'] = $chat;
        foreach ($data['chatdata'] as $key) {
            # code...
            $role = $this->UserModel->viewIdrole($key['userid']);
            $key['role'] = $role[0]['role'];
            $data['chat'][] = $key;
        }
        // echo"<pre>";
        // print_r($data);


        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Language Form Not Filled.";
            }
            // Print the grouped data

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled.";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["painpoint"]) {
                    // print_r($key);
                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled";
            }
            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled";
            }

            // echo "<pre>";
            // print_r($data['Offer']);

        }


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('Admin\Admin_Smm_UpdateTask.php', $data); // Pass data to the view
            echo validation_errors();
        } else {


            echo "<pre>";
            print_r($data['receiveddata']);
            echo $_FILES['imageData']['name'];


            if (!empty($_FILES['imageData']['name'])) {

                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['file_name']; // Get full path to the uploaded file
                    // echo "<pre>";
                    // print_r($this->upload->data());

                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                    return;
                }
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
                }
            } else {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $data['receiveddata'][0]->imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
                }
            }
        }
    }
}
