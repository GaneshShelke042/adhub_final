<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TL_ClientControll extends CI_Controller
{


    public function __construct()
    {



        parent::__construct();


        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('TeamLeadModel/TL_TeamModel');

        // Set the name condition

        $name = 'Team Lead';
        $statuses = $this->TL_TeamModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];

        $this->load->view('TeamLead/TL_SideHeadFoot', $data);

        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^


    }



    public $db;
    public $form_validation;
    public $TL_ClientModel;
    public $TL_TeamModel;
    public $AddNewCalendarModel;
    public $UpdateClientPermissionModel;
    public $UserModel;
    public $Cr_ClientModel;
    public $PackageServicesModel;
    public $PackageCategoryModel;

    public $Curd_model;

    public $session;


    //for view

    // addnewclient1 variable name

    function clientView()
    {


        echo $id_from_url = $this->session->userdata('user_id');
        echo $name_from_url = $this->session->userdata('name');
        // Assuming $urlId contains the URL ID value


        echo ("(Team lead)");



        $this->load->model('TeamLeadModel/TL_ClientModel');
        $addnewclient1 = $this->TL_ClientModel->viewClient();
        $data['addnewclient1'] = $addnewclient1;




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

        $data['matchedClients'] = $matchedClients;
        // $this->session->set_userdata('matchedClients', $matchedClients);
        // redirect('TeamLead/TL_dashboardControll/viewDashboard');


        $this->load->view('TeamLead/Client/ViewClientD.php', $data);
    }

    // for inserting


    function addNew_Cr_Client()
    {
        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for Calendar  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('AddNewCalendarModel');
        $calendar = $this->AddNewCalendarModel->viewCalendar();

        $data = array();
        $data['calendar'] = $calendar;

        // ^^^^^^^^^^^^^^^^^^^^^^^ TTHis is for Calendar  ^^^^^^^^^^^^^^^^^^^^^^




        $this->load->model('CR_WriterModel/Cr_ClientModel');



        $this->form_validation->set_rules('brand_name', 'brand_name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('TeamLead\Client\AddnewClient.php', $data);
        } else {


            $data = array();
            //Databse field                       //  form field
            // $data['id'] = $this->input->post('id');
            $data['brand_name'] = $this->input->post('brand_name');
            $data['package'] = $this->input->post('package');
            $data['status'] = $this->input->post('status');
            $data['owner_name'] = $this->input->post('owner_name');
            $data['calendar_type'] = $this->input->post('calender');
            $data['mobile_number'] = $this->input->post('mobile');
            $data['alternate_mobile_number'] = $this->input->post('Altmobile');
            $data['address'] = $this->input->post('address');
            $data['state'] = $this->input->post('state');
            $data['district_name'] = $this->input->post('district');
            $data['taluka_name'] = $this->input->post('taluka');
            $data['pin_code'] = $this->input->post('pincode');
            $data['reference_by'] = $this->input->post('reference');
            $data['sales_executive'] = $this->input->post('executive');
            $this->Cr_ClientModel->insertClient($data);


            //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is  for GenrateCalender  VVVVVVVVVVVVVVVVVVVVVV


            //     $this->load->model('GenrateCalender');
            //     // Insert only id into another table
            //     $data = array();
            //     $data['client_id'] = $this->input->post('id');

            //     $this->GenrateCalender->insert1($data); // replace AnotherModel with the appropriate model name

            // ^^^^^^^^^^^^^^^^^^^^^^^ THis is  for GenrateCalender  ^^^^^^^^^^^^^^^^^^^^^^


            redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');



            // ^^^^^^^^^^^^^^^^^^^^^^^ TTHis is our normal controller for view display  ^^^^^^^^^^^^^^^^^^^^^^
        }
    }







    // // for Update
    function editData($userData)
    {

        // $this->load->view('SideHeadFoot.php');
        $this->load->model('CR_WriterModel/Cr_ClientModel');
        $result = $this->Cr_ClientModel->editDataClient($userData);


        $data = array();
        $data['result'] = $result;

        $this->form_validation->set_rules('brand_name', 'brand_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('TeamLead/Client/EditAddnewClientData', $data);
        } else {


            //Update Client Record

            $data = array();
            //Databse field                       //  form field
            $data['brand_name'] = $this->input->post('brand_name');
            $data['package'] = $this->input->post('package');
            $data['status'] = $this->input->post('status');
            $data['owner_name'] = $this->input->post('owner_name');
            $data['calendar_type'] = $this->input->post('calender');
            $data['mobile_number'] = $this->input->post('mobile');
            $data['alternate_mobile_number'] = $this->input->post('Altmobile');
            $data['address'] = $this->input->post('address');
            $data['state'] = $this->input->post('state');
            $data['district_name'] = $this->input->post('district');
            $data['taluka_name'] = $this->input->post('taluka');
            $data['pin_code'] = $this->input->post('pincode');
            $data['reference_by'] = $this->input->post('reference');
            $data['sales_executive'] = $this->input->post('executive');
            $this->Cr_ClientModel->updateData($userData, $data);
            redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');
            // redirect('ViewAddnewClientData');
        }
    }

    // for delete
    function deleteData($userData)
    {

        $this->load->model('Curd_model');
        $result = $this->Curd_model->editDataClient($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');
        }
        $this->Curd_model->dataDelete($userData);
        redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');
    }




    function clientPackage()
    {

        $this->load->model('PackageServicesModel');
        $result1 = $this->PackageServicesModel->viewPackageServices();
        $data['result1'] = $result1;

        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->viewPackageData();
        $data['result'] = $result;


        $this->load->model('Curd_model');


        $this->form_validation->set_rules('Package_name', 'Package_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('TeamLead/Client_package.php', $data);
        } else {
            $item = array();
            $data = $this->input->post();
            $postdata = $this->input->post('postdata');
            $dataArray = json_decode($postdata, true);


            foreach ($dataArray as $item) {
                $item['Client_id'] = $this->input->post('Client_id');
                $quantity = $item['quantity'];
                $name = $item['name'];
                $price = $item['price'];
                $item['Package_name'] = $this->input->post('Package_name');
                $item['status'] = $this->input->post('status');
                $item['category'] = $this->input->post('category');
                // print_r($item);
                $this->Curd_model->newpackage($item);
            }

            redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView');
        }
    }


    function viewClient_Package()
    {
        $this->load->model('Curd_model');
        $result = $this->Curd_model->viewpackage();
        $data = array();
        $data['result'] = $result;

        $this->load->view('TeamLead/ViewClient_Package.php', $data);
    }


    public function pkg_Status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('Curd_model');
            $up_Status = $this->Curd_model->pkgStatus();
            $id = $_GET['Client_id'];
            echo $id;

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/TeamLead/TL_ClientControll/clientView/' . $id);
        }
    }

    function deletepkg($userData)
    {

        $this->load->model('Curd_model');
        $id = $_GET['Client_id'];
        echo $id;

        $this->Curd_model->pkgDelete($userData);
        redirect(base_url() . 'index.php/TeamLead/TL_ClientControll/clientView/' . $id);
    }
}
