<?php
defined('BASEPATH') or exit('No direct script access allowed');


class SMCpayment extends CI_Controller
{
    public $Curd_model;
    public $installmentModel;
    public $GSTmodel;
    public $form_validation;
    public $SMC_model;
    public $upload;
    public $db;
    public $session;

    function SMC_View_payment()
    {
        $this->load->model("Curd_model");
        $data["result"] = $this->Curd_model->viewData();

        //     echo "<pre>";
        // print_r($data);
        $this->load->view("SideHeadFoot");
        $this->load->view("SMCPayment/SMCpaymentView", $data);
    }

    function addpayment()
    {
        $data["id"] = $this->uri->segment(3);

        $this->load->model("Curd_model");
        $this->load->model("installmentModel");
        $this->load->model("GSTmodel");
        $this->load->library("form_validation");
        $data["result"] = $this->Curd_model->editDataClient($data['id']);
        $data["installment"] = $this->installmentModel->viewinstallmentdata();
        $data["gst"] = $this->GSTmodel->view_Data();
        $this->form_validation->set_rules('Brand_Name', 'Brand Name', 'required');
        $this->form_validation->set_rules('installment', 'installment', 'required');
        $this->form_validation->set_rules('GST_Rate', 'GST Rate', 'required');
        $this->form_validation->set_rules('payment_amt', 'payment amt', 'required|numeric');
        $this->form_validation->set_rules('Gstcheck', 'GST Type', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("SideHeadFoot");
            $this->load->view("SMCPayment/addpayment", $data);
        } else {
            $datareceived['Brand_Name'] = $this->input->post('Brand_Name');
            $datareceived['installment'] = $this->input->post('installment');
            $datareceived['GST_Rate'] = $this->input->post('GST_Rate');
            $datareceived['Gstcheck'] = $this->input->post('Gstcheck');
            $datareceived['Originalamt'] = $this->input->post('Originalamt');
            $datareceived['gstamt'] = $this->input->post('gstamt');
            $datareceived['totalamt'] = $this->input->post('totalamt');
            $datareceived['client_id'] = $data["id"];

            echo "<pre> <br> datarecived";
            print_r($datareceived);
            $this->load->model("SMC_model");
            if ($this->SMC_model->insertdata($datareceived)) {
                redirect(base_url() . 'index.php/SMCpayment/SMC_View_payment');
            } else {
                echo "<script> alert('failure try again');</script>";
            }
        }
    }
    function checkhistory()
    {
        $client_id = $this->uri->segment(3);
        $this->load->model("SMC_model");
        $data['result'] = $this->SMC_model->viewdatabyclient_id($client_id);
        // echo "<pre>";
        // print_r($data);
        $this->load->view("SideHeadFoot");
        $this->load->view("SMCPayment/checkpayment", $data);
    }
    function AddEMI()
    {
        $id = $this->uri->segment(3);

        $this->load->model("SMC_model");
        $this->load->library("form_validation");
        $data['result']  = $this->SMC_model->viewdatabyid($id);

        $this->form_validation->set_rules("Brand_Name", "Brand_Name", "required");
        $this->form_validation->set_rules("installment", "installment", "required");
        $this->form_validation->set_rules("payment_amt", "payment_amt", "required");
        $this->form_validation->set_rules("EMI", "EMI", "required|numeric");
        $this->form_validation->set_rules("remaining_intallment", "remaining_intallment", "required");
        $this->form_validation->set_rules("dateofpayment", "dateofpayment", "required");
        if (empty($_FILES['SMCpayment_image']['name'])) {
            $this->form_validation->set_rules('SMCpayment_image', 'SMCpayment image', 'required');
        }


        // echo "<pre>";
        // print_r($data);
        if ($this->form_validation->run() == false) {
            $this->load->view("SideHeadFoot");
            $this->load->view("SMCPayment/AddEMI", $data);
        } else {
            // echo "<pre>";
            //    print_r($this->input->post());
            $config['upload_path'] = './smc_payment_image/';
            $config['allowed_types'] = '.gif|jpg|jpeg|png';
            $config['max_size'] = 10240;
            $config['encrypt_name'] = false;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('SMCpayment_image')) {
                $datareceived['SMCpayment_image'] =  $this->upload->data('file_name');
                echo "<pre>";
                // print_r($filename);
                echo "File Upload Successfully";








                $datareceived["smcpayment_id"] = $this->uri->segment(3);
                $datareceived["EMI"] = $this->input->post("EMI");
                $datareceived["dateofpayment"] = $this->input->post("dateofpayment");
                $datareceived["current_installment"] = null;


                $datareceived['result'] =   $this->SMC_model->viewdatabyid($datareceived["smcpayment_id"]);

                $datareceived['result']->received_amt += $datareceived['EMI'];
                $datareceived['result']->current_installment += 1;
                $datareceived["current_installment"]  =   $datareceived['result']->current_installment;





                echo "<pre>";
                print_r($datareceived);
                echo $datareceived["smcpayment_id"];
                if ($this->SMC_model->insertdatainemi(["EMI" => $datareceived["EMI"], "dateofpayment" => $datareceived["dateofpayment"], "smcpayment_id" => $datareceived["smcpayment_id"], "current_installment" => $datareceived["current_installment"], "SMCpayment_image" => $datareceived['SMCpayment_image']])) {
                    if ($this->SMC_model->updatedata($datareceived['smcpayment_id'], $datareceived['result'])) {

                        redirect(base_url() . "index.php/SMCpayment/checkhistory/" . $datareceived['result']->client_id);
                    }
                } else {
                    echo "Error";
                }
            }
        }
    }


    function DeleteEMI()
    {
        $id = $this->uri->segment(3);
        $this->load->model("SMC_model");
        $data = $this->SMC_model->viewdatabyid($id);
        if ($this->SMC_model->deletedata($id)) {
            if ($this->SMC_model->deletedataemi($id)) {
                redirect(base_url() . "index.php/SMCpayment/checkhistory/" . $data->client_id);
            }
        } else {
            echo "bhai error aa ghya";
        }
    }

    function Viewemis()
    {
        $id = $this->uri->segment(3);
        $this->load->model("SMC_model");
        $this->load->library("form_validation");
        $data["result"] = $this->SMC_model->viewdatabysmcemi($id);
        $data["data"] = $this->SMC_model->viewdatabyid($data['result'][0]->smcpayment_id);


        // echo "<pre>";
        // print_r($data);
        // echo($data['result'][0]->smcpayment_id);
        $this->load->view("SideHeadFoot");
        $this->load->view("SMCPayment/viewdetailsemi", $data);
    }
}
