<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $CustomTaskModel;
    public $UpdateTaskModel;
    public $PackageServicesModel;
    public $Curd_model;
    public $UserModel;
    public $session;
    public $upload;
    public $Forms;
    public $ClientFormModel;




    public function __construct()
    {
        parent::__construct();
        $this->load->model('UpdateTaskModel');
    }


    function dashboard()
    {
        $this->load->model('UserModel');
        $userResult = $this->UserModel->viewData();


        $this->load->model('CustomTaskModel');
        $result = $this->CustomTaskModel->viewDashbord();

        $this->load->model('Curd_model');
        $result1 = $this->Curd_model->viewData();
        $addnewclient1 = $this->Curd_model->viewData();

        $this->load->model('ClientFormModel'); 
        $check = $this->ClientFormModel->view();

        
       


        $data1 = array();
        $data1['result'] = $result;
        $data1['result1'] = $result1;
        $data1['check'] = $check;
        $data1['userResult'] = $userResult;
        $data1['addnewclient1'] = $addnewclient1;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Dashborad', $data1);
    }


    function viewData()
    {
        $this->load->model('UpdateTaskModel');
        $result = $this->UpdateTaskModel->viewData();

        $data1 = array();
        $data1['result'] = $result;
    }


    public function updateTask()
    {

        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');


        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');

        $this->load->model('Curd_model');
        $this->load->model('UserModel');
        $this->load->model('UpdateTaskModel');
        $this->load->model('Forms');
        $this->load->model('ClientFormModel');
        $id = $this->uri->segment(3);

        $userResult = $this->UserModel->viewData();
        $data['userResult'] = $userResult;
        $addnewclient1 = $this->Curd_model->viewData();
        $data['addnewclient1'] = $addnewclient1;

        $result = $this->UpdateTaskModel->viewData();
        $data['result'] =  $result;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        $Ans = $this->Forms->viewAns();
        $data['Ans'] = $Ans;
        $question = $this->ClientFormModel->view();
        $data['question'] = $question;

        // echo"<pre>";
        // print_r($data);

        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Language Form Not Filled";
            }
            // Print the grouped data

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["painpoint"]) {
                    // print_r($key);
                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled";
            }
            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled";
            }
            // echo "<pre>";
            // print_r($data['Offer']);
        }
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('UpdateTask.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            $imageData = NULL; // Initialize image data

            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 10240; // 10MB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['full_path']; // Get full path to the uploaded file
                    echo "<pre>";
                    print_r($this->upload->data());
                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                    return;
                }
            }


            // Load the model
            $this->load->model('UpdateTaskModel');
            print_r($editor_content);
            print_r($tid);
            print_r($gr_Status);
            // Update the task
            if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                // If update is successful, redirect to dashboard
                redirect(base_url('index.php/DashboardContro/dashboard'));
            } else {
                // If update fails, handle the error
                echo $this->upload->display_errors();
                echo "Update failed";
            }
        }
    }

    // public function updateTask()
    // {



    //     // Load necessary libraries and helpers
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');

    //     // Form validation rules
    //     $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

    //     // Get form data
    //     $tid = $this->input->post('tid');
    //     $cr_Status = $this->input->post('cr_Status');
    //     $gr_Status = $this->input->post('gr_Status');
    //     $smm_Status = $this->input->post('smm_Status');
    //     $editor_content = $this->input->post('editor_content');
    //     $ticketValue = $this->input->post('ticketValue');
    //     $Gr_ticketValue = $this->input->post('Gr_ticketValue');
    //     $Smm_ticketValue = $this->input->post('Smm_ticketValue');


    //     $this->load->model('Curd_model');
    //     $this->load->model('UpdateTaskModel');
    //     $this->load->model('PackageServicesModel');
    //     $this->load->model('UserModel');



    //     $id = $this->uri->segment(3);


    //     $addnewclient1 = $this->Curd_model->viewData();

    //     $data['addnewclient1'] = $addnewclient1;

    //     $result = $this->UpdateTaskModel->viewData(); 
    //     $data['result'] =  $result;   

    //     $userResult = $this->UserModel->viewData();
    //     $data['userResult'] = $userResult;

    //     $insentive = $this->PackageServicesModel->viewPackageServices();
    //     $data['insentive'] = $insentive;



    //     $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
    //     $data['receiveddata'] =  $receiveddata;

    //     // echo"<pre>";
    //     // print_r($data);


    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, handle errors
    //         $this->load->view('UpdateTask.php',$data); // Pass data to the view
    //         echo validation_errors();
    //     } else {
    //         // Validation passed, proceed with database update
    //         $imageData = NULL; // Initialize image data


    //         if (!empty($_FILES['imageData']['name'])) {
    //             // Image uploaded, handle file upload
    //             $config['upload_path'] = './Graphics_Image/';
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = 10240; // 10MB
    //             $config['encrypt_name'] = FALSE;

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('imageData')) {
    //                 // File uploaded successfully
    //                 $upload_data = $this->upload->data();
    //                 $imageData = $upload_data['full_path']; // Get full path to the uploaded file
    //                 echo "<pre>";
    //                 print_r($this->upload->data());

    //             } else {
    //                 // Upload failed, handle error
    //                 echo $this->upload->display_errors();
    //                 return;
    //             }
    //         }


    //         // Load the model
    //         $this->load->model('UpdateTaskModel');
    //         print_r($editor_content);
    //         print_r($tid);
    //         print_r($gr_Status);
    //         // Update the task
    //         if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
    //             // If update is successful, redirect to dashboard
    //             redirect(base_url('index.php/DashboardContro/dashboard'));
    //         } else {
    //             // If update fails, handle the error
    //             echo $this->upload->display_errors();
    //             echo "Update failed";
    //         }
    // }
    // }

    // Custom callback function for image upload validation
    // Custom callback function for image upload validation
    public function image_upload()
    {
        // Check if no file is selected for upload
        if (empty($_FILES['imageData']['name'])) {
            // No file selected, validation passes
            return TRUE;
        } else {
            // File selected, continue with other validations
            return TRUE;
        }
    }




    // public function updateGRTask()
    // {



    //     // Load necessary libraries and helpers
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');

    //     // Form validation rules
    //     $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

    //     // Get form data
    //     $tid = $this->input->post('tid');
    //     $cr_Status = $this->input->post('cr_Status');
    //     $gr_Status = $this->input->post('gr_Status');
    //     $smm_Status = $this->input->post('smm_Status');
    //     $editor_content = $this->input->post('editor_content');
    //     $ticketValue = $this->input->post('ticketValue');
    //     $Gr_ticketValue = $this->input->post('Gr_ticketValue');
    //     $Smm_ticketValue = $this->input->post('Smm_ticketValue');





    //     $this->load->model('Curd_model');
    //     $this->load->model('UpdateTaskModel');
    //     $this->load->model('PackageServicesModel');
    //     $this->load->model('UserModel');
    //     $id = $this->uri->segment(3);


    //     $userResult = $this->UserModel->viewData();
    //     $data['userResult'] = $userResult;

    //     $addnewclient1 = $this->Curd_model->viewData();

    //     $data['addnewclient1'] = $addnewclient1;


    //     $insentive = $this->PackageServicesModel->viewPackageServices();
    //     $data['insentive'] = $insentive;

    //     $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
    //     $data['receiveddata'] =  $receiveddata;

    //     // echo"<pre>";
    //     // print_r($data);


    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, handle errors
    //         $this->load->view('UpdateGRSTask.php',$data); // Pass data to the view
    //         echo validation_errors();
    //     } else {
    //         // Validation passed, proceed with database update
    //         // $imageData = NULL; // Initialize image data


    //         if (!empty($_FILES['imageData']['name'])) {
    //             // Image uploaded, handle file upload
    //             $config['upload_path'] = './Graphics_Image/';
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = 1024 * 1024 * 1024; // 1GB
    //             $config['encrypt_name'] = FALSE;

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('imageData')) {
    //                 // File uploaded successfully
    //                 $imageData = "";
    //                 $upload_data = $this->upload->data();
    //                 $imageData = $upload_data['file_name']; // Get full path to the uploaded file
    //                 // echo "<pre>";
    //                 // print_r($this->upload->data());

    //             }
    //             if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
    //                 // If update is successful, redirect to dashboard
    //                 redirect(base_url('index.php/DashboardContro/dashboard'));
    //             } else {
    //                 // If update fails, handle the error
    //                 echo $this->upload->display_errors();
    //                 echo "Update failed";
    //             }
    //         }

    //             else {


    //             if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content,  $data['receiveddata'][0]->imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
    //                 // If update is successful, redirect to dashboard
    //                 redirect(base_url('index.php/DashboardContro/dashboard'));
    //             } 
    //         }
    //     }
    // }
    public function updateGRTask()
    {
        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');
        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');


        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');



        $this->load->model('Curd_model');
        $this->load->model('UserModel');
        $this->load->model('UpdateTaskModel');
        $this->load->model('Forms');
        $this->load->model('ClientFormModel');
        $id = $this->uri->segment(3);

        $userResult = $this->UserModel->viewData();
        $data['userResult'] = $userResult;
        $addnewclient1 = $this->Curd_model->viewData();
        $data['addnewclient1'] = $addnewclient1;
        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        $Ans = $this->Forms->viewAns();
        $data['Ans'] = $Ans;
        $question = $this->ClientFormModel->view();
        $data['question'] = $question;

        // echo"<pre>";
        // print_r($data);

        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Language Form Not Filled ";
            }
            // Print the grouped data

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled.";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["painpoint"]) {
                    // print_r($key);
                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled.";
            }
            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled";
            }

            // echo "<pre>";
            // print_r($data['Offer']);

        }


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('UpdateGRSTask.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            // $imageData = NULL; // Initialize image data
            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['file_name']; // Get full path to the uploaded file
                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                }

                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    redirect(base_url('index.php/DashboardContro/dashboard'));
                }
            }
            if (!empty($_FILES['psdfile']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './psdFile_Graphics/';
                $config['allowed_types'] = 'psd';
                $config['max_size'] = 512000; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('psdfile')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $psdfile = $upload_data['file_name']; // Get full path to the uploaded file
                    // echo "<pre>";
                    // print_r($psdfile);

                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                }
                if ($this->UpdateTaskModel->updatepsd($tid, $psdfile, $cr_Status, $gr_Status)) {
                    redirect(base_url('index.php/DashboardContro/dashboard'));
                }
                redirect(base_url('index.php/DashboardContro/dashboard'));
            } else {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content,  $data['receiveddata'][0]->imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/DashboardContro/dashboard'));
                }
            }
        }
    }


    // public function updateSmmTask()
    // {



    //     // Load necessary libraries and helpers
    //     $this->load->helper(array('form', 'url'));
    //     $this->load->library('form_validation');

    //     // Form validation rules
    //     $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

    //     // Get form data
    //     $tid = $this->input->post('tid');
    //     $cr_Status = $this->input->post('cr_Status');
    //     $gr_Status = $this->input->post('gr_Status');
    //     $smm_Status = $this->input->post('smm_Status');
    //     $editor_content = $this->input->post('editor_content');
    //     $ticketValue = $this->input->post('ticketValue');
    //     $Gr_ticketValue = $this->input->post('Gr_ticketValue');
    //     $Smm_ticketValue = $this->input->post('Smm_ticketValue');




    //     $this->load->model('Curd_model');
    //     $this->load->model('UpdateTaskModel');
    //     $this->load->model('UserModel');
    //     $id = $this->uri->segment(3);


    //     $addnewclient1 = $this->Curd_model->viewData();

    //     $data['addnewclient1'] = $addnewclient1;

    //     $userResult = $this->UserModel->viewData();
    //     $data['userResult'] = $userResult;

    //     $this->load->model('PackageServicesModel');
    //     $insentive = $this->PackageServicesModel->viewPackageServices();
    //     $data['insentive'] = $insentive;

    //     $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
    //     $data['receiveddata'] =  $receiveddata;

    //     // echo"<pre>";
    //     // print_r($data);


    //     if ($this->form_validation->run() == FALSE) {
    //         // Validation failed, handle errors
    //         $this->load->view('UpdateSMMStatus.php',$data); // Pass data to the view
    //         echo validation_errors();
    //     } else {
    //         // Validation passed, proceed with database update
    //         $imageData = NULL; // Initialize image data


    //         if (!empty($_FILES['imageData']['name'])) {
    //             // Image uploaded, handle file upload
    //             $config['upload_path'] = './Graphics_Image/';
    //             $config['allowed_types'] = 'gif|jpg|png';
    //             $config['max_size'] = 1024 * 1024 * 1024; // 1GB
    //             $config['encrypt_name'] = FALSE;

    //             $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('imageData')) {
    //                 // File uploaded successfully
    //                 $upload_data = $this->upload->data();
    //                 $imageData = $upload_data['full_path']; // Get full path to the uploaded file
    //                 // echo "<pre>";
    //                 // print_r($this->upload->data());

    //             } 
    //             else {
    //                 // Upload failed, handle error
    //                 echo $this->upload->display_errors();
    //                 return;
    //             }
    //             if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
    //                 // If update is successful, redirect to dashboard
    //                 redirect(base_url('index.php/DashboardContro/dashboard'));
    //             } 
    //         }
    //             else{
    //                 if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $data['receiveddata'][0]->imageData,  $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
    //                     // If update is successful, redirect to dashboard
    //                     redirect(base_url('index.php/DashboardContro/dashboard'));
    //                 } 
    //             }
    //         }



    // }
    public function updateSmmTask()
    {
        // Load necessary libraries and helpers
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // Form validation rules
        $this->form_validation->set_rules('imageData', 'imageData', 'callback_image_upload');

        // Get form data
        $tid = $this->input->post('tid');
        $cr_Status = $this->input->post('cr_Status');
        $gr_Status = $this->input->post('gr_Status');
        $smm_Status = $this->input->post('smm_Status');
        $editor_content = $this->input->post('editor_content');
        $ticketValue = $this->input->post('ticketValue');
        $Gr_ticketValue = $this->input->post('Gr_ticketValue');
        $Smm_ticketValue = $this->input->post('Smm_ticketValue');





        $this->load->model('Curd_model');
        $this->load->model('UpdateTaskModel');
        $this->load->model('Forms');
        $this->load->model('ClientFormModel');
        $id = $this->uri->segment(3);


        $addnewclient1 = $this->Curd_model->viewData();

        $data['addnewclient1'] = $addnewclient1;

        $receiveddata = $this->UpdateTaskModel->viewdatabyid($id);
        $data['receiveddata'] =  $receiveddata;

        // echo"<pre>";
        // print_r($data);
        $Ans = $this->Forms->viewAns();
        $data['Ans'] = $Ans;
        $question = $this->ClientFormModel->view();
        $data['question'] = $question;

        // echo"<pre>";
        // print_r($data);

        if (!empty($data['receiveddata'][0]->Client_id)) {

            // echo"<pre>";
            // language
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && ($key['form_name']) == $data["question"][0]["language"]) {
                    // print_r($key);
                    $separatedlanguage_Question = explode(',', $key['question']);
                    $separatedlanguage_Arrayans = explode(',', $key['ans']);
                    $data['que'][] = array('question' => $separatedlanguage_Question);
                    $data['ans'][] = array('ans' => $separatedlanguage_Arrayans);
                }
            }

            // print_r($data["que"]);
            // print_r($data["ans"]);

            $data['language'] = array();

            if (isset($data["que"][0]["question"]) && isset($data["ans"][0]["ans"])) {
                $questions = $data["que"][0]["question"];
                $answers = $data["ans"][0]["ans"];

                // // Loop through the questions and answers and combine them
                $count = min(count($questions), count($answers));

                for ($i = 0; $i < $count; $i++) {
                    $data['language'][] = [
                        "question" => trim($questions[$i]),
                        "answer" => trim($answers[$i])
                    ];
                }
            } else {
                echo "Language Form Not Filled.";
            }

            // print_r($data['language']);

            //  54 question 


            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["question"]) {
                    // print_r($key);
                    $separated54_Question = explode(',', $key['question']);
                    $separated54_ans = explode(',', $key['ans']);
                    $data['54que'][] = array('question' => $separated54_Question);
                    $data['54ans'][] = array('ans' => $separated54_ans);
                }
            }

            // print_r($data["54que"]);
            // print_r($data["54ans"]);

            $data['Question54'] = array();
            if (isset($data["54que"][0]["question"]) && isset($data["54ans"][0]["ans"])) {

                $questions = $data["54que"][0]["question"];
                $answers = $data["54ans"][0]["ans"];

                $count = min(count($questions), count($answers));


                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['Question54'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "54 Question Form Not Filled.";
            }

            // echo "<pre>";

            // Print the grouped data
            // print_r($data['Question54']);

            //  Painpoint
            // echo "<pre>";
            // print_r($data["Ans"]);

            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id && ($data["question"][0]["painpoint"]) == trim(($key['form_name']))) {

                    $separatedpainpoint_Question = explode(',', $key['question']);
                    $separatedpainpoint_ans = explode(',', $key['ans']);
                    $data['painpointque'][] = array('question' => $separatedpainpoint_Question);
                    $data['painpointans'][] = array('ans' => $separatedpainpoint_ans);
                }
            }

            // print_r($data["painpointque"]);
            // print_r($data["painpointans"]);

            $data['painpoint'] = array();

            if (isset($data["painpointque"][0]["question"]) && isset($data["painpointans"][0]["ans"])) {
                $questions = $data["painpointque"][0]["question"];
                $answers = $data["painpointans"][0]["ans"];

                $count = min(count($questions), count($answers));
                // Loop through the questions and answers and combine them

                for ($i = 0; $i < $count; $i++) {
                    $data['painpoint'][] = [
                        "question" => trim($questions[$i]),
                        "answer" => ($answers[$i])
                    ];
                }
            } else {
                echo "Painpoint Form Not Filled.";
            }


            // echo "<pre>";

            // print_r($data['painpoint']);

            // Offer 
            foreach ($data["Ans"] as $key) {
                if ($key['client_id'] == $data['receiveddata'][0]->Client_id  && $key['form_name'] == $data["question"][0]["offer"]) {
                    // print_r($key);
                    $separatedOffer_Question = explode(',', $key['question']);
                    $separatedOffer_ans = explode(',', $key['ans']);
                    $data['offerque'][] = array('question' => $separatedOffer_Question);
                    $data['offerans'][] = array('ans' => $separatedOffer_ans);
                }
            }

            // print_r($data["offerque"]);
            // print_r($data["offerans"]);

            $data['Offer'] = array();

            if (isset($data["offerque"][0]["question"]) && isset($data["offerans"][0]["ans"])) {
                $questions = $data["offerque"][0]["question"];
                $answers = $data["offerans"][0]["ans"];

                $count = min(count($questions), count($answers));

                // Loop through the questions and answers and combine them
                for ($i = 0; $i < $count; $i++) {
                    $data['Offer'][] = [
                        "question" => $questions[$i],
                        "answer" => $answers[$i]
                    ];
                }
            } else {
                echo "Offer Form Not Filled.";
            }

            // echo "<pre>";
            // print_r($data['Offer']);

        }


        if ($this->form_validation->run() == FALSE) {
            // Validation failed, handle errors
            $this->load->view('UpdateSMMStatus.php', $data); // Pass data to the view
            echo validation_errors();
        } else {
            // Validation passed, proceed with database update
            $imageData = NULL; // Initialize image data


            if (!empty($_FILES['imageData']['name'])) {
                // Image uploaded, handle file upload
                $config['upload_path'] = './Graphics_Image/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 1024 * 1024 * 1024; // 1GB
                $config['encrypt_name'] = FALSE;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('imageData')) {
                    // File uploaded successfully
                    $upload_data = $this->upload->data();
                    $imageData = $upload_data['full_path']; // Get full path to the uploaded file
                    // echo "<pre>";
                    // print_r($this->upload->data());

                } else {
                    // Upload failed, handle error
                    echo $this->upload->display_errors();
                    return;
                }
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/DashboardContro/dashboard'));
                }
            } else {
                if ($this->UpdateTaskModel->updateData($tid, $cr_Status, $gr_Status, $smm_Status, $editor_content, $data['receiveddata'][0]->imageData, $ticketValue, $Gr_ticketValue, $Smm_ticketValue)) {
                    // If update is successful, redirect to dashboard
                    redirect(base_url('index.php/DashboardContro/dashboard'));
                }
            }
        }
    }


    function acceptTicket()
    {

        $tid = $this->input->post('tid');
        $ticketValue = $this->input->post('ticketValue');


        // Load the model
        $this->load->model('UpdateTaskModel');

        // Update the task
        if ($this->UpdateTaskModel->accepTiket($tid, $ticketValue)) {
            // If update is successful, redirect to dashboard
            redirect(base_url('index.php/DashboardContro/dashboard'));
        } else {
            // If update fails, handle the error
            echo $this->upload->display_errors();
            echo "Update failed";
        }
    }
}
