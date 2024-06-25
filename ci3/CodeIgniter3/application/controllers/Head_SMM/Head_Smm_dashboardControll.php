<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head_Smm_dashboardControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UpdateTaskModel;
    public $Head_SmmSideBarModel;
    public $CustomTaskModel;
    public $UpdateClientPermissionModel;
    public $upload;
    public $Curd_model;
    public $session;

    //for view

    function viewDashboard()
    {


        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('Head_SmmModel/Head_SmmSideBarModel');

        // Set the name condition

        $name = 'Head Social Media Manager';
        $statuses = $this->Head_SmmSideBarModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];
        
        $this->load->view('Head_Social_Media_Manager\Head_SmmSideHeadFoot.php', $data);
        

        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^
        echo $id_from_url= $this->session->userdata('user_id');
        echo $name_from_url= $this->session->userdata('name');

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



        $this->load->view('Head_Social_Media_Manager/Head_Smm_Dashboard.php', $data1);
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
        $id = $this->uri->segment(4);

        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        // echo"<pre>";
        // print_r($data);


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('Head_Social_Media_Manager\Head_Smm_UpdateTask.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            // Initialize image data


            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 10240; // 10MB
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
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/Head_SMM/Head_Smm_dashboardControll/viewDashboard'));
                }
            } else {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $data['receiveddata'][0]->imageData)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/Head_SMM/Head_Smm_dashboardControll/viewDashboard'));
                }
            }
        }
    }







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
}
