<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socialmedia extends CI_Controller
{
   public $form_validation;
   public $Socialmedia_model;
   public $pageleadsmodel;
   public $loginwithfacebookmodel;
   public $db;
   public $session;

   public function __construct()
   {
      parent::__construct();
      $this->load->library("form_validation");
      $this->load->model("Socialmedia_model");
      $this->load->model("pageleadsmodel");
      $this->load->model("loginwithfacebookmodel");
   }

   public function view()
   {
      $data["result"] = $this->Socialmedia_model->getdata();
      $this->form_validation->set_rules("Name", "Name", "required");
      $this->form_validation->set_rules("Socialmediaplatform", "Social media platform", "required");
      $this->form_validation->set_rules("Status", "Status", "required");
      if ($this->form_validation->run() == true) {
         $insertdata = $this->input->post();
         date_default_timezone_set('Asia/Kolkata');
         $insertdata['Created_On'] = date('Y-m-d H:i:s');
         // echo "<pre>";
         // print_r($data);
         if ($this->Socialmedia_model->insertdata($insertdata)) {
            $data["result"] = $this->Socialmedia_model->getdata();
            $this->load->view("SideHeadFoot");
            $this->load->view("Socialmedia/view", $data);
         } else {
            echo "DATA NOT SAVE";
         }
      } else {
         $this->load->view("SideHeadFoot");
         $this->load->view("Socialmedia/view", $data);
      }
   }

   public function editdata()
   {
      $id = $this->uri->segment(3);

      $data["result"] = $this->Socialmedia_model->getdatabyid($id);


      $this->form_validation->set_rules("Name", "Name", "required");
      $this->form_validation->set_rules("Socialmediaplatform", "Social media platform", "required");
      $this->form_validation->set_rules("Status", "Status", "required");

      if ($this->form_validation->run() == true) {
         $data["result"] = $this->input->post();
         //  echo "<pre>".$id."<br>";
         //  print_r($data);
         if ($this->Socialmedia_model->Updatedata($id, $data["result"])) {
            $data["result"] = $this->Socialmedia_model->getdata();
            $this->load->view("SideHeadFoot");
            $this->load->view("Socialmedia/view", $data);
         } else {
            echo "DATA NOT UPDATE";
         }
      } else {

         $this->load->view("SideHeadFoot");
         $this->load->view("Socialmedia/updatesocial", $data);
      }
   }

   public function deletedata()
   {
      $id = $this->uri->segment(3);
      $res = $this->Socialmedia_model->Deletedatabyid($id);
      if ($res) {
         redirect(base_url() . "index.php/Socialmedia/view");
      } else {
         $data["result"] = $this->Socialmedia_model->getdata();
         $this->load->view("SideHeadFoot");
         $this->load->view("Socialmedia/view", $data);
      }
   }


   public function viewpages()
   {

      $data['accesstoken'] =  $this->pageleadsmodel->viewaccesstoken();
      $data['logindata'] =  $this->loginwithfacebookmodel->viewlogindata();
      // echo "<pre>";
      // print_r(  $data );
      $this->load->view("SideHeadFoot");
      $this->load->view("pageleads/viewallpages", $data);
   }

   function loginwithfacebook()
   {
      $data = $this->input->post();
      date_default_timezone_set('Asia/Kolkata');

      $data['dateoflogin'] = date('Y-m-d H:i:s');

      $result = $data;
      foreach ($data as $key => $value) {
         $newKey = str_replace('"', '', $key);
         $newValue = str_replace('"', '', $value);
         $result[$newKey] = $newValue;
      }
      // echo"<pre>";
      // print_r( $result);


      if ($this->loginwithfacebookmodel->viewlogindatabyresid($result["resid"])) {
         echo "your are already login ";
      } else if ($this->loginwithfacebookmodel->insertdata($result)) {

         echo "your are login";
         redirect(base_url() . "index.php/Socialmedia/viewpages/");
      }
   }
}
