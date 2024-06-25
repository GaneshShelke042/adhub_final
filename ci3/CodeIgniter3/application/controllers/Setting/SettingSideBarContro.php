<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingSideBarContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Forms;
    public $ClientFormModel;
    // public $AddNewCalendarModel;
    // public $PackageModel;
    public $session;
    public $upload;



    function viewSideBar()
    {
        $this->load->model('Forms');
        $this->load->model('ClientFormModel');
        $result = $this->Forms->view();
        $userData = 'client';
        $check = $this->ClientFormModel->editDataClient($userData);



        $data = array(
        'result' => $result,
        'check' => $check,
    );
        $this->load->view('SideHeadFoot.php');
        $this->load->view('Setting/SettingSideBar', $data);
    }



    function update(){
        $this->load->model('ClientFormModel');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'Question', 'required');
    
        if ($this->form_validation->run() == false) {
            // Handle form validation errors here if needed
        } else {
            $data = array(
                'sideName' => $this->input->post('sideName'),
                'question' => $this->input->post('question'),
                'tgform' => $this->input->post('tgform'),
                'sizeform' => $this->input->post('sizeform'),
                'painpoint' => $this->input->post('painpoint'),
                'requirement' => $this->input->post('requirement'),
                'language' => $this->input->post('language'),
                'offer' => $this->input->post('offer'),
                'accountaccess' => $this->input->post('accountaccess'),
                'CWDays' => $this->input->post('CWDays'),
                'CWAdvance' => $this->input->post('CWAdvance'),
                'GDDays' => $this->input->post('GDDays'),
                'GDAdvance' => $this->input->post('GDAdvance'),
                'SMMDays' => $this->input->post('SMMDays'),
                'SMMAdvance' => $this->input->post('SMMAdvance'), // Assuming you have this input field in your form
            );
    // print_r($data);
            $this->ClientFormModel->update($data);
            
            // Redirect after updating
            redirect(base_url() . '/index.php/Setting/SettingSideBarContro/viewSideBar');
        }
    }
    



}