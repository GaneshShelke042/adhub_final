<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_con extends CI_Controller
{
    

    public $db;
    public $form_validation;
    public $CustomTaskModel;
    public $session;


    function viewTiket()
    {
        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->viewData();
        $data1 = array();
        $data1['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('ViewAddnewClientData', $data1);
    }

}