<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Leads extends CI_Controller
{
    public $Curd_model;
    public $form_validation;
    public $Leadsmodel;
    public $Socialmedia_model;
    public $pageleadsmodel;
    public $db;
    public $session;

    public function __construct()
    {
        parent::__construct();
        $this->load->library("form_validation");
        $this->load->model("Curd_model");
        $this->load->model("Leadsmodel");
        $this->load->model("Socialmedia_model");
        $this->load->model("pageleadsmodel");
    }

    public function view()
    {
        $type = $this->uri->segment(3);
        $data["result"] = $this->Curd_model->viewclientname();
        $data["type"] = $type;
        $data["leads"] = $this->Leadsmodel->getdata();

        // echo "<pre>";
        // print_r($data);


        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("status", "Status", "required");
        $this->form_validation->set_rules("clients", "Clients", "required");
        $this->form_validation->set_rules("formid", "Form id", "required|numeric");
        $this->form_validation->set_rules("mobileno", "Mobile no", "required|numeric");


        if ($this->form_validation->run() == true) {
            $value["data"] = $this->input->post();
            $value["data"]["type"] = $type;
            date_default_timezone_set('Asia/Kolkata');
            $value['data']['createdon'] = date('Y-m-d H:i:s');
            // echo "<pre>";
            // print_r($value);
            if ($this->Leadsmodel->insertdata($value["data"])) {
                redirect(base_url() . "index.php/Leads/view/" . $type);
            } else {
                echo "DATA Not Uploaded";
            }
        } else {

            //  echo "<pre>";
            //     print_r($data);
            $this->load->view("SideHeadFoot");
            $this->load->view("Leads/Socialleadsview", $data);
        }
    }

    public function Delete()
    {
        $id = $this->uri->segment(3);
        echo $id;
        if ($this->Leadsmodel->Deletedata($id)) {
            redirect(base_url() . "index.php/Leads/view/facebook");
        } else {
            echo "Data not Deleted ";
        }
    }


    public function Viewperdata()
    {
        $id = $this->uri->segment(3);
        // echo $id;
        $data['result'] = $this->Leadsmodel->getdatabyid($id);
        $this->load->view("SideHeadFoot");
        $this->load->view("Leads/Socialleadsview", $data);
    }


    public function editdata()
    {
        $this->form_validation->set_rules("editName", "Name", "required");
        // $this->form_validation->set_rules("editStatus", "Status", "required");
        $this->form_validation->set_rules("editClients", "Clients", "required");
        $this->form_validation->set_rules("editForm_id", "Form id", "required|numeric");
        $this->form_validation->set_rules("editMobileno", "Mobile no", "required|numeric");

        if ($this->form_validation->run() == false) {
            redirect(base_url() . "index.php/Leads/view/facebook");
        } else {
            $data["id"]  =  $this->input->post("editID");
            $data["result"]["name"]  =  $this->input->post("editName");
            // $data["result"]["status"]  =  $this->input->post("editStatus");
            $data["result"]["clients"]  =  $this->input->post("editClients");
            $data["result"]["formid"]  =  $this->input->post("editForm_id");
            $data["result"]["mobileno"]  =  $this->input->post("editMobileno");
            $data["result"]["type"]  =  $this->input->post("edittype");
            date_default_timezone_set('Asia/Kolkata');
            $data["result"]["createdon"] = date('Y-m-d H:i:s');


            if ($this->Leadsmodel->updatedatabyid($data['id'], $data['result'])) {
                redirect(base_url() . "index.php/Leads/view/" . $data["result"]["type"]);
            } else {
                echo "Data not Updated";
            }
        }
    }


    public function editstatus()
    {
        $id = $this->input->post("changableID");
        $status = $this->input->post("changablestatus");

        // echo "<pre>";
        // echo $status . "<br>" . $id;

        if ($this->Leadsmodel->updatestatusonly($id, $status)) {
            redirect(base_url() . "index.php/Leads/view/facebook");
        } else {
            echo "Status not updated";
        }
    }

    public function savepageid()
    {

        $data['id'] =  $this->uri->segment(3);
        $data['client'] = $this->Curd_model->viewclientnameandid($data['id']);
        $data['Network'] = $this->Socialmedia_model->getdata();
        $data['fetch'] = $this->pageleadsmodel->viewdatabyid($data['id']);
        $this->form_validation->set_rules("pageid", "page id", "required");
        $this->form_validation->set_rules("Network", "Network", "required");
        // echo "<pre>";
        // print_r($data);
        if ($this->form_validation->run() == false) {
            $this->load->view("SideHeadFoot");
            $this->load->view("pageleads/addpageleads", $data);
        } else {
            $data = $this->input->post();
            $data['Client_id'] =  $this->uri->segment(3);
            if ($this->pageleadsmodel->insertdata($data)) {
                redirect(base_url() . "index.php/User_con/index");
            } else {
                echo "Data not inserted ";
            }
        }
    }

    public function Fetchdata()
    {
      
        $id_from_url = $this->uri->segment(3);
        echo $id_from_url;

        $data['result'] =     $this->Leadsmodel->getdatabyid($id_from_url);
        $data["accesstoken"] = $this->pageleadsmodel->viewaccesstoken();
        // echo "<pre>";
        // print_r($data);
        $this->load->view("SideHeadFoot");
        $this->load->view("Leads/viewleads", $data);
    }

    public function accesstoken()
    {

        $this->form_validation->set_rules('Accesstoken', 'Accesstoken', 'required');
        $data["Accesstoken"] = $this->pageleadsmodel->viewaccesstoken();
        // echo "<pre>";
        // print_r($data);

        if ($this->form_validation->run() == false) {
            $this->load->view("SideHeadFoot.php");
            $this->load->view("Leads/accesstoken", $data);
        } else {
            $data = $this->input->post();
            echo "<pre>";
            print_r($data);
            if ($this->pageleadsmodel->insertaccesstoken($data)) {
                redirect(base_url() . "index.php/Leads/accesstoken");
            } else {
                echo "Access token not inserted";
            }
        }
    }


    public function editAccesstoken()
    {
        $this->form_validation->set_rules('editAccesstoken', 'editAccesstoken', 'required');
        $data["Accesstoken"] = $this->pageleadsmodel->viewaccesstoken();

        if ($this->form_validation->run() == false) {
            $this->load->view("SideHeadFoot.php");
            $this->load->view("Leads/accesstoken", $data);
        } else {
            // $data
            $data['Accesstoken'] = $this->input->post('editAccesstoken');
            $data['id']  = $this->uri->segment(3);
            echo "<pre> <br> hello <br>";
            echo $data['Accesstoken'];


            if ($this->pageleadsmodel->updateaccesstoken($data["id"], $data)) {
                redirect(base_url() . "index.php/Leads/accesstoken");
            } else {
                echo "Access token not updated";
            }
        }
    }
}
