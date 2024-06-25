<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Head_Smm_ClientControll extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Head_Smm_ClientModel;
    public $Head_SmmSideBarModel;
    public $UpdateClientPermissionModel;
    public $AddNewCalendarModel;
    public $session;


    //for view

    // addnewclient1 variable name

    function clientView()
    {
        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('Head_SmmModel/Head_SmmSideBarModel');

        // Set the name condition

        $name = 'Head Social Media Manager';
        $statuses = $this->Head_SmmSideBarModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];
        
        $this->load->view('Head_Social_Media_Manager\Head_SmmSideHeadFoot.php', $data);

        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^



        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is our normal controller for view display  VVVVVVVVVVVVVVVVVVVVVV


        echo $id_from_url= $this->session->userdata('user_id');
        echo $name_from_url= $this->session->userdata('name');



        $this->load->model('Head_SmmModel/Head_Smm_ClientModel');
        $addnewclient1 = $this->Head_Smm_ClientModel->viewClient();
        $data1 = array();
        $data1['addnewclient1'] = $addnewclient1;

        $this->load->model('UpdateClientPermissionModel');
        $User = $this->UpdateClientPermissionModel->viewData();

        $matchedClients = [];
        // $Login_id = $this->session->userdata('user_id');

        foreach ($addnewclient1 as $client) {
            foreach ($User as $user) {
                // Check if both client_id and user_id match
                if ($client['id'] == $user['client_id'] && $user['User_id'] == $id_from_url) {
                    // Add the matched client to the list
                    $matchedClients[] = $client;
                    // Break out of the inner loop once a match is found
                    break;
                }
            }
        }

        $data1['matchedClients'] = $matchedClients;


        $this->load->view('Head_Social_Media_Manager\Client\ViewClientD.php', $data1);


        // ^^^^^^^^^^^^^^^^^^^^^^^ TTHis is our normal controller for view display  ^^^^^^^^^^^^^^^^^^^^^^
    }

    // for inserting


    // function addNew_Smm_Client()
    // {
    //     //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for Calendar  VVVVVVVVVVVVVVVVVVVVVV

    //     $this->load->model('AddNewCalendarModel');
    //     $calendar = $this->AddNewCalendarModel->viewCalendar();

    //     $data = array();
    //     $data['calendar'] = $calendar;

    //     // ^^^^^^^^^^^^^^^^^^^^^^^ TTHis is for Calendar  ^^^^^^^^^^^^^^^^^^^^^^



    //     //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

    //     $this->load->model('Head_SmmModel/Head_SmmSideBarModel');

    //     // Set the name condition

    //     $name = 'Head Social Media Manager';
    //     $statuses = $this->Head_SmmSideBarModel->getRoleStatus($name);


    //     $data['myClientStatus'] = $statuses['Client'];
    //     $data['myDashboardStatus'] = $statuses['Dashboard'];
    //     $data['myExamsStatus'] = $statuses['My_Exams'];
    //     $data['myVideosStatus'] = $statuses['My_Videos'];
    //     $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
    //     $data['myPackage_Category'] = $statuses['Package_Category'];
    //     $data['myPackage_GST'] = $statuses['Package_GST'];
    //     $data['myPackage_Service'] = $statuses['Package_Service'];
    //     $data['myPackage'] = $statuses['Package'];
        
    //     $this->load->view('Head_Social_Media_Manager\Head_SmmSideHeadFoot.php', $data);

    //     // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^




    //     //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is our normal controller for view display  VVVVVVVVVVVVVVVVVVVVVV

    //     $this->load->model('Head_SmmModel/Head_Smm_ClientModel');



    //     $this->form_validation->set_rules('brand_name', 'brand_name', 'required');
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('Head_Social_Media_Manager\Client\AddnewClient.php');
    //     } else {


    //         $data = array();
    //         //Databse field                       //  form field
    //         // $data['id'] = $this->input->post('id');
    //         $data['brand_name'] = $this->input->post('brand_name');
    //         $data['package'] = $this->input->post('package');
    //         $data['status'] = $this->input->post('status');
    //         $data['owner_name'] = $this->input->post('owner_name');
    //         $data['calendar_type'] = $this->input->post('calender');
    //         $data['mobile_number'] = $this->input->post('mobile');
    //         $data['alternate_mobile_number'] = $this->input->post('Altmobile');
    //         $data['address'] = $this->input->post('address');
    //         $data['state'] = $this->input->post('state');
    //         $data['district_name'] = $this->input->post('district');
    //         $data['taluka_name'] = $this->input->post('taluka');
    //         $data['pin_code'] = $this->input->post('pincode');
    //         $data['reference_by'] = $this->input->post('reference');
    //         $data['sales_executive'] = $this->input->post('executive');
    //         $this->Head_Smm_ClientModel->insertClient($data);


    //         //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is  for GenrateCalender  VVVVVVVVVVVVVVVVVVVVVV


    //         //     $this->load->model('GenrateCalender');
    //         //     // Insert only id into another table
    //         //     $data = array();
    //         //     $data['client_id'] = $this->input->post('id');

    //         //     $this->GenrateCalender->insert1($data); // replace AnotherModel with the appropriate model name

    //         // ^^^^^^^^^^^^^^^^^^^^^^^ THis is  for GenrateCalender  ^^^^^^^^^^^^^^^^^^^^^^


    //             redirect(base_url() . 'index.php/SMM/Smm_ClientControll/clientView');



    //         // ^^^^^^^^^^^^^^^^^^^^^^^ TTHis is our normal controller for view display  ^^^^^^^^^^^^^^^^^^^^^^
    //     }
    // }







    // // // for Update
    // function editData($userData)
    // {

    //     $this->load->view('SideHeadFoot.php');
    //     $this->load->model('CR_WriterModel/Cr_ClientModel');
    //     $result = $this->Cr_ClientModel->editDataClient($userData);


    //     $data = array();
    //     $data['result'] = $result;

    //     $this->form_validation->set_rules('brand_name', 'brand_name', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('EditAddnewClientData', $data);
    //     } else {


    //         //Update Client Record

    //         $data = array();
    //         //Databse field                       //  form field
    //         $data['brand_name'] = $this->input->post('brand_name');
    //         $data['package'] = $this->input->post('package');
    //         $data['status'] = $this->input->post('status');
    //         $data['owner_name'] = $this->input->post('owner_name');
    //         $data['calendar_type'] = $this->input->post('calender');
    //         $data['mobile_number'] = $this->input->post('mobile');
    //         $data['alternate_mobile_number'] = $this->input->post('Altmobile');
    //         $data['address'] = $this->input->post('address');
    //         $data['state'] = $this->input->post('state');
    //         $data['district_name'] = $this->input->post('district');
    //         $data['taluka_name'] = $this->input->post('taluka');
    //         $data['pin_code'] = $this->input->post('pincode');
    //         $data['reference_by'] = $this->input->post('reference');
    //         $data['sales_executive'] = $this->input->post('executive');
    //         $this->Cr_ClientModel->updateData($userData, $data);
    //         redirect(base_url() . 'index.php/User_con/index');
    //         // redirect('ViewAddnewClientData');
    //     }
    // }

    // // for delete
    // function deleteData($userData)
    // {

    //     $this->load->model('Curd_model');
    //     $result = $this->Curd_model->editDataClient($userData);

    //     if (empty($result)) {
    //         redirect(base_url() . 'index.php/User_con/index');
    //     }
    //     $this->Curd_model->dataDelete($userData);
    //     redirect(base_url() . 'index.php/User_con/index');
    // }
}
