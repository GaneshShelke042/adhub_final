
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class teamchat extends CI_Controller
{

  public $teamchat_model;
  public $UserModel;
  public $upload;


  public function __construct()
  {
    parent::__construct();
    $this->load->model('teamchat_model');
    $this->load->model('UserModel');
  }


  public function add()
  {
    $data = $this->input->post();

    if ($this->teamchat_model->addmessage($data)) {
      echo json_encode($data);
    }
  }

  public function add1()
  {
    $userid = $this->input->post('userid');
    $username = $this->input->post('username');
    $ticketid = $this->input->post('ticketid');
    $time = $this->input->post('time');
    $message = $this->input->post('message');


    if (!empty($_FILES['image']['name'])) {
      $config['upload_path'] = './teamchat/';
      $config['allowed_types'] = 'jpg|jpeg|png|pdf';
      $config['max_size'] = 11264; // 11MB in KB
      $config['encrypt_name'] = false; // Encrypt file name for safety
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('image')) {
        $uploadData = $this->upload->data();
        $imageName = $uploadData['file_name']; // Get the uploaded file name
        // File uploaded successfully, now you can do something with the image
        // For example, you can save the message and image details to your database

        if (empty($message)) {
          $data =
            [
              'userid' => $userid,
              'username' => $username,
              'ticketid' => $ticketid,
              'time' => $time,
              'message' => '',
              'image' => $imageName // Store the image file name in your database
            ];
        } else {
          $data =
            [
              'userid' => $userid,
              'username' => $username,
              'ticketid' => $ticketid,
              'time' => $time,
              'message' => $message,
              'image' => $imageName // Store the image file name in your database
            ];
        }
        // $this->messagemodel->add(['groupid' => $groupid, 'message' => $message]);
        $this->teamchat_model->addmessage($data);

        // echo json_encode($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
      }
    } else {
      // No image file uploaded, handle this case accordingly
      if ($message != '') {


        $data =
          [
            'userid' => $userid,
            'username' => $username,
            'ticketid' => $ticketid,
            'time' => $time,
            'message' => $message,
            'image' => '' // Store the image file name in your database
          ];
        // $this->messagemodel->add(['groupid' => $groupid, 'message' => $message]);
        $this->teamchat_model->addmessage($data);

        // echo json_encode($data);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
      }
    }
  }


  function delete()
  {
    $id = $this->uri->segment(3);
    $data = $this->teamchat_model->viewdatabyid($id);
    foreach ($data as $d) {
      $imagePath = './teamchat/' . $d['image'];
      if (file_exists($imagePath)) {
        unlink($imagePath);
      }
      $this->teamchat_model->delete($id);
    }
    // print_r($data);
    echo json_encode(['Message' => "Succefully Deleted Message"]);
  }
}
