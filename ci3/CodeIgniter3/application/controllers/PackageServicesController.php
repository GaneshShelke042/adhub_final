<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PackageServicesController extends CI_Controller
{

    public $db;
    public $form_validation;
    public $PackageServicesModel;
    public $PackageCategoryModel;
    public $PackageModelGST;
    public $session;
    public $upload;

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

            $this->load->view('SideHeadFoot.php');
            $this->load->view('Package\Package Services\AddPackageServies.php', $data);
        } else {



            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 12048; // 2 MB max size (in KB)
            $config['encrypt_name'] = false;

            $this->load->library('upload', $config);
            $data = array();

            // Single file upload
            if ($this->upload->do_upload('image')) {
                $data['imagepath'] = $this->upload->data('file_name');
                echo "File uploaded successfully: " . $data['imagepath'] . "<br>";
            } else {
                $error['err'] = $this->upload->display_errors();
                echo $error['err'] . "<br>";
                // Handle errors accordingly or redirect to a view
                $this->load->view('Package\Package Services\AddPackageServies.php');
            }

            // Multiple file upload
            $uploaded_files = array();

            if (!empty($_FILES['multipalPics']['name'][0])) {
                $filesCount = count($_FILES['multipalPics']['name']);

                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userfile']['name'] = $_FILES['multipalPics']['name'][$i];
                    $_FILES['userfile']['type'] = $_FILES['multipalPics']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $_FILES['multipalPics']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $_FILES['multipalPics']['error'][$i];
                    $_FILES['userfile']['size'] = $_FILES['multipalPics']['size'][$i];

                    if ($this->upload->do_upload('userfile')) {
                        $uploaded_files[] = $this->upload->data('file_name');
                        echo "File uploaded successfully: " . $this->upload->data('file_name') . "<br>";
                    } else {
                        $error['err'] = $this->upload->display_errors();
                        echo $error['err'] . "<br>";
                        // Handle errors accordingly or redirect to a view
                        $this->load->view('Package\Package Services\AddPackageServies.php');
                    }
                }
            }

            $data['multipalPics'] = implode(",", $uploaded_files);

            //Databse field                       //  form field

            // $data['image_path'] = $this->input->post('image');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');

            $data['short_description'] = $this->input->post('description');
            $data['category'] = $this->input->post('category');
            $data['video_link'] = $this->input->post('vidio');
            $data['editor-content'] = $this->input->post('editor-content');




            $data['hidden_price'] = $this->input->post('hidden_price');

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

            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";

            $this->PackageServicesModel->newpackageServices($data);
            redirect(base_url() . 'index.php/PackageServicesController/viewpackage');
        }
    }



    function viewpackage()
    {

        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->viewPackageServices();

        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Package\Package Services\ViewPackageServices.php', $data);
    }
    // $userData



    function updateData($userData)
    {

        $this->load->view('SideHeadFoot.php');

        $this->load->model('PackageCategoryModel');
        $category = $this->PackageCategoryModel->viewPackageData();



        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->editPackage($userData);

        $this->load->model('PackageModelGST');
        $result1 = $this->PackageModelGST->viewPackageData();


        $data = array();
        $data['result'] = $result;
        $data['result1'] =  $result1;
        $data['category'] = $category;


        // echo "<pre>";
        // print_r($result);
        // echo "<pre>";




        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Package\Package Services\EditPackageServices', $data);
        } else {

            $config['upload_path'] = './Image/PackageServies/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 112048; // 2 mb max size
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data = array();
            // print_r($data);
            // Single file upload
           
            if ($this->upload->do_upload('image')) {
                $data['imagepath'] = $this->upload->data('file_name');
                echo "File uploaded successfully: " . $data['imagepath'] . "<br>";
                // print_r($data['imagepath']);
            } else {
              
                $error['err'] = $this->upload->display_errors();
                echo $error['err'] . "<br>";
                // Handle errors accordingly or redirect to a view
                $this->load->view('Package\Package Services\AddPackageServies.php');
            }

            // Multiple file upload
            $uploaded_files = array();

            // Handle multiple file uploads
            if (!empty($_FILES['multipalPics']['name'][0])) {
                $filesCount = count($_FILES['multipalPics']['name']);
    
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userfile']['name'] = $_FILES['multipalPics']['name'][$i];
                    $_FILES['userfile']['type'] = $_FILES['multipalPics']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $_FILES['multipalPics']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $_FILES['multipalPics']['error'][$i];
                    $_FILES['userfile']['size'] = $_FILES['multipalPics']['size'][$i];
    
                    if ($this->upload->do_upload('userfile')) {
                        // File uploaded successfully, store the file name
                        $uploaded_files[] = $this->upload->data('file_name');
                        echo "File uploaded successfully: " . $this->upload->data('file_name') . "<br>";
                    } else {
                        // Handle upload errors
                        $error['err'] = $this->upload->display_errors();
                        echo $error['err'] . "<br>";
                        // Handle errors accordingly or redirect to a view
                        $this->load->view('Package/Package Services/AddPackageServies');
                        return; // Exit the function if there's an error
                    }
                }
            }
    
            // If no files were uploaded, handle accordingly
            if (empty($uploaded_files)) {
                echo "No files uploaded.";
            } else {
                // Store the uploaded file names in $data
                $data['multipalPics'] = implode(",", $uploaded_files);
            }



            // echo "<pre>ui67tiu7tui7ti";
            // print_r($data['multipalPics']);
            // echo "<pre>";



            //Databse field                       //  form field

            // $data['image_path'] = $this->input->post('image');
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');

            $data['short_description'] = $this->input->post('description');
            $data['category'] = $this->input->post('category');
            $data['video_link'] = $this->input->post('vidio');
            $data['editor-content'] = $this->input->post('editor-content');



            $data['price'] = $this->input->post('price');
            $data['discount'] = $this->input->post('discount');
            $data['discount_type'] = $this->input->post('discount-type');


            $data['hidden_price'] = $this->input->post('hidden_price');
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

            // echo "<pre>";
            // print_r($data);
            // echo "<pre>";


            $this->PackageServicesModel->updatePackage($userData, $data);
            redirect(base_url() . 'index.php/PackageServicesController/viewpackage');
        }
    }


    // for delete
    function deleteData($userData)
    {

        $this->load->model('PackageServicesModel');
        $result = $this->PackageServicesModel->editPackage($userData);

        if (empty($result)) {
            redirect(base_url() . 'index.php/PackageServicesController/viewpackage');
        }
        $this->PackageServicesModel->dataDelete($userData);
        redirect(base_url() . 'index.php/PackageServicesController/viewpackage');
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('PackageServicesModel');
            $up_Status = $this->PackageServicesModel->updateStatus();


            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/PackageServicesController/viewpackage');
        }
    }
}
