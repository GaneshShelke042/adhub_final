<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_con extends CI_Controller
{

    public $db;
    public $form_validation;
    public $Curd_model;
    public $GenrateCalender;
    public $AddNewCalendarModel;
    public $PackageServicesModel;
    public $PackageCategoryModel;
    public $PackageModel;
    public $session;
    public $upload;


    function apiDemo()
    {

        $request = $this->input->server('REQUEST_METHOD');

        if ($request == 'POST') {
            $inputes['name'] = $this->input->post('name');
            $inputes['age'] = $this->input->post('age');
            $inputes['mob'] = $this->input->post('mob');
            $this->load->model('Curd_model');
            $addnewclient1 = $this->Curd_model->insertdatatest($inputes);
        } else {
            echo 'method not allowed';
        }

        //    $a=array('name'=>'gova','age'=>27,'mob'=>'8007803727');
        //    print_r($a);
    }

    //for view

    // addnewclient1 variable name

    function index()
    {
        $this->load->model('Curd_model');
        $addnewclient1 = $this->Curd_model->viewData();
        $data1 = array();
        $data1['addnewclient1'] = $addnewclient1;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('ViewAddnewClientData', $data1);
    }

    // for inserting


    function addNewClient()
    {

        $this->load->model('AddNewCalendarModel');
        $calendar = $this->AddNewCalendarModel->viewCalendar();

        $this->load->model('PackageModel');
        $result = $this->PackageModel->viewPackageData();

        $data['result'] = $result;

        // $data = array();
        $data['calendar'] = $calendar;



        $this->load->view('SideHeadFoot.php');
        $this->load->model('Curd_model');



        $this->form_validation->set_rules('brand_name', 'brand_name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('AddnewClient.php', $data);
        } else {


            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 MB max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    echo "File uploaded successfully <br>";
                    $data['image'] = $this->upload->data('file_name');
                    print_r($this->upload->data('file_name'));
                } else {
                    $error['err'] = $this->upload->display_errors();
                    echo $error['err'];
                }
            } else {
                // No file selected, set image field to null
                $data['image'] = null;
            }
            
            // The rest of your code to insert data into the database goes here
            



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
            $data['social_media'] = $this->input->post('social_media');


            $data['brand_person'] = !empty($this->input->post('brand_person')) ? implode(",", $this->input->post('brand_person')) : null;
            $data['brand_Desig'] = !empty($this->input->post('brand_Desig')) ? implode(",", $this->input->post('brand_Desig')) : null;
            $data['brand_Mob'] = !empty($this->input->post('brand_Mob')) ? implode(",", $this->input->post('brand_Mob')) : null;

            $this->Curd_model->create1($data);
echo "<pre>";
            print_r(  $data);
            echo "<pre>";
            $this->load->model('GenrateCalender');
            // Insert only id into another table
            $data['id'] = $this->input->post('id');
            $data = array();
            $data['client_id'] = $this->input->post('id');

            $this->GenrateCalender->insert1($data); 




            redirect(base_url() . 'index.php/User_con/index');

        }
    }







    // for Update
    function editData($userData)
    {


        $this->load->model('AddNewCalendarModel');
        $calendar = $this->AddNewCalendarModel->viewCalendar();

        $this->load->model('Curd_model');
        $result = $this->Curd_model->editDataClient($userData);

        $this->load->model('PackageModel');
        $package = $this->PackageModel->viewPackageData();



        $data = array(
            'calendar' => $calendar,
            'result' => $result,
            'package' => $package,
        );


        $this->form_validation->set_rules('brand_name', 'brand_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot.php');
            $this->load->view('EditAddnewClientData', $data);
        } else {


            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 mb max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            // print_r($data);
            if ($this->upload->do_upload('image')) {
                echo "file uploaded successful <br>";
                $data['image'] = $this->upload->data('file_name');
                print_r($this->upload->data('file_name'));
            } else {
                $error['err'] = $this->upload->display_errors();
                echo $error['err'];
            }

            //Update Client Record

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


           


            $this->Curd_model->updateData($userData, $data);
            // print_r($data);
            $this->load->model('GenrateCalender');

            $imageLogo = $this->upload->data('file_name');
            $id['Client_id'] = $this->input->post('id');

            $this->GenrateCalender->updateDashboardImage($imageLogo, $id['Client_id']);

            redirect(base_url() . 'index.php/User_con/index');
        }
    }

    // for delete
    function deleteData($userData)
    {

        $this->load->model('Curd_model');
        $result = $this->Curd_model->editDataClient($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/User_con/index');
        }
        $this->Curd_model->dataDelete($userData);
        redirect(base_url() . 'index.php/User_con/index');
    }


    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('Curd_model');
            $up_Status = $this->Curd_model->updateStatus();

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/User_con/index');
        }
     
    }


    public function hold()
    {
        if (isset($_REQUEST['hold'])) {
            $this->load->model('Curd_model');
            $up_hold = $this->Curd_model->updateHold();

            if ($up_hold > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/User_con/index');
        }
     
    }




function clientPackage(){

    $this->load->model('PackageServicesModel');
    $result1 = $this->PackageServicesModel->viewPackageServices();
    $data['result1'] = $result1;

    $this->load->model('PackageCategoryModel');
    $result = $this->PackageCategoryModel->viewPackageData();
    $data['result'] = $result;


    $this->load->model('Curd_model');

    $this->load->view('SideHeadFoot.php');

    $this->form_validation->set_rules('Package_name', 'Package_name', 'required');
    
    if ($this->form_validation->run() == false) {
        $this->load->view('Client_package.php',$data);
    } else {
        $item=array();
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
       
        redirect(base_url() . 'index.php/User_con/index');
    }
}


function viewClient_Package()
    {
        $this->load->model('Curd_model');
        $result = $this->Curd_model->viewpackage();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('ViewClient_Package.php', $data);
    }

    public function pkg_Status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('Curd_model');
            $up_Status = $this->Curd_model->pkgStatus();
            $id = $_GET['Client_id'];
            echo $id ;

            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/User_con/viewClient_Package/'.$id);
        }
     
    }
    function deletepkg($userData)
    {

        $this->load->model('Curd_model');
        $id = $_GET['Client_id'];
        echo $id ;
        
        $this->Curd_model->pkgDelete($userData);
        redirect(base_url() . 'index.php/User_con/viewClient_Package/'.$id);
}



}