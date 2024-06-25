<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GST extends CI_Controller
{

    public $form_validation;
    public $GSTmodel;
    public $db;
    public $session;

    function ViewGST()
    {
        $this->load->model('GSTmodel');
        $data['result'] = $this->GSTmodel->view_Data();
        // echo"<pre>";
        // print_r($data);


        $this->load->view('SideHeadFoot');
        $this->load->view('GST/ViewGST', $data);
    }
    function addGST()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('GST_RATE', 'Gst Rate', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot');
            $this->load->view('GST/AddGST');
        } else {
            $this->load->model('GSTmodel');
            $data['GST_Rate'] = $this->input->post('GST_RATE');
            echo "<pre>";
            // print_r($data);
            $this->GSTmodel->insertdata($data);
            redirect(base_url() . 'index.php/GST/ViewGST');
        }
    }
    function editdata()
    {
        $id  = $this->uri->segment(3);
        // echo "<pre>";   
        // // print_r($id);
        $this->load->model('GSTmodel');
        $this->load->library('form_validation');
        $data['data'] = $this->GSTmodel->getdatabyid($id);
        $this->form_validation->set_rules('OLD_GST_RATE', 'GST RATE', 'required|numeric');
        $this->form_validation->set_rules('GST_RATE', 'GST RATE', 'required|numeric');
        if($this->form_validation->run()==false)
        {
            $this->load->view('SideHeadFoot');
            $this->load->view('GST/EditGST',$data);   
        }
        else
        {
            $New_Gst_rate = $this->input->post('GST_RATE');
                // echo $New_Gst_rate;
           if( $this->GSTmodel->updategstrate($id,$New_Gst_rate))
           {
            redirect(base_url()."index.php/GST/ViewGST");
           }
        }

    }
    function Deletedata()
    {

        $id = $this->uri->segment(3);
        echo "<pre>";
        print_r($id);
        $this->load->model('GSTmodel');
        $this->GSTmodel->delete_Data($id);

        redirect(base_url() . "index.php/GST/ViewGST");
    }
}
