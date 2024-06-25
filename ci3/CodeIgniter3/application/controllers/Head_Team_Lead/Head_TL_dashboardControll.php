<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head_TL_dashboardControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $RoleModel;
    public $CustomTaskModel;
    public $Head_TL_TeamModel;
    public $AddNewCalendarModel;
    public $UpdateTaskModel;
    public $UpdateClientPermissionModel;
    public $session;

    //for view          http://localhost/adhub/ci3/CodeIgniter3/index.php/Head_Team_Lead/Head_TL_dashboardControll/viewDashboard

    function viewDashboard()
    {


        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('Head_TeamLeadModel/Head_TL_TeamModel');

        // Set the name condition

        $name = 'Head Team Lead';
        $statuses = $this->Head_TL_TeamModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];
        
        $this->load->view('Head_TeamLead/Head_TL_SideHeadFoot', $data);
        

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

        $this->load->view('Head_TeamLead/Head_TL_Dashboard.php',$data1);
    }


    public function updateTask()
    {
        // Get the tid, cr_data, and button_clicked from the form submission
        $tid = $this->input->post('tid');
        $cr_data = $this->input->post('editor_content');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $imageData = Null;

        $button_clicked = $this->input->post('button_clicked');
        // Load the model
        $this->load->model('UpdateTaskModel');

        // Check if tid is not empty
        if (!empty($tid)) {
            // Update the task

            if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $cr_data, $imageData)) {
                // If update is successful, redirect to dashboard
                redirect(base_url('index.php/Head_Team_Lead/Head_TL_dashboardControll/viewDashboard'));
            } else {
                // If update fails, handle the error
                echo "Update failed";
            }
        } else {
            // If tid is empty, handle the error
            echo "Task ID is empty";
        }
    }
}
