<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale_TL_PackagesController extends CI_Controller
{
    public $db;
    public $form_validation;
    public $PackageCategoryModel;
    public $PackageModel;
    public $PackageServicesModel;
    public $session;


  // for inserting
    function addNewClient()
    {

        $this->load->model('PackageServicesModel');
        $result1 = $this->PackageServicesModel->viewPackageServices();

        
        $data['result1'] = $result1;

        $this->load->model('PackageCategoryModel');
        $result = $this->PackageCategoryModel->viewPackageData();

        
        $data['result'] = $result;



        $this->load->view('SideHeadFoot.php');
        $this->load->model('PackageModel');


        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Package/Packages/AddPackage.php',$data);
        } else {



            $data = array();
            //Databse field                       //  form field
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['category'] = $this->input->post('category');
            $data['cart'] = $this->input->post('cart');
           
            $this->PackageModel->newpackage($data);

            redirect(base_url().'index.php/PackagesController/viewPackage');
        }
    }


    function viewPackage()
    {

        $this->load->model('PackageModel');
        $result = $this->PackageModel->viewPackageData();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Package/Packages/ViewPackage',$data);
    }



    // for Update
    function updateData($userData)
    {

        $this->load->view('SideHeadFoot.php');
        $this->load->model('PackageModel');
        $result = $this->PackageModel->editPackage($userData);


        $data = array();
        $data['result'] = $result;




        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Package/Packages/EditPackage', $data);
        } else {


           //Update Client Record

            $data = array();
           //Databse field                       //  form field
           $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['category'] = $this->input->post('category');
            $data['cart'] = $this->input->post('cart');
            $this->PackageModel->updatePackage($userData, $data);
            redirect(base_url().'index.php/PackagesController/viewPackage');
  
        }
    }

    // // for delete
    function deleteData($userData) {

        $this->load->model('PackageModel');
        $result = $this->PackageModel->editPackage($userData);

        if(empty($result)){
            redirect(base_url().'index.php/PackagesController/viewPackage');

        }
        $this->PackageModel->PackageDelete($userData);
        redirect(base_url().'index.php/PackagesController/viewPackage');
    }
}
