<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TL_UpdateClientPermissionContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UserModel;
    public $PackageModelGST;
    public $UpdateClientPermissionModel;
    public $TL_TeamModel;
    public $session;
    



    public function TL_UpdateClientPermissionContro() {





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





        // Load user data and pass it to the view
        $this->load->model('UserModel');
        $userResult = $this->UserModel->viewData();
        
        // Get the URL ID
        $client_id = $this->uri->segment(3);
        
        // Load the model
        $this->load->model('UpdateClientPermissionModel');
        
        // Check if client permissions exist for the provided client ID
        $clientPermissions = [];
        if ($client_id) {
            $clientPermissions = $this->UpdateClientPermissionModel->getClientPermissions($client_id);
        }
        
        $data = array(
            'userResult' => $userResult,
            'clientPermissions' => $clientPermissions
        );
        
        // Check if form is submitted
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Form validation rules
            $this->form_validation->set_rules('client_id', 'Client ID', 'required');
            $this->form_validation->set_rules('selectOption1[]', 'Permissions', 'required');
    
            if ($this->form_validation->run() == true) {
                // Form validation succeeded
                if ($client_id) {
                    // Client ID exists, insert/update permissions
                    $selectedOptions = $this->input->post('selectOption1');
    
                    // Delete existing permissions for this client
                    $this->UpdateClientPermissionModel->deleteClientPermissions($client_id);
    
                    // Loop through each selected option and insert them
                    foreach ($selectedOptions as $selectedOption) {
                        $data = array(
                            'client_id' => $client_id,
                            'User_id' => $selectedOption
                        );
                        $this->UpdateClientPermissionModel->insertUserClient($data);
                    }
                } else {
                    // Client ID is not available, handle accordingly
                }
                redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');
            }
        }
    
        // Load views
        // $this->load->view('SideHeadFoot.php');
        $this->load->view('TeamLead/TL_UpdateClientPermission.php', $data);
    }
    

}
