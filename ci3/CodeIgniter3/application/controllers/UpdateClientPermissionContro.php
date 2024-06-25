<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateClientPermissionContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UserModel;
    public $PackageModelGST;
    public $UpdateClientPermissionModel;
    public $session;
    



    public function addNewPermission() {
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
                redirect(base_url() . 'index.php/User_con/index');
            }
        }
    
        // Load views
        $this->load->view('SideHeadFoot.php');
        $this->load->view('UpdateClientPermission.php', $data);
    }
    

}
