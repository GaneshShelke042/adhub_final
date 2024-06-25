<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PainPointControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Curd_model;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $session;


    function viewPpainPoint()
    {
        $this->load->view('SideHeadFoot.php');
        $this->load->view('UpdatedTaskForm/PainPoint.php');
    }

    
}
