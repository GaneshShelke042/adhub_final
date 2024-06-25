<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package_GSTContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $PackageModelGST;
    public $session;



    function addnewpackage()
    {

        $this->load->view('Package\Package GST\AddNewPackageGST.php');

        $this->load->model('PackageModelGST');

        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Package\Package GST\AddNewPackageGST.php');
        } else {

            $data = array();

            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['cgst'] = $this->input->post('cgst');
            $data['sgst'] = $this->input->post('sgst');
            $data['total'] = $this->input->post('total');
            $this->PackageModelGST->newpackage($data);
            redirect(base_url() . 'index.php/Package_GSTContro/viewpackage');
        }
    }



    function viewpackage()
    {

        $this->load->model('PackageModelGST');
        $result = $this->PackageModelGST->viewPackageData();

        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Package\Package GST\ViewPackageGST.php', $data);
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
            redirect(base_url() . 'index.php/Package_GSTContro/viewpackage');
        } else {
            // If form is not submitted, load the edit view with the user data
            // Load the user data based on $userData['id']
            $result = $this->PackageModelGST->editPackage($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
    
            // Load view with the user data
            $this->load->view('Package\Package GST\ViewPackageGST.php', $data);
        }
    }
    

    // for delete
    function deleteData($userData)
    {

        $this->load->model('PackageModelGST');
        $result = $this->PackageModelGST->editPackage($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/Package_GSTContro/viewpackage');
        }
        $this->PackageModelGST->dataDelete($userData);
        redirect(base_url() . 'index.php/Package_GSTContro/viewpackage');
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('PackageModelGST');
            $up_Status = $this->PackageModelGST->updateStatus();
           

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/Package_GSTContro/viewpackage');
        }
     
    }

    
}
