<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cr_Package_GSTContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $PackageModelGST;
    public $TL_TeamModel;
    public $session;



    function addnewpackage()
    {


        $this->load->model('PackageModelGST');

        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('CR_Writer\Package GST\AddNewPackageGST.php');
        } else {

            $data = array();

            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['cgst'] = $this->input->post('cgst');
            $data['sgst'] = $this->input->post('sgst');
            $data['total'] = $this->input->post('total');
            $this->PackageModelGST->newpackage($data);
            redirect(base_url() . 'index.php/CR_Writer/Cr_Package_GSTContro/viewpackage');
        }
    }



    function viewpackage()
    {

               //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

               $this->load->model('TeamLeadModel/TL_TeamModel');

               // Set the name condition
       
               $name = 'Content_Writer';
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
               
               $this->load->view('CR_Writer\Cr_SideHeadFoot.php', $data);
       
               // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^


        $this->load->model('PackageModelGST');
        $result = $this->PackageModelGST->viewPackageData();

        $data = array();
        $data['result'] = $result;

        $this->load->view('CR_Writer\Package\Package GST\ViewPackageGST.php', $data);
    }

     //popup data update

     function updateData($userData) {
        $this->load->model('PackageModelGST');
        
        // Check if form is submitted
        if ($this->input->post()) {
            // Get form data
            $updated_data = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status'),
                'cgst' => $this->input->post('cgst'),
                'sgst' => $this->input->post('sgst'),
                'total' => $this->input->post('total')
            );
    
            // Update package data
            $this->PackageModelGST->updatePackage($userData, $updated_data);
    
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/CR_Writer/Cr_Package_GSTContro/viewpackage');
        } else {
            // If form is not submitted, load the edit view with the user data
            // Load the user data based on $userData['id']
            $result = $this->PackageModelGST->editPackage($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
    
            // Load view with the user data
            $this->load->view('CR_Writer\Package\Package GST\ViewPackageGST.php', $data);
        }
    }
    

    // for delete
    function deleteData($userData)
    {

        $this->load->model('PackageModelGST');
        $result = $this->PackageModelGST->editPackage($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/CR_Writer/Cr_Package_GSTContro/viewpackage');
        }
        $this->PackageModelGST->dataDelete($userData);
        redirect(base_url() . 'index.php/CR_Writer/Cr_Package_GSTContro/viewpackage');
    }
}
