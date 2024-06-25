<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PackagesController extends CI_Controller
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

        $this->form_validation->set_rules('Package_name', 'Package_name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Package/Packages/AddPackage.php', $data);
        } else {
            $data = $this->input->post();
            $postdata = $this->input->post('postdata');
            $dataArray = json_decode($postdata, true);

            foreach ($dataArray as $item) {
                $quantity = $item['quantity'];
                $name = $item['name'];
                $price = $item['price'];

                $packageData = array(
                    'quantity' => $quantity,
                    'name' => $name,
                    'price' => $price,
                    'Package_name' => $this->input->post('Package_name'), // Set package name correctly
                    'status' => $this->input->post('status'),
                    'category' => $this->input->post('category')
                );

                // Print or process the package data as needed
                print_r($packageData);

                // Optionally, save each item to the database
                $this->PackageModel->newpackage($packageData);
            }

            // Redirect or perform additional actions
            redirect(base_url() . 'index.php/PackagesController/viewPackage');
        }
    }






    function viewPackage()
    {

        $this->load->model('PackageModel');
        $result = $this->PackageModel->viewPackageData();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Package/Packages/ViewPackage', $data);
    }



    public function updateData($Package_name)
    {
        $this->load->model('PackageModel');

        // Fetch existing package data
        $result = $this->PackageModel->editPackageByName($Package_name);
        $categories = $this->PackageModel->getCategories();
        $quantity = $this->PackageModel->getUserData($Package_name); // Assuming you have this method to fetch quantities

        $data = array();
        $data['result'] = $result;
        $data['categories'] = $categories;
        $data['quantities'] = $quantity;
        $data['result1'] = $this->PackageModel->getUserData($Package_name); // Assuming this method fetches the necessary user data


        // echo "<pre>DATWS";
        // print_r( $data);      
        // echo "<pre>";


        $this->form_validation->set_rules('Package_name', 'Name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Package/Packages/EditPackage', $data);
        } else {
            // Prepare data for update
            $updateData = array();
            $updateData['Package_name'] = $this->input->post('Package_name');
            $updateData['status'] = $this->input->post('status');
            $updateData['category'] = $this->input->post('category');
            $quantities = $this->input->post('quantity');
            $name = $this->input->post('namevalue');
            $id = $this->input->post('idvalue');

            $data = $this->input->post();
            $postdata = $this->input->post('postdata');
            $dataArray = json_decode($postdata, true);


            echo "<pre>";
            print_r($name);
            print_r($id);
            print_r($quantities);
            echo "<pre>";


            for ($i = 0; $i < count($name); $i++) {

                $dataArray[$i]["name"] = $name[$i];
                $dataArray[$i]["id"] = $id[$i];
                $dataArray[$i]["quantity"] = $quantities[$i];
                // echo "hello";
            }

            $packagename = $this->input->post('Package_name');

            // $previousdata = $this->PackageModel->getpackagebyname($packagename);

            // print_r($previousdata);
            print_r($dataArray);








            foreach ($dataArray as $item) {
                $this->PackageModel->updatepackagequantity($item);
            }

            redirect(base_url() . 'index.php/PackagesController/viewPackage');
        }






        // 

    }

    // // for delete
    function deleteData()
    {

        $this->load->model('PackageModel');
        // $result = $this->PackageModel->editPackage($userData);

        // if (empty($result)) {
        //     redirect(base_url() . 'index.php/PackagesController/viewPackage');
        // }
        // $this->PackageModel->PackageDelete($userData);
        // redirect(base_url() . 'index.php/PackagesController/viewPackage');

        $userData = $this->uri->segment(3);
        $this->PackageModel->PackageDelete($userData);
        echo json_encode(['Success' => 'Data deleted']);
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('PackageModel');
            $up_Status = $this->PackageModel->updateStatus();


            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/PackagesController/viewPackage');
        }
    }
}
