
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LanguageControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Curd_model;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $session;


    function viewLang()
    {
        $this->load->view('SideHeadFoot.php');
        $this->load->view('UpdatedTaskForm/Language.php');
    }

    
}
