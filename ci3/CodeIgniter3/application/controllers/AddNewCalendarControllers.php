<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AddNewCalendarControllers extends CI_Controller
{
    public $db;
    public $form_validation;
    public $AddNewCalendarModel;
    public $session;

// for inserting 

    function insertData(){
        $this->load->model('AddNewCalendarModel');

                // Form validation rules

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('frequency', 'Frequency', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');


        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the form view
            $this->load->view('AddNewCalendarType.html');
        } else {

            $data = array();
            //Databse field                       //  form field
            $data['name'] = $this->input->post('name');
            $data['frequency'] = $this->input->post('selected_days');
            $data['selected_days'] = $this->input->post('frequency');   //long Day
            $data['status'] = $this->input->post('status');

            $this->AddNewCalendarModel->insertCalendar($data);

            redirect(base_url().'index.php/AddNewCalendarControllers/viewCalendar');
        }
    }



    // for View 

    function viewCalendar(){
        $this->load->model('AddNewCalendarModel');
        $calendar = $this->AddNewCalendarModel->viewCalendar();

        $data = array();
        $data['calendar'] = $calendar;
        $this->load->view('SideHeadFoot.php');
        $this->load->view('ViewCalendarType.php',$data);
    }

    function editCalendar($userData){
        $this->load->model('AddNewCalendarModel');
        $result = $this->AddNewCalendarModel-> editCalendar($userData);

        $data=array();
        $data['result']=$result;

        
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('frequency', 'frequency', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');

        if($this->form_validation->run()==false){
            $this->load->view('EditCalendar', $data);  
        } else {
            $data = array();
            //Databse field                       //  form field
            $data['name'] = $this->input->post('name');
            $data['frequency'] = $this->input->post('selected_days');
            $data['selected_days'] = $this->input->post('frequency');  //long Day
            $data['status'] = $this->input->post('status');

            $this->AddNewCalendarModel->updateCalendar($userData,$data);

            redirect(base_url().'index.php/AddNewCalendarControllers/viewCalendar');
        }
    }

    function deleteCalendar($userData){
        $this->load->model('AddNewCalendarModel');

        $this->AddNewCalendarModel->deleteCalendar($userData);
        redirect(base_url().'index.php/AddNewCalendarControllers/viewCalendar');

    }  
    
    
    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('AddNewCalendarModel');
            $up_Status = $this->AddNewCalendarModel->updateStatus();


            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/AddNewCalendarControllers/viewCalendar');
        }
    }




}