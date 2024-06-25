<?php
defined('BASEPATH') or exit('No direct script access allowed');
class paymentmode extends CI_Controller
{
    public $paymode;
    public $form_validation;
    public $db;
    public $session;

    function  viewpayment()
    {
        $this->load->model('paymode');
        $data['result'] = $this->paymode->viewdata();
        $this->load->view('SideHeadFoot');
        $this->load->view('paymentmode/viewpaymentmode', $data);
        // echo "<pre>";
        // print_r($data);
    }
    function  addNewMode()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('payment_mode_name', 'payment mode name', 'required');
        if ($this->form_validation->run() == false) {

            $this->load->view('SideHeadFoot');
            $this->load->view('paymentmode/addnewmode');
        } else {
            $this->load->model('paymode');
            $name['mode'] = $this->input->post('payment_mode_name');
            $this->paymode->insertdata($name);
            redirect(base_url() . 'index.php/paymentmode/viewpayment');
        }
    }
}
