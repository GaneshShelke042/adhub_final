<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PackageContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $PackageCategoryModel;
    public $session;
    public $upload;

    function addnewpackage()
    {

        $this->load->view('Package\Package Category\NewPackageCategory.php');

        $this->load->model('PackageCategoryModel');

        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Package\Package Category\NewPackageCategory.php');
        } else {

            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 mb max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            // print_r($data);
            if ($this->upload->do_upload('image')) {
                echo "file uploaded successful <br>";
                $data['image'] = $this->upload->data('file_name');
                print_r($this->upload->data('file_name'));
            } else {
                $error['err'] = $this->upload->display_errors();
                echo $error['err'];
            }


            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['parent'] = $this->input->post('Parent');
            $data['Slug'] = $this->input->post('Slug');

            $this->PackageCategoryModel->newpackage($data);
            redirect(base_url() . 'index.php/PackageContro/viewpackage');
        }
    }



    function viewpackage()
    {
        

        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->viewPackageData();

        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Package\Package Category\ViewPackageCategory.php', $data);
    }

    //popup data update

    function updateData($userData) {
        $this->load->model('PackageCategoryModel');
        
        // Check if form is submitted
        if ($this->input->post()) {




            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 mb max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            // print_r($data);
            if ($this->upload->do_upload('image')) {
                echo "file uploaded successful <br>";
                $data['image'] = $this->upload->data('file_name');
                print_r($this->upload->data('file_name'));
            } else {
                $error['err'] = $this->upload->display_errors();
                echo $error['err'];
            }


            $data['name'] = $this->input->post('name');
            $data['parent'] = $this->input->post('Parent');
            $data['status'] = $this->input->post('status');
          



            // Get form data
      
    
            // Update package data
            $this->PackageCategoryModel->updatePackage($userData, $data);
    
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/PackageContro/viewpackage');
        } else {
            // If form is not submitted, load the edit view with the user data
            // Load the user data based on $userData['id']
            $result = $this->PackageCategoryModel->editPackage($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
    
            // Load view with the user data
            $this->load->view('Package\Package Category\EditPackageCategory', $data);
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

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('PackageCategoryModel');
            $up_Status = $this->PackageCategoryModel->updateStatus();
           

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/PackageContro/viewpackage');
        }
     
    }
}