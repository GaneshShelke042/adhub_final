<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gr_DesingerController extends CI_Controller
{

    public $db;
    public $form_validation;
    public $GR_DesingerModel;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $session;

    // http://localhost/adhub/ci3/CodeIgniter3/index.php/GR_Desinger/Gr_DesingerController/viewRoles

    public function viewRoles()
    {

        // Load the Cr_WriterModel model
        $this->load->model('GR_DesingerModel/GR_DesingerModel');
        
        // Set the name condition
        $name = 'Graphic_designer';
        
        // Call the getRoleStatus method of Cr_WriterModel to retrieve status values
        $statuses = $this->GR_DesingerModel->getRoleStatus($name);
    
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


        $this->load->view('GR_Desinger/GR_SideHeadFoot',$data);
    }

    
}
