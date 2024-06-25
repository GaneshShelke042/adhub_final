<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Groupchat extends CI_Controller
{
    public $form_validation;
    public $UserModel;
    public $Groupchatmodel;
    public $upload;
    public $session;
    public $db;
    public $RoleModel;


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel');
        $this->load->model('Groupchatmodel');
        $this->load->model('RoleModel');
    }


    public function groupview()
    {
        $data['Groups'] = $this->Groupchatmodel->viewdata();

        // print_r($data);

        $data['Groupnumber'] = array();

        foreach ($data['Groups'] as $d) {
            // print_r($d);
            $data['Groupnumber'][$d['id']]  =  $this->Groupchatmodel->viewdatafromgroupmemberusingid($d['id']);
        }

        // echo "Groupnumber";
        // print_r($data['Groupnumber']);

        $data['users'] = $this->UserModel->viewonlyidandnames();
        // echo "users";
        // print_r($data['users']);

        $data['newArray'] = array();

        $newArray = [];

        foreach ($data['Groupnumber'] as $groupid => $users) {
            $group = [
                'Groupid' => $groupid,
                'users' => []
            ];
            foreach ($users as $user) {
                $userid = $user['userid'];
                foreach ($data['users'] as $userInfo) {
                    if ($userInfo['id'] == $userid) {
                        $group['users'][] = [
                            'userid' => $userid,
                            'username' => $userInfo['username']
                        ];
                    }
                }
            }
            $data['newArray'][]  = $group;
        }

        // echo "<pre>";
        // print_r($data['newArray']);
        // print_r($data['Groups']);
        // echo"<pre>";
        // print_r($data['newArray']);



        $this->load->view('SideHeadFoot');
        $this->load->view('Groupchat/group', $data);
    }

    public function Manage()
    {
        $data = $this->Groupchatmodel->viewdata();
        // echo "<pre>";

        $newdata = array();

        foreach ($data as $key) {
            // echo "<br>";
            // echo $key['id'];
            $newdata['data'][] =   $this->Groupchatmodel->viewdatafromgroupmemberusingid($key['id']);
            $newdata['values'][] = $key['id'];
        }

        $newdata['image'] =  $this->Groupchatmodel->viewdata();
        // print_r($newdata);


        $this->load->view('SideHeadFoot');
        $this->load->view('Groupchat/manage', $newdata);
    }
    public function add()
    {

        $this->form_validation->set_rules('selectOption1[]', 'Permissions', 'required');
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');

        if (empty($_FILES['image'])) {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }

        if ($this->form_validation->run() == false) {
            $data['userResult'] = $this->UserModel->viewData();
            // echo "<pre>";
            // print_r($data['userResult']);
            $this->load->view('SideHeadFoot');
            $this->load->view('Groupchat/add2', $data);
        } else {

            $config['upload_path'] = './chatprofile/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 11264;
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);


            if ($this->upload->do_upload('image')) {

                $data['image'] = $this->upload->data('file_name');
                // start
                $data['Name'] = $this->input->post('Name');
                $data['Status'] = $this->input->post('Status');
                $data['userid'] = $this->input->post('selectOption1');
                $timezone = new DateTimeZone('Asia/Kolkata'); // Replace 'YourDesiredTimeZone' with the actual time zone, e.g., 'Asia/Kolkata'
                $datetime = new DateTime('now', $timezone);
                $data['created_on'] = $datetime->format('Y-m-d H:i:s');
                echo "<pre>";
                print_r($data);
                $id = $this->Groupchatmodel->insertdata(['Name' => $data['Name'], 'image' => $data['image']]);
                // echo $id;
                foreach ($data['userid'] as $key) {
                    echo '<br>';
                    // echo $key;

                    $newdata['Name'] = $data['Name'];
                    $newdata['Status'] = $data['Status'];
                    $newdata['userid'] = $key;
                    $newdata['created_on'] =   $data['created_on'];
                    $newdata['Groupid'] =   $id;
                    print_r($newdata);

                    $this->Groupchatmodel->insertdataingroupmember($newdata);
                }
                redirect(base_url() . 'index.php/Groupchat/Manage');

                // end
            } else {
                $data['err'] = $this->upload->display_errors();
                echo $data['err'];
            }
        }
    }



    public function View()
    {
        $id = $this->uri->segment(3);
        $data['data'] = $this->Groupchatmodel->viewdatafromgroupmemberusingid($id);
        // echo"<pre>";
        $data['image'] = $this->Groupchatmodel->viewdatabygroupid($id);

        foreach ($data['data'] as $key) {
            // echo  $key['userid'];
            // echo "<br>";
            $data['users'][] = $this->UserModel->viewDatanameusingid($key['userid']);
        }
        // print_r($data);

        $this->load->view('SideHeadFoot');
        $this->load->view('Groupchat/viewgroup', $data);
    }


    public function update()
    {
        $id = $this->uri->segment(3);
        // echo $id;
        $data['id'] = $id;


        // echo '<pre>';
        // print_r($data);

        $this->form_validation->set_rules('selectOption1[]', 'Permissions', 'required');
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Status', 'Status', 'required');


        // if (empty($_FILES['image'])) {
        //     $this->form_validation->set_rules('image', 'Image', 'required');
        // }



        if ($this->form_validation->run() == false) {
            $data['clientPermissions'] = $this->Groupchatmodel->getuserid($id);
            $data['userResult'] = $this->UserModel->viewData();
            $data['image'] = $this->Groupchatmodel->viewdatabygroupid($id);
            $this->load->view('SideHeadFoot');
            $this->load->view('Groupchat/updatemember', $data);
        } else {
            $config['upload_path'] = './chatprofile/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 11264;
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);
            $data['receivedimage'] = $this->Groupchatmodel->viewdatabygroupid($id);
            echo "<pre>";
            print_r($data['receivedimage']);
            $file_path =  './chatprofile/' . $data['receivedimage'][0]['image'];


            if ($this->upload->do_upload('image')) {
                // $data['image'] = $this->upload->data();
                // print_r($data['image']);


                $data['image'] = $this->upload->data('file_name');

                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        echo 'file deleted';
                    }
                }
            } else {
                $data['image'] = $data['receivedimage'][0]['image'];
            }
            // start

            $data['Name'] = $this->input->post('Name');
            $data['Status'] = $this->input->post('Status');
            $data['userid'] = $this->input->post('selectOption1');
            // echo "<pre>";
            // print_r($data);

            $this->Groupchatmodel->updategroupname($data);
            $updatedvalues = array();
            foreach ($data['userid']  as $key) {
                echo $key;
                $receiveddata =    $this->Groupchatmodel->viewdatabyuserid($key);
                $userid =  $key;

                foreach ($receiveddata as $recived) {
                    if ($recived['Groupid'] == $id && $recived['userid'] == $userid) {
                        $recived['Name'] = $data['Name'];
                        $recived['Status'] = $data['Status'];
                        $timezone = new DateTimeZone('Asia/Kolkata');
                        $datetime = new DateTime('now', $timezone);
                        $recived['created_on'] = $datetime->format('Y-m-d H:i:s');

                        $this->Groupchatmodel->updategroupmember($recived);
                        $updatedvalues[] =  $recived['userid'];
                    }
                }
            }

            foreach ($updatedvalues as $tobeupdate) {

                echo $tobeupdate;
            }

            // echo "Different Value for add addtional data is";
            $different = array_diff($data['userid'], $updatedvalues);
            foreach ($different as $di) {
                echo "<br>";
                echo $di;
                $timezone = new DateTimeZone('Asia/Kolkata');
                $datetime = new DateTime('now', $timezone);
                $created_on = $datetime->format('Y-m-d H:i:s');
                $this->Groupchatmodel->insertdataingroupmember(['Name' =>  $data['Name'], 'userid' => $di, 'Status' => $data['Status'], 'created_on' => $created_on, 'Groupid' => $id]);
            }


            $already_exits_user['user'] = $this->Groupchatmodel->getUsersInGroup($id);
            $datadelete = array();
            foreach ($already_exits_user['user'] as $key) {
                $datadelete[] =  $key['userid'];
            }
            // echo "Different Value for Delete Exixting data is";
            $de = array_diff($datadelete, $data['userid']);
            print_r($de);
            foreach ($de as $key => $value) {

                foreach ($already_exits_user['user'] as $v) {
                    if ($v['userid'] == $value) {

                        $this->Groupchatmodel->deletuserfromgroup($v['id']);
                    }
                }
            }

            redirect(base_url() . 'index.php/Groupchat/Manage');

            // End


        }
    }
    public function ChangeStatus()
    {
        // $this->;
        $data = $this->input->post();
        $this->Groupchatmodel->updatestatusbygroupid($data);
        echo json_encode($data);
    }
}
