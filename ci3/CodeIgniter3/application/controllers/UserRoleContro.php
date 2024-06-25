<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserRoleContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UserModel;
    public $GenrateCalender;
    public $RoleModel;
    public $session;
    public $upload;

    //for view

    // addnewclient1 variable name

    function viewRoles()
    {
        $this->load->model('RoleModel');
        $roleResult = $this->RoleModel->viewRoles(); // Store role data in $roleResult variable

        $this->load->model('UserModel');
        $userResult = $this->UserModel->viewData(); // Store user data in $userResult variable

        $data = array(
            'roleResult' => $roleResult, // Pass role data to view using 'roleResult' key
            'userResult' => $userResult,
        );

        $this->load->view('SideHeadFoot.php');
        $this->load->view('User/ViewRole.php', $data);
    }


    // for inserting


    function addUser()
    {

        $this->load->model('UserModel');

        $this->form_validation->set_rules('username', 'username', 'required');
        if ($this->form_validation->run() == false) {
        } else {

            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 MB max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    echo "File uploaded successfully <br>";
                    $data['image'] = $this->upload->data('file_name');
                    print_r($this->upload->data('file_name'));
                } else {
                    $error['err'] = $this->upload->display_errors();
                    echo $error['err'];
                }
            } else {
                // No file selected, set image field to null
                $data['image'] = null;
            }
            
            
            //Databse field                       //  form field
            $data['username'] = $this->input->post('username');
            $data['email'] = $this->input->post('email');
            $data['name'] = $this->input->post('name');
            $data['role'] = $this->input->post('role');
            $data['mob_no'] = $this->input->post('mob_no');
            $data['status'] = $this->input->post('status');
            $data['new_password'] = $this->input->post('new_password');
            $data['Confirm_Password	'] = $this->input->post('confirm_password');
            $data['admin_password'] = $this->input->post('admin_password');
        

            $this->UserModel->insertRole($data);

            redirect(base_url() . 'index.php/UserRoleContro/viewRoles');
        }
    }


    function editData($userData) {
        $this->load->model('UserModel');
        
        // Check if form is submitted
        if ($this->input->post()) {
            // Get form data
            $updated_data = array(

                
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),

                'role' => $this->input->post('role'),
                'mob_no' => $this->input->post('mob_no'),
                'status' => $this->input->post('status'),

                'new_password' => $this->input->post('new_password'),
                'Confirm_Password' => $this->input->post('confirm_password'),
                'admin_password' => $this->input->post('admin_password'),
            );
    
            // Update package data
            $this->UserModel->updateRoles($userData, $updated_data);
            
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/UserRoleContro/viewRoles');
        } else {
            
            $result = $this->UserModel->editDataClient($userData);
    
            // Prepare data to pass to the view
            $data = array(
                'result' => $result
            );
          
    
            // Load view with the user data
            $this->load->view('User\edit_role.php', $data);
        }
    }
    






    // // for delete
    function deleteData($userData)
    {

        $this->load->model('UserModel');
        
        $this->UserModel->dataDelete($userData);
        redirect(base_url() . 'index.php/UserRoleContro/viewRoles');
    }


    // for Update
    function updateData($userData) {
        $this->load->model('UserModel');
        
        // Check if form is submitted
        if ($this->input->post()) {
            // Get form data
            $updated_data = array(
                'new_password' => $this->input->post('password'),
                'Confirm_Password' => $this->input->post('confirm_password'),
                'admin_password' => $this->input->post('admin_password'),
            );
    
            // Update package data
            $this->UserModel->updateRoles($userData, $updated_data);
    
            // Redirect to desired page after successful update
            redirect(base_url() . 'index.php/UserRoleContro/viewRoles');
        } 
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('UserModel');
            $up_Status = $this->UserModel->updateStatus();
           

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/UserRoleContro/viewRoles');
        }
     
    }
}
