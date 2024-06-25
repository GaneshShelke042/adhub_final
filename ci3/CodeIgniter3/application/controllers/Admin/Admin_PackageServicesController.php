<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_PackageServicesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load required components
        $this->load->library('form_validation');
        $this->load->model('PackageServicesModel');
        $this->load->model('PackageCategoryModel');
        $this->load->model('PackageModelGST');
        $this->load->model('CR_WriterModel/Cr_WriterModel');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper('url');
        // Load the permission library
        // $this->load->library('head_team_lead/head_tl_permission');




        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('CR_WriterModel/Cr_WriterModel');

        // Set the name condition
        $name = 'Admin';
        $statuses = $this->Cr_WriterModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];

        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];

        $this->load->view('Admin\Admin_SideHeadFoot.php', $data);

        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^





    }


    public $db;
    public $form_validation;
    public $PackageServicesModel;
    public $PackageCategoryModel;
    public $PackageModelGST;
    public $Cr_WriterModel;
    public $session;
    public $upload;
    public $Head_TL_Permission;


    function addnewpackage()
    {


        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->viewPackageData();
        $data['result'] = $result;


        $this->load->model('PackageModelGST');
        $result1 = $this->PackageModelGST->viewPackageData();
        $data['result1'] =  $result1;



        // $this->load->view('Package\Package Services\AddPackageServies.php');

        $this->load->model('PackageServicesModel');



        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {

            // $this->load->view('SideHeadFoot.php');
            $this->load->view('Admin\Package\Package Services\AddPackageServies.php', $data);
        } else {



            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 112048; // 2 mb max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            if ($this->upload->do_upload('image')) {
                echo "file uploaded successful <br>";
                $data['imagepath'] = $this->upload->data('full_path');
                print_r($this->upload->data('full_path'));
            } else {
                $error['err'] = $this->upload->display_errors();
                echo $error['err'];
                $this->load->view('Admin\Package\Package Services\AddPackageServies.php');
            }







            //Databse field                       //  form field

            // $data['image_path'] = $this->input->post('image');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');

            $data['short_description'] = $this->input->post('description');
            $data['category'] = $this->input->post('category');
            $data['video_link'] = $this->input->post('vidio');




            $data['price'] = $this->input->post('price');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount-type');



            $data['sub_total'] = $this->input->post('sub-total');
            $data['gst'] = $this->input->post('gst');
            $data['gst_type'] = $this->input->post('gst-type');



            $data['gst_amount'] = $this->input->post('gst-amount');
            $data['amount'] = $this->input->post('amount');
            $data['total'] = $this->input->post('total');



            $data['cw'] = $this->input->post('CW');
            $data['hcw'] = $this->input->post('HCW');
            $data['gd'] = $this->input->post('GD');



            $data['hgd'] = $this->input->post('HGD');
            $data['smm'] = $this->input->post('SMM');
            $data['hsmm'] = $this->input->post('HSMM');


            $data['ti'] = $this->input->post('TI');
            $data['hti'] = $this->input->post('HTI');
            $data['admin'] = $this->input->post('Admin');

            $data['se'] = $this->input->post('SE');
            $data['hse'] = $this->input->post('HSE');
            $data['tc'] = $this->input->post('TC');

            $data['htc'] = $this->input->post('HTC');



            $this->PackageServicesModel->newpackageServices($data);
            redirect(base_url() . 'index.php/Admin/Admin_PackageServicesController/viewpackage');
        }
    }



    function viewpackage()
    {



        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->viewPackageServices();

        $data = array();
        $data['result'] = $result;

        
        $this->load->view('Admin\Package\Package Services\ViewPackageServices.php', $data);
    }






    // $userData
    function updateData($userData)
    {

        // $this->load->view('SideHeadFoot.php');
        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->editPackage($userData);

        $data = array();
        $data['result'] = $result;

        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Admin\Package\Package Services\EditPackageServices.php', $data);
        } else {

            $data = array();


            //Databse field                       //  form field

            // $data['image_path'] = $this->input->post('image');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');

            $data['short_description'] = $this->input->post('description');
            $data['category'] = $this->input->post('category');
            $data['video_link'] = $this->input->post('vidio');




            $data['price'] = $this->input->post('price');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount-type');



            $data['sub_total'] = $this->input->post('Sub-Total');
            $data['gst'] = $this->input->post('gst');
            $data['gst_type'] = $this->input->post('gst-type');



            $data['gst_amount'] = $this->input->post('gst-ammount');
            $data['amount'] = $this->input->post('amount');
            $data['total'] = $this->input->post('total');



            $data['cw'] = $this->input->post('CW');
            $data['hcw'] = $this->input->post('HCW');
            $data['gd'] = $this->input->post('GD');



            $data['hgd'] = $this->input->post('HGD');
            $data['smm'] = $this->input->post('SMM');
            $data['hsmm'] = $this->input->post('HSMM');


            $data['ti'] = $this->input->post('TI');
            $data['hti'] = $this->input->post('HTI');
            $data['admin'] = $this->input->post('Admin');

            $data['se'] = $this->input->post('SE');
            $data['hse'] = $this->input->post('HSE');
            $data['tc'] = $this->input->post('TC');

            $data['htc'] = $this->input->post('HTC');



            $this->PackageServicesModel->updatePackage($userData, $data);
            redirect(base_url() . 'index.php/Admin/Admin_PackageServicesController/viewpackage');
        }
    }


    // for delete
    function deleteData($userData)
    {

        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->editPackage($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/Admin/Admin_PackageServicesController/viewpackage');
        }
        $this->PackageServicesModel->dataDelete($userData);
        redirect(base_url() . 'index.php/Admin/Admin_PackageServicesController/viewpackage');
    }
}
