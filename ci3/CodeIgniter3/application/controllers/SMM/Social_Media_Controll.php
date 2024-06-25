<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_Media_Controll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $SmmSideBarModel;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $session;

    // http://localhost/adhub/ci3/CodeIgniter3/index.php/SMM/Social_Media_Controll/viewSmm

    public function viewSmm()
    {

        // Load the Cr_WriterModel model
        $this->load->model('SmmModel/SmmSideBarModel');
        
        // Set the name condition
        $name = 'Social Media Manager';
        
        // Call the getRoleStatus method of Cr_WriterModel to retrieve status values
        $statuses = $this->SmmSideBarModel->getRoleStatus($name);
    
        // Assign retrieved status values to the $data array
        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];
        // Load the view 'CR_Dashboard' and pass $data to it


        $this->load->view('Social_Media_Manager\SmmSideHeadFoot.php',$data);
    }

    
}
