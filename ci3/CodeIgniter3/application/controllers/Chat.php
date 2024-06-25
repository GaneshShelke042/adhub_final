<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Chat   extends CI_Controller

{
    public $messagemodel;
    public $upload;
    public $db;
    public $form_validation;
    public $session;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('messagemodel');
    }

    public function add()
    {
        $groupid = $this->input->post('groupid');
        $userid = $this->input->post('id');
        $message = $this->input->post('message');
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date('d/m/Y H:i:s'); // Get the current date and time in dd/mm/yyyy format

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './uploadschat/';
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
                            'groupid' => $groupid,
                            'userid' => $userid,
                            'message_created' => $timestamp,
                            'message' => '',
                            'image' => $imageName // Store the image file name in your database
                        ];
                } else {
                    $data =
                        [
                            'groupid' => $groupid,
                            'userid' => $userid,
                            'message_created' => $timestamp,
                            'message' => $message,
                            'image' => $imageName // Store the image file name in your database
                        ];
                }
                // $this->messagemodel->add(['groupid' => $groupid, 'message' => $message]);
                $this->messagemodel->add($data);

                echo json_encode(['status' => 'success', 'message' => 'Message and image uploaded successfully', 'time' => $timestamp, 'image' => $imageName]);
            }
        } else {

            if (!empty($message)) {
                // No image file uploaded, handle this case accordingly
                $data =
                    [
                        'groupid' => $groupid,
                        'userid' => $userid,
                        'message_created' => $timestamp,
                        'message' => $message,
                        // 'image' => $imageName // Store the image file name in your database
                    ];
                // $this->messagemodel->add(['groupid' => $groupid, 'message' => $message]);
                $this->messagemodel->add($data);

                echo json_encode(['status' => 'success', 'message' => 'Message  uploaded successfully', 'time' => $timestamp]);
            }
        }
    }

    public function show()
    {
        $groupid = $this->uri->segment(3);
        // echo $groupid;
        // echo'<pre>';
        $data = $this->messagemodel->showdatabygroupid($groupid);

        // print_r($data);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        // echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $data = $this->messagemodel->viewdatabyid($id);
        foreach ($data as $d) {
            $imagePath = './uploadschat/' . $d['image'];
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $this->messagemodel->deletedatabyid($id);
            $this->output->set_content_type('application/json')->set_output(json_encode(['status' => 'success', 'message' => 'data deleted with image']));
        }
    }
}
