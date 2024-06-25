<?php

defined('BASEPATH') or exit('No direct script access allowed');
class paymentcontroller extends CI_Controller
{
    public $Curd_model;
    public $form_validation;
    public $paymentmodel;
    public $paymode;
    public $GSTmodel;
    public $upload;
    public $db;
    public $session;

    function viewpayment()
    {

        $this->load->model('Curd_model');
        $this->load->model('paymentmodel');

        $data['result'] = $this->Curd_model->viewData();
        $data['payment'] = $this->paymentmodel->viewpayment();



        $this->load->view('SideHeadFoot');
        $this->load->view('payment/paymentview', $data);
    }


    function addpaymentview($id)
    {
        $this->load->model('Curd_model');
        $this->load->library('form_validation');
        $this->load->model('paymode');
        $this->load->model('GSTmodel');

        $data['result'] = $this->Curd_model->editDataClient($id);
        $data['mode'] = $this->paymode->viewdata();
        $data['gst'] = $this->GSTmodel->view_Data();


        $this->form_validation->set_rules('Brand_Name', 'Brand_Name', 'required');
        $this->form_validation->set_rules('payment_amt', 'payment amt', 'required|numeric');
        $this->form_validation->set_rules('mode', 'mode', 'required');
        $this->form_validation->set_rules('GST_Rate', 'GST', 'required');
        $this->form_validation->set_rules('Gstcheck', 'GST check', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');

        if (empty($_FILES['payment_image'])) {
            $this->form_validation->set_rules('payment_image', 'payment image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot');
            $this->load->view('payment/addpayment', $data);
        } else {


            $insert_data = $this->input->post();
            if ($insert_data['Gstcheck'] === "GST Inclusive") {
                $insert_data["GST_Amt"] =  ($insert_data['payment_amt'] * $insert_data['GST_Rate']) / 100;
                $insert_data["Original_Amt"] = $insert_data['payment_amt'] -  $insert_data["GST_Amt"];
                echo  $insert_data["GST_Amt"]  . " This is GST AMt";
                echo "<br>";
                echo   $insert_data["Original_Amt"] . " This is original AMt";
                echo "<br>";
                echo $insert_data['payment_amt'] . " This is Total AMt";
                $config['upload_path'] = './payment_image/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 11264;
                $config['encrypt_name'] = false;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('payment_image')) {
                    date_default_timezone_set('Asia/Kolkata');

                    $insert_data['payment_date'] = date('Y-m-d H:i:s');
                    $insert_data['client_id'] = $id;
                    $insert_data['payment_image'] = $this->upload->data('file_name');
                    $this->load->model('paymentmodel');
                    if ($this->paymentmodel->addpayment($insert_data)) {
                        redirect(base_url() . 'index.php/paymentcontroller/viewpayment');
                    }
                } else {
                    $data['err'] = $this->upload->display_errors();
                    echo $data['err'];
                    $this->load->view('SideHeadFoot');
                    $this->load->view('payment/addpayment', $data);
                }
            } else {
                $insert_data["GST_Amt"] =  ($insert_data['payment_amt'] * $insert_data['GST_Rate']) / 100;
                $insert_data["Original_Amt"] = $insert_data['payment_amt'];
                $insert_data['payment_amt']  =  $insert_data["Original_Amt"]  + $insert_data["GST_Amt"];
                echo  $insert_data["GST_Amt"] . " This is GST AMt";
                echo "<br>";
                echo $insert_data["Original_Amt"] . " This is original AMt";
                echo "<br>";
                echo $insert_data['payment_amt'] . " This is Total AMt";
                $config['upload_path'] = './payment_image/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 11264;
                $config['encrypt_name'] = false;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('payment_image')) {
                    date_default_timezone_set('Asia/Kolkata');

                    $insert_data['payment_date'] = date('Y-m-d H:i:s');
                    $insert_data['client_id'] = $id;
                    $insert_data['payment_image'] = $this->upload->data('file_name');
                    $this->load->model('paymentmodel');
                    if ($this->paymentmodel->addpayment($insert_data)) {
                        redirect(base_url() . 'index.php/paymentcontroller/viewpayment');
                    }
                } else {
                    $data['err'] = $this->upload->display_errors();
                    echo $data['err'];
                    $this->load->view('SideHeadFoot');
                    $this->load->view('payment/addpayment', $data);
                }
            }
        }
    }

    function checkhistory($id)
    {
        $this->load->model('paymentmodel');

        $data['result'] = $this->paymentmodel->viewdatabyclient_id($id);
        // echo "<pre>";
        // print_r($data['result']);
        $this->load->view('SideHeadFoot');
        $this->load->view('payment/checkhistory', $data);
    }

    function viewpayment_filtered($clientid)
    {
        // Get user input from form
        $this->load->library('form_validation');
        $this->load->model('Curd_model');
        $this->load->model('paymentmodel');
        $this->form_validation->set_rules('from_date', 'From_date', 'required');
        $this->form_validation->set_rules('to_date', 'To_date ', 'required');

        $data = array();

        if ($this->form_validation->run() == false) {
            $this->load->model('paymentmodel');
            $data['result'] = $this->paymentmodel->viewdatabyclient_id($clientid);
            $this->load->view('SideHeadFoot');
            $this->load->view('payment/checkhistory', $data);
        } else {
            $fromDate = $this->input->post('from_date');
            $toDate = $this->input->post('to_date');
            // Load necessary models
            // echo $clientid;
            // Fetch data based on date range
            if ($this->paymentmodel->viewpayment_filtered($fromDate, $toDate, $clientid)) {
                $data['result'] =   $this->paymentmodel->viewpayment_filtered($fromDate, $toDate, $clientid);
                // Load the view with filtered data
                $this->load->view('SideHeadFoot');
                $this->load->view('payment/checkhistory', $data);
            } else {

                $data['result'] = $this->Curd_model->viewData();
                $data['payment'] = $this->paymentmodel->viewpayment();
                $this->load->view('SideHeadFoot');
                $this->load->view('payment/paymentview', $data);
            }
            // echo "<pre>";
            // print_r("hello");


        }
    }

    function editpayment()
    {
        // Get the client_id parameter from the URL segment
        $id = $this->uri->segment(3); // Assuming '57' is at segment index 3
        // echo $id;
        $this->load->model('paymentmodel');
        $this->load->model('paymode');
        $this->load->library('form_validation');
        $this->load->model('GSTmodel');
        $data['gst'] = $this->GSTmodel->view_Data();
        $data['result'] =  $this->paymentmodel->viewdatabyid($id);
        $data['mode'] =  $this->paymode->viewdata();


        //    echo "<pre>";
        //    print_r($data);
        $this->form_validation->set_rules('Brand_Name', 'Brand_Name', 'required');
        $this->form_validation->set_rules('payment_amt', 'payment amt', 'required|numeric');
        $this->form_validation->set_rules('mode', 'mode', 'required');
        $this->form_validation->set_rules('GST_Rate', 'GST', 'required');
        $this->form_validation->set_rules('Gstcheck', 'GST check', 'required');
        $this->form_validation->set_rules('Description', 'Description', 'required');

        $receiveddata = $this->input->post();

        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot');
            $this->load->view('payment/editpayment', $data);
        } else {
            echo "<pre>";
            print_r($receiveddata);


            if ($receiveddata['Gstcheck'] === "GST Inclusive") {
                $receiveddata["GST_Amt"] =  ($receiveddata['payment_amt'] * $receiveddata['GST_Rate']) / 100;
                $receiveddata["Original_Amt"] = $receiveddata['payment_amt'] -  $receiveddata["GST_Amt"];
                echo  $receiveddata["GST_Amt"]  . " This is GST AMt";
                echo "<br>";
                echo   $receiveddata["Original_Amt"] . " This is original AMt";
                echo "<br>";
                echo $receiveddata['payment_amt'] . " This is Total AMt";
                $config['upload_path'] = './payment_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|JPG';
                $config['max_size'] = 11264;
                $config['encrypt_name'] = false;
                $config['max_width'] = 0; // Set to 0 for no restriction on width
                $config['max_height'] = 0; // Set to 0 for no restriction on height
                $this->load->library('upload', $config);
                $dataforimage = $this->db->where("id", $id)->get('paymentdata')->row(); // old data for image delete old
                $file_path = './payment_image/' . $dataforimage->payment_image;


                if ($this->upload->do_upload('payment_image')) {
                    $receiveddata["payment_image"] = $this->upload->data('file_name');
                    if (file_exists($file_path)) {
                        // Attempt to delete the file   
                        if (unlink($file_path)) {
                            echo 'File deleted successfully.';
                        }
                    }
                } else {
                    $receiveddata['payment_image'] = $dataforimage->payment_image;
                }
                echo '<pre>';
                print_r($receiveddata);
                $this->paymentmodel->updatedata($id, $receiveddata);
                redirect(base_url() . 'index.php/paymentcontroller/checkhistory/' . $data['result']->client_id);
            } else {
                $receiveddata["GST_Amt"] =  ($receiveddata['payment_amt'] * $receiveddata['GST_Rate']) / 100;
                $receiveddata["Original_Amt"] = $receiveddata['payment_amt'];
                $receiveddata['payment_amt']  =  $receiveddata["Original_Amt"]  + $receiveddata["GST_Amt"];
                echo  $receiveddata["GST_Amt"] . " This is GST AMt";
                echo "<br>";
                echo $receiveddata["Original_Amt"] . " This is original AMt";
                echo "<br>";
                echo $receiveddata['payment_amt'] . " This is Total AMt";
                $config['upload_path'] = './payment_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|JPG';
                $config['max_size'] = 11264;
                $config['encrypt_name'] = false;
                $config['max_width'] = 0; // Set to 0 for no restriction on width
                $config['max_height'] = 0; // Set to 0 for no restriction on height
                $this->load->library('upload', $config);
                $dataforimage = $this->db->where("id", $id)->get('paymentdata')->row(); // old data for image delete old
                $file_path = './payment_image/' . $dataforimage->payment_image;


                if ($this->upload->do_upload('payment_image')) {
                    $receiveddata["payment_image"] = $this->upload->data('file_name');
                    if (file_exists($file_path)) {
                        // Attempt to delete the file   
                        if (unlink($file_path)) {
                            echo 'File deleted successfully.';
                        }
                    }
                } else {
                    $receiveddata['payment_image'] = $dataforimage->payment_image;
                }
                echo '<pre>';
                print_r($receiveddata);
                $this->paymentmodel->updatedata($id, $receiveddata);
                redirect(base_url() . 'index.php/paymentcontroller/checkhistory/' . $data['result']->client_id);
            }
        }
    }

    function Deletepayment()
    {
        $id = $this->uri->segment(3);
        echo "<pre>";
        print_r($id);
        $this->load->model('paymentmodel');
        $data['result'] =  $this->paymentmodel->viewdatabyid($id);
        print_r($data);
        $file_path = './payment_image/' . $data['result']->payment_image; // Replace this with the actual file path

        // Check if the file exists
        if (file_exists($file_path)) {
            // Attempt to delete the file
            if (unlink($file_path)) {
                echo 'File deleted successfully.';
            } else {
                echo 'Error deleting the file.';
            }
        } else {
            echo 'File does not exist.';
        }

        $this->paymentmodel->Deletepayment($id);
        redirect(base_url() . 'index.php/paymentcontroller/checkhistory/' . $data['result']->client_id);
    }



    function detailview()
    {
        $id = $this->uri->segment(3);
        // echo $id;
        $this->load->model("paymentmodel");
        $this->load->model("paymode");
        $data['result'] = $this->paymentmodel->viewdatabyid($id);
        $data['mode'] = $this->paymode->viewdata();
        // echo "<pre>";
        // print_r($data);
        $this->load->view('SideHeadFoot');
        $this->load->view('payment/View_payment', $data);
    }
}
