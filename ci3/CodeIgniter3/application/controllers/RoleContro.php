<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoleContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $RoleModel;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $session;

    //for view

    // addnewclient1 variable name

    function addNewRole()
    {
        $this->load->view('SideHeadFoot.php');
        $this->load->view('Role/NewRole.php');
        $this->load->model('RoleModel');

        $this->form_validation->set_rules('Role_name', 'Role_name', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() == false) {
            // Form validation failed, handle accordingly
        } else {
            $data = array(
                'Role_name' => $this->input->post('Role_name'),
                'status' => $this->input->post('status'),
                'kyc_form' => $this->input->post('kyc'),
                'agreement' => $this->input->post('agreement'),
                'Schedule' => $this->input->post('Schedule'),
                'Client' =>  implode(', ',$this->input->post('Client')),
                'Document_List' => $this->input->post('Document_List'),
                'Dashboard' =>   implode(', ', $this->input->post('Dashboard')),
                'My_Videos' => $this->input->post('Videos'),
                'My_Exams' =>  $this->input->post('Exams'),
                'Social_Media' => $this->input->post('Media'),

                
                'Package_Category' =>  $this->input->post('PCategory'),
                'Package_GST' => $this->input->post('GST'),
                'Package_Service' =>  $this->input->post('PService'),
                'Package' => $this->input->post('Package'),
                // 'Document_List' => $this->input->post('Document_List'), // Treat as string, not array
                // 'Dashboard' => implode(', ', $this->input->post('Dashboard')),
                // 'Document' => $this->input->post('Document'),
                // 'Document_Category' => implode(', ', $this->input->post('Category')),
                // 'Report' => implode(', ', $this->input->post('Report')),
                // 'Leads' => $this->input->post('Leads'),
                // 'Webchat' => implode(', ', $this->input->post('Webchat')),
                // 'Groupchat' => implode(', ', $this->input->post('Groupchat')),
                // 'My_Checklist' => implode(', ', $this->input->post('Checklist')),
                
            );
            // Pass data to the model for insertion
            $this->RoleModel->insertNewRole($data);

            redirect(base_url() . 'index.php/RoleContro/viewRoles');
        }
    }


    function viewRoles()
    {

        $this->load->model('RoleModel');
        $result = $this->RoleModel->viewRoles();
        $data1 = array();
        $data1['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Role\ViewRoles.php', $data1);
    }

    function editRoles($roleData)
    {



        $this->load->view('SideHeadFoot.php');
        $this->load->model('RoleModel');
        $result = $this->RoleModel->editRoles($roleData);
        $result1 = $this->RoleModel->viewRoles();

        $data['result1'] = $result1;
        $data['result'] = $result;

        $this->form_validation->set_rules('Role_name', 'Role_name', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() == false) {
            // Form validation failed, handle accordingly
            $this->load->view('Role\EditRole.php',$data);
        } else {
            $data = array();
                $data['Role_name'] = $this->input->post('Role_name');
                $data['status'] = $this->input->post('status');
                $data['kyc_form'] = $this->input->post('kyc');
                $data['agreement'] = $this->input->post('agreement');
                $data['Schedule' ] = $this->input->post('Schedule');
           
                $clientPost =  $this->input->post('Client');
                if (is_array($clientPost)) {
                $data['Client'] =   implode(', ', $this->input->post('Client'));
                }else{
                    $data['Client'] = 'NULL';
                }


                $CalendarPost =  $this->input->post('Calendar-Type');
                if (is_array($CalendarPost)) {
                $data['Calendar-Type'] =   implode(', ', $this->input->post('Calendar-Type'));
                }else{
                    $data['Calendar-Type'] = 'NULL';
                }
               
                $data['Document_List'] = $this->input->post('Document_List');


                $dashboardPost = $this->input->post('Dashboard');

                // Check if $dashboardPost is an array before imploding
                if (is_array($dashboardPost)) {
                    $data['Dashboard'] = implode(', ', $dashboardPost);
                } else {
                    // Handle case where no checkboxes are selected
                    $data['Dashboard'] = 'NULL'; // Or any default value you want to assign
                }



                $My_Videos = $this->input->post('Videos');

                // Check if $dashboardPost is an array before imploding
                if (is_array($My_Videos)) {
                    $data['My_Videos'] =  implode(', ', $this->input->post('Videos'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['My_Videos'] = 'NULL'; // Or any default value you want to assign
                }

                $My_Exams = $this->input->post('Exams');

                // Check if $dashboardPost is an array before imploding
                if (is_array($My_Exams)) {
                    $data['My_Exams'] =  implode(', ', $this->input->post('Exams'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['My_Exams'] = 'NULL'; // Or any default value you want to assign
                }



                $Social_Media = $this->input->post('Social_Media');

                // Check if $dashboardPost is an array before imploding
                if (is_array($Social_Media)) {
                    $data['Social_Media'] =  implode(', ', $this->input->post('Social_Media'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['Social_Media'] = 'NULL'; // Or any default value you want to assign
                }


               
     

                $PCPost =  $this->input->post('PCategory');
                if (is_array($PCPost)) {
                $data['Package_Category'] =   implode(', ', $this->input->post('PCategory'));
                }else{
                    $data['Package_Category'] = 'NULL';
                }
               
                $data['Document_List'] = $this->input->post('Document_List');
                

                $PGPost =  $this->input->post('GST');
                if (is_array($PGPost)) {
                $data['Package_GST'] =   implode(', ', $this->input->post('GST'));
                }else{
                    $data['Package_GST'] = 'NULL';
                }


                $PSPost =  $this->input->post('PService');
                if (is_array($PSPost)) {
                $data['Package_Service'] =   implode(', ', $this->input->post('PService'));
                }else{
                    $data['Package_Service'] = 'NULL';
                }

                $PKPost =  $this->input->post('Package');
                if (is_array($PKPost)) {
                $data['Package'] =   implode(', ', $this->input->post('Package'));
                }else{
                    $data['Package'] = 'NULL';
                }


                $My_Videos = $this->input->post('Videos');

                // Check if $dashboardPost is an array before imploding
                if (is_array($My_Videos)) {
                    $data['My_Videos'] =  implode(', ', $this->input->post('Videos'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['My_Videos'] = 'NULL'; // Or any default value you want to assign
                }

                $Forms = $this->input->post('Forms');

                // Check if $dashboardPost is an array before imploding
                if (is_array($Forms)) {
                    $data['Forms'] =  implode(', ', $this->input->post('Forms'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['Forms'] = 'NULL'; // Or any default value you want to assign
                }

                $GenerateCalendar = $this->input->post('GenerateCalendar');

                // Check if $dashboardPost is an array before imploding
                if (is_array($GenerateCalendar)) {
                    $data['GenerateCalendar'] =  implode(', ', $this->input->post('GenerateCalendar'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['GenerateCalendar'] = 'NULL'; // Or any default value you want to assign
                }


                $ClientPackage = $this->input->post('ClientPackage');

                // Check if $dashboardPost is an array before imploding
                if (is_array($ClientPackage)) {
                    $data['ClientPackage'] =  implode(', ', $this->input->post('ClientPackage'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['ClientPackage'] = 'NULL'; // Or any default value you want to assign
                }

                $digitalfile = $this->input->post('digitalfile');

                // Check if $dashboardPost is an array before imploding
                if (is_array($digitalfile)) {
                    $data['digitalfile'] =  implode(', ', $this->input->post('digitalfile'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['digitalfile'] = 'NULL'; // Or any default value you want to assign
                }


                $users = $this->input->post('users');

                // Check if $dashboardPost is an array before imploding
                if (is_array($users)) {
                    $data['users'] =  implode(', ', $this->input->post('users'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['users'] = 'NULL'; // Or any default value you want to assign
                }

                $setting = $this->input->post('setting');

                // Check if $dashboardPost is an array before imploding
                if (is_array($setting)) {
                    $data['setting'] =  implode(', ', $this->input->post('setting'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['setting'] = 'NULL'; // Or any default value you want to assign
                }


                $Groupchat = $this->input->post('groupchat');

                // Check if $dashboardPost is an array before imploding
                if (is_array($Groupchat)) {
                    $data['Groupchat'] =  implode(', ', $this->input->post('groupchat'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['Groupchat'] = 'NULL'; // Or any default value you want to assign
                }

                $taskList = $this->input->post('taskList');

                // Check if $dashboardPost is an array before imploding
                if (is_array($taskList)) {
                    $data['taskList'] =  implode(', ', $this->input->post('taskList'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['taskList'] = 'NULL'; // Or any default value you want to assign
                }


                $customTask = $this->input->post('customTask');

                // Check if $dashboardPost is an array before imploding
                if (is_array($customTask)) {
                    $data['customTask'] =  implode(', ', $this->input->post('customTask'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['customTask'] = 'NULL'; // Or any default value you want to assign
                }


                $taskCategory = $this->input->post('taskCategory');

                // Check if $dashboardPost is an array before imploding
                if (is_array($taskCategory)) {
                    $data['taskCategory'] =  implode(', ', $this->input->post('taskCategory'));
                } else {
                    // Handle case where no checkboxes are selected
                    $data['taskCategory'] = 'NULL'; // Or any default value you want to assign
                }



               
                $data['Document_List'] = $this->input->post('Document_List');    
                

            
            $this->RoleModel->updateRoles($roleData, $data);
            redirect(base_url() . 'index.php/RoleContro/viewRoles');
        }
    }


    function deleteRoles($userData)
    {

        $this->load->model('RoleModel');
        $result = $this->RoleModel->editRoles($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/RoleContro/viewRoles');
        }
        $this->RoleModel->dataRoles($userData);
        redirect(base_url() . 'index.php/RoleContro/viewRoles');
    }
}
