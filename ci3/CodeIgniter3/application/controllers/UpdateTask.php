<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UpdateTask extends CI_Controller
{

    public $db;
    public $form_validation;
    public $UpdateTaskModel;
    public $session;


    // for inserting

    // function addNewTask()
    // {
    //     $this->load->model('UpdateTaskModel');



    //     $this->form_validation->set_rules('brand_name', 'brand_name', 'required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('UpdateTask.php');
    //     } else {


    //         $data = array();
    //         //Databse field                       //  form field
    //         $data['id'] = $this->input->post('id');
    //         $data['button_name'] = $this->input->post('editor_content');
    //         $data['chat_box_type'] = $this->input->post('editor_content');
    //         $data['chat_box_content'] = $this->input->post('editor_content');
    //         $data['created_at'] = $this->input->post('editor_content');
    //         $this->UpdateTaskModel->create1($data);

    //         redirect(base_url() . 'index.php/User_con/index');
    //     }
    // }

}
