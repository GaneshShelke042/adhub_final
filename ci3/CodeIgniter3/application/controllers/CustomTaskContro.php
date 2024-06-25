<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomTaskContro extends CI_Controller
{


    public $db;
    public $form_validation;
    public $CustomTaskModel;
    public $taskCategoryModel;
    public $UserModel;
    public $Curd_model;
    public $Forms;

    public $session;

    function addNewClient()
    {
        // $this->load->view('SideHeadFoot.php');
        $this->load->model('CustomTaskModel');

        $this->load->model('taskCategoryModel');
        $result = $this->taskCategoryModel->viewPackageData();
        

        $this->load->model('Curd_model');
        $clients= $this->Curd_model->viewData();

        $this->load->model('UserModel');
        $userResult = $this->UserModel->viewData();

        $client = array();
        $client['clients'] = $clients;
        $client['result'] = $result;
        $client['userResult'] = $userResult;


        $this->form_validation->set_rules('clientSearch', 'clientSearch', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Task\Custom Task\AddCustomTask.php', $client);
        } else {

            echo "Hello";

            echo "<pre>";

            print_r($this->input->post());
            echo "</pre>";


            // $formDataArray = $this->input->post('formDataArray');

            // // Log received data for verification (optional)
            // log_message('debug', 'Received formDataArray: ' . json_encode($formDataArray));
    
            // // Process each row of formDataArray
            // foreach ($formDataArray as $row) {
            //     // Example: Accessing specific fields from each row
            //     $taskname = $row['taskname'];
            //     $deadline = $row['deadline'];
            //     $width = $row['width'];
            //     // Add more fields as needed
    
            //     // Perform your processing or database operations here
            // }
            


            $data = array();
            //Databse field                       //  form field
            $data['clientSearch'] = $this->input->post('clientSearch'); 
            $data['category'] = $this->input->post('category'); 
            $data['permissions'] = $this->input->post('permissions'); 
            $data['task_name'] =$this->input->post('taskname'); 
            $data['width'] = $this->input->post('width'); 
            $data['height'] = $this->input->post('height'); 
            $data['resolution'] = $this->input->post('resolution'); 
            $data['pixels'] = $this->input->post('pixels'); 
            $data['cmode'] = $this->input->post('cmode'); 
            $data['Orientation'] = $this->input->post('Orientation'); 
            $data['task_details'] = $this->input->post('information'); 
            $data['attachment'] = $this->input->post('attachment'); 



            $data['teamLeader'] = $this->input->post('teamLeader'); 
            $data['headCW'] = $this->input->post('headCW'); 
            $data['CW'] = $this->input->post('CW'); 
            $data['headGD'] = $this->input->post('headGD'); 
            $data['GD'] = $this->input->post('GD'); 
            $data['hSmm'] = $this->input->post('hSmm'); 
            $data['smm'] = $this->input->post('smm'); 
            $data['formDataJSON'] = $this->input->post('formDataJSON');
            // $this->CustomTaskModel->insertTask($data); 
 
 
            $data1 = array(); 
            $data1['client_name'] = $this->input->post('client_name'); 
            $data1['cTaskORgCalender'] = 1; 
            //  $this->CustomTaskModel->insertDashbord($data1); 

            echo "<pre>"; 
            print_r($data['formDataJSON']);
            echo "<pre>"; 
 
            // redirect(base_url().'index.php/CustomTaskContro/viewTask'); 
             
        }
    }
    



    function viewTask()
    {
        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->viewTask();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Task\Custom Task\ViewCustonTask', $data);
        
    }

    function updateTask($userData)
    {
        
        $this->load->view('SideHeadFoot.php');
        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->editTask($userData);


        $data = array();
        $data['result'] = $result;


        $this->form_validation->set_rules('client_name', 'client_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Task\Custom Task\EditCustomTask', $data);
        } else {


            //Update Client Record

            $data = array();
              //Databse field                       //  form field
              $data['client_name'] = $this->input->post('client_name');
              $data['category'] = $this->input->post('category');
              $data['permissions'] = $this->input->post('permissions');
              $data['task_name'] = $this->input->post('task_name');
            //   $data['deadline_datetime'] = $this->input->post('deadline');
            $selectedDeadline = $this->input->post('deadline'); // Assuming this is the selected deadline
              $data['deadline_datetime']  = date('Y-m-d H:i:s', strtotime($selectedDeadline));
              $data['task_details'] = $this->input->post('task_details1');
              $data['attachment'] = $this->input->post('attachment');
              $this->CustomTaskModel->updateTask($userData, $data);
              redirect(base_url().'index.php/CustomTaskContro/viewTask');
            // redirect('ViewAddnewClientData');
        }
    }

    
    // for delete
    function deleteTask($userData) {

        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->editTask($userData);

        if(empty($result)){
            redirect(base_url().'index.php/CustomTaskContro/viewTask');

        }
        $this->CustomTaskModel->deleteTask($userData);
        redirect(base_url().'index.php/CustomTaskContro/viewTask');
    }





    public function addQuestion()
    {
        // Load the Forms model
        $this->load->model('Forms');

        // Fetch the form view data
        $result = $this->Forms->view();
        $data = array();
        $data['result'] = $result;

        // Check if form is submitted
        if ($this->input->post()) {
            // Fetch existing answers from POST request
            $form_Name = $this->input->post('form_Name');
            $client_id = $this->input->post('client_id');
        } else {
            // Fetch existing answers from URI segment
            $client_id = $this->uri->segment(4);
            $form_Name = $this->uri->segment(3);
        }

        // Fetch existing answers
        $existingAnswers = $this->Forms->fetchAnswers($client_id, $form_Name);

        if (!empty($existingAnswers)) {
            $data['existingAnswers'] = $existingAnswers;
        }
        

        // Set form validation rules
        $this->form_validation->set_rules('form_Name', 'Form Name', 'required');
        $this->form_validation->set_rules('client_id', 'Client ID', 'required');

        if ($this->form_validation->run() == false) {
            // Load the views with form data
            $this->load->view('SideHeadFoot.php');
            $this->load->view('Task\Custom Task\showForm.php', $data);
        } else {
            // Prepare data for insertion or update
            $data = array(
                'form_name' => $this->input->post('form_Name'),
                'client_id' => $this->input->post('client_id'),
                'question' => implode(",", $this->input->post('question')),
                'ans' => implode(",", $this->input->post('ans')),
            );

            // Debugging statement to check if data is being prepared correctly


            // Additional debugging statement to see if this block is being executed
            echo "Checking if existing answers exist...<br>";

            if (!empty($existingAnswers)) {
                // Update existing answers
                echo "Existing answers found. Updating...<br>";
                $this->Forms->updateForm($client_id, $form_Name, $data);
            } else {
                // Insert new answers
                echo "No existing answers found. Inserting new data...<br>";
                $this->Forms->insertForm($data);
            }
        

            // Redirect to some page after processing
            // redirect(base_url() . 'index.php/UpdateClientContro/viewCalender/' . $data['client_id']);
        }
    }



    }