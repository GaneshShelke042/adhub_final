<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head_TL_PackageContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $PackageCategoryModel;
    public $TL_TeamModel;
    public $session;



    function addnewpackage()
    {

        $this->load->view('Head_TeamLead\Package\Package Category\NewPackageCategory.php');

        $this->load->model('PackageCategoryModel');

        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Head_TeamLead\Package\Package Category\NewPackageCategory.php');
        } else {

            $data = array();

            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['parent'] = $this->input->post('Parent');
            $data['Slug'] = $this->input->post('Slug');

            $this->PackageCategoryModel->newpackage($data);
            redirect(base_url() . 'index.php/Head_Team_Lead/Head_TL_PackageContro/viewpackage');
        }
    }



    function viewpackage()
    {


         //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

         $this->load->model('TeamLeadModel/TL_TeamModel');

         // Set the name condition
 
         $name = 'Head Team Lead';
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
         
         $this->load->view('Head_TeamLead\Head_TL_SideHeadFoot.php', $data);
 
         // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^
        

        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->viewPackageData();

        $data = array();
        $data['result'] = $result;

        $this->load->view('Head_TeamLead\Package\Package Category\ViewPackageCategory.php', $data);
    }

    //popup data update

    function updateData($userData) {
        $this->load->model('PackageCategoryModel');
        
        // Check if form is submitted
        if ($this->input->post()) {
            // Get form data
            $updated_data = array(
                'name' => $this->input->post('name'),
                'status' => $this->input->post('status'),
                'parent' => $this->input->post('Parent')
            );
    
            // Update package data
            $this->PackageCategoryModel->updatePackage($userData, $updated_data);
    
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/Head_Team_Lead/Head_TL_PackageContro/viewpackage');
        } else {
            // If form is not submitted, load the edit view with the user data
            // Load the user data based on $userData['id']
            $result = $this->PackageCategoryModel->editPackage($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
    
            // Load view with the user data
            $this->load->view('Head_TeamLead\Package\Package Category\EditPackageCategory', $data);
        }
    }
    



    // for delete
    function deleteData($userData)
    {

        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->editPackage($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/PackageContro/viewpackage');
        }
        $this->PackageCategoryModel->dataDelete($userData);
        redirect(base_url() . 'index.php/PackageContro/viewpackage');
    }
}
