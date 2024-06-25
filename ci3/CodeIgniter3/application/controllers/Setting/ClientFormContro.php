<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientFormContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Forms;
    // public $GenrateCalender;
    // public $AddNewCalendarModel;
    // public $PackageModel;
    public $session;
    public $upload;



    function viewSideBar()
    {
        $this->load->model('Forms');
        $result = $this->Forms->view();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Setting/SettingSideBar', $data);
    }
}