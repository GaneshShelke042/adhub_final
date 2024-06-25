<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TaskCategoryContro extends CI_Controller
{


    public $db;
    public $form_validation;
    public $CustomTaskModel;
    public $taskCategoryModel ;
    public $UserModel;
    public $Curd_model;
    public $Forms;
    public $upload;

    
    public $session;

 
    function addTaskCategory(){


        $this->load->view('Task\Task Category\AddCustomTask.php');

        $this->load->model('Forms');
        $forms = $this->Forms->view();
    
       

        $this->load->model('taskCategoryModel');
        $result = $this->taskCategoryModel->viewPackageData();
        $data = array();
        $data['result'] = $result;
        $data['forms'] = $forms;


        $this->load->model('taskCategoryModel');

        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Task\Task Category\AddCustomTask.php', $data);
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

            $data['deadline'] = $this->input->post('deadline');
            $data['form'] = $this->input->post('form');
            $data['size'] = $this->input->post('size');


            $data['cw'] = $this->input->post('CW');
            $data['hcw'] = $this->input->post('HCW');
            $data['gd'] = $this->input->post('GD');



            $data['hgd'] = $this->input->post('HGD');
            $data['smm'] = $this->input->post('SMM');
            $data['hsmm'] = $this->input->post('HSMM');


            $data['ti'] = $this->input->post('TI');
            $data['hti'] = $this->input->post('HTI');
            $data['admin'] = $this->input->post('Admin');

            $data['se'] = $this->input->post('SE');
            $data['hse'] = $this->input->post('HSE');
            $data['tc'] = $this->input->post('TC');

            $data['htc'] = $this->input->post('HTC');

            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";


            $this->taskCategoryModel->newpackage($data);
            redirect(base_url() . 'index.php/TaskCategoryContro/viewTask');
        }


    }



    function viewTask()
    {


    $this->load->model('Forms');
        $forms = $this->Forms->view();
    
       

        $this->load->model('taskCategoryModel');
        $result = $this->taskCategoryModel->viewPackageData();
        $data = array();
        $data['result'] = $result;
        $data['forms'] = $forms;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Task\Task Category\ViewTaskCategory.php', $data);
        
    }



    function updateData($userData) {
        $this->load->model('taskCategoryModel');
        
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
            $data['Slug'] = $this->input->post('Slug');

            $data['deadline'] = $this->input->post('deadline');
            $data['form'] = $this->input->post('form');
            $data['size'] = $this->input->post('size');


            $data['cw'] = $this->input->post('CW');
            $data['hcw'] = $this->input->post('HCW');
            $data['gd'] = $this->input->post('GD');



            $data['hgd'] = $this->input->post('HGD');
            $data['smm'] = $this->input->post('SMM');
            $data['hsmm'] = $this->input->post('HSMM');


            $data['ti'] = $this->input->post('TI');
            $data['hti'] = $this->input->post('HTI');
            $data['admin'] = $this->input->post('Admin');

            $data['se'] = $this->input->post('SE');
            $data['hse'] = $this->input->post('HSE');
            $data['tc'] = $this->input->post('TC');

            $data['htc'] = $this->input->post('HTC');

            //    echo "<pre>";
            // print_r($data);
            // echo "<pre>";
          

            // Update package data
            $this->taskCategoryModel->updatePackage($userData, $data);
    
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/TaskCategoryContro/viewTask');
        } else {
            // If form is not submitted, load the edit view with the user data
            // Load the user data based on $userData['id']
            $result = $this->taskCategoryModel->editPackage($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
    
            // Load view with the user data
            $this->load->view('Task\Task Category\EditCustomTask.php', $data);
        }
    }
    


    function deleteData($userData)
    {

        $this->load->model('taskCategoryModel');
        $this->taskCategoryModel->dataDelete($userData);
        redirect(base_url() . 'index.php/TaskCategoryContro/viewTask');
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('taskCategoryModel');
            $up_Status = $this->taskCategoryModel->updateStatus();
           

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/TaskCategoryContro/viewTask');
        }
     
    }















}