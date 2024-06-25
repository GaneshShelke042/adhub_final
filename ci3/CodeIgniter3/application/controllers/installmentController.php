<?php
defined('BASEPATH') or exit('No direct script access allowed');
class installmentController extends CI_Controller
{
    public  $installmentModel;
    public  $form_validation;
    public $db;
    public $session;

    function viewInstallment_panel()
    {
        $this->load->model("installmentModel");
        $data['result'] =  $this->installmentModel->viewinstallmentdata();

        $this->load->view("SideHeadFoot");
        $this->load->view("installment/viewinstallment", $data);
    }

    function addnewinstallment()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('Installment', 'Installment', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot');
            $this->load->view('installment/addnewinstallment');
        } else {
            $data['Installment'] =  $this->input->post();
            $this->load->model('installmentModel');
            if ($this->installmentModel->generateinstallment($data["Installment"])) {
                redirect(base_url() . 'index.php/installmentController/viewInstallment_panel');
            } else {
                echo "error";
            }
        }
    }

    function editdata()
    {
        $data['id'] = $this->uri->Segment(3);

        // echo $data;
        $this->load->model("installmentModel");
        $data['result'] =  $this->installmentModel->getdatabyid($data['id']);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('Installment', 'Installment', 'required|numeric');

        if ($this->form_validation->run() == false) {

            $this->load->view('SideHeadFoot');
            $this->load->view('installment/editinstallment', $data);
        } else {
            $data['Installment'] =  $this->input->post();
            print_r($data);
            $this->load->model('installmentModel');
            if ($this->installmentModel->updateinstallment($data['id'], $data["Installment"])) {
                redirect(base_url() . 'index.php/installmentController/viewInstallment_panel');
            } else {
                echo "error";
            }
        }
    }

    function deletedata()
    {
        $id = $this->uri->Segment(3);
        // echo $id;
        $this->load->model('installmentModel');
        $this->installmentModel->deleteinstallment($id);
        redirect(base_url() . 'index.php/installmentController/viewInstallment_panel');
    }
}
