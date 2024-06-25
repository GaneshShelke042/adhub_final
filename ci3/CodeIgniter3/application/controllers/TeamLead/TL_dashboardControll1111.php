<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TL_dashboardControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UpdateTaskModel;
    public $TL_TeamModel;
    public $CustomTaskModel;
    public $UpdateClientPermissionModel;
    public $session;
    public $Curd_model;
    public $upload;
    public $UserModel;
    public $teamchat_model;

    //for view

    function viewDashboard()
    {


        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('TeamLeadModel/TL_TeamModel');

        // Set the name condition

        $name = 'Team Lead';
        $statuses = $this->TL_TeamModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];

        $this->load->view('TeamLead/TL_SideHeadFoot', $data);


        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^



        echo $id_from_url = $this->session->userdata('user_id');
        echo $name_from_url = $this->session->userdata('name');
        // Assuming $urlId contains the URL ID value

        echo ("(Team lead)");



        // $this->load->model('Curd_model');
        // $addnewclient1 = $this->Curd_model->viewData();
        // $data1 = array();
        // $data1['addnewclient1'] = $addnewclient1;


        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->viewDashbord();
        $data1 = array();
        $data1['result'] = $result;  //client

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


        $this->load->view('TeamLead/TL_Dashboard.php', $data1);
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


        $this->load->model('Curd_model');

        $this->load->model('UpdateTaskModel');
        $this->load->model('teamchat_model');
        $this->load->model('UserModel');

        $id = $this->uri->segment(4);

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

        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('TeamLead\TL_Cr_UpdateTask1.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            $imageData = NULL; // Initialize image data


            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png';
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
            if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData)) {
                // If update is successful, redirect to dashboard
                redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
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


        $this->load->model('Curd_model');

        $this->load->model('UpdateTaskModel');
        $this->load->model('teamchat_model');

        $id = $this->uri->segment(4);

        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        $chat = $this->teamchat_model->viewdatabyticketid($data['receiveddata'][0]->id);
        $data['chat'] = $chat;
        // echo"<pre>";
        // print_r($data);


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('TeamLead/TL_Gr_UpdateTask1.php', $data); // Pass data to the view
            // echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            // Initialize image data
            echo "<pre>";
            print_r($data['receiveddata']);
            echo $_FILES['imageData']['name'];

            //   $data["gr"] = $this->input->post();
            //   echo"<pre>";
            //   print_r($data['gr']);

            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imageData')) {
                    $imageData = "";
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['file_name']; // Get full path to the uploaded file
                    echo "<pre>";
                    print_r($this->upload->data());
                }

                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
                } else {
                    // If update fails, handle the error
                    echo $this->upload->display_errors();
                    echo "Update failed";
                }
            } else {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content,  $data['receiveddata'][0]->imageData)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
                }
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




        $this->load->model('Curd_model');

        $this->load->model('UpdateTaskModel');
        $this->load->model('teamchat_model');
        $this->load->model('UserModel');

        $id = $this->uri->segment(4);

        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        $chat = $this->teamchat_model->viewdatabyticketid($data['receiveddata'][0]->id);
        $data['chatdata'] = $chat;
        foreach ($data['chatdata'] as $key) 
        {
            $role = $this->UserModel->viewIdrole($key['userid']);
            $key['role'] = $role[0]['role'];
            $data['chat'][] = $key;
        }
        // echo"<pre>";
        // print_r($data);


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('TeamLead\TL_Smm_UpdateTask1.php', $data); // Pass data to the view
            echo validation_errors();
        }
        else {


            // echo "<pre>";
            // print_r($data['receiveddata']);
            echo $_FILES['imageData']['name'];


            if (!empty($_FILES['imageData']['name'])) 
            {

                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png';
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
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData)) {
                    redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
                }
            } 
            else 
            {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $data['receiveddata'][0]->imageData)) {
                    redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
                }
            }
        }
    }

    
    function acceptTicketCR(){
    
        $tid = $this->input->post('tid');        
        $ticketValue = $this->input->post('TL_TicketValue');
    
       // Load the model
       $this->load->model('UpdateTaskModel');
      
       // Update the task
       if ($this->UpdateTaskModel->TL_accepTiket($tid, $ticketValue)) {
           // If update is successful, redirect to dashboard
           redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
       } else {
           // If update fails, handle the error
           echo $this->upload->display_errors();
           echo "Update failed";
       }
       
    }
    function acceptTicketGD(){
    
        $tid = $this->input->post('tid');        
        $ticketValue = $this->input->post('TL_GD_TicketValue');
    
       // Load the model
       $this->load->model('UpdateTaskModel');
      
       // Update the task
       if ($this->UpdateTaskModel->TL_GD_TicketValue($tid, $ticketValue)) {
           // If update is successful, redirect to dashboard
           redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
       } else {
           // If update fails, handle the error
           echo $this->upload->display_errors();
           echo "Update failed";
       }
       
    }
    function acceptTicketSMM(){
    
        $tid = $this->input->post('tid');        
        $ticketValue = $this->input->post('TL_SMM_TicketValue');
    
       // Load the model
       $this->load->model('UpdateTaskModel');
      
       // Update the task
       if ($this->UpdateTaskModel->TL_SMM_TicketValue($tid, $ticketValue)) {
           // If update is successful, redirect to dashboard
           redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
       } else {
           // If update fails, handle the error
           echo $this->upload->display_errors();
           echo "Update failed";
       }
       
    }

}
