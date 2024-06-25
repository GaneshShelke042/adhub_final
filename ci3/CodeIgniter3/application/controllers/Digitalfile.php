<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Digitalfile extends CI_Controller
{
    public $upload;
    public $form_validation;
    public $Digitalfilemodel;
    public $db;
    public $session;
    public $pagination;


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Digitalfilemodel');
    }




    public function view()
    {
        $id = $this->uri->segment(3);

        $this->load->model('Digitalfilemodel');
        $data['data'] = $this->Digitalfilemodel->viewdatabyid($id);
        // $data['id'] = $id;

        $data['Logo'] = array();
        $data['Prospect']  = array();
        $data['Old Designs']  = array();
        $data['Others']  = array();

        foreach ($data['data'] as $key) {
            if ($key['Type'] == 'Logo') {
                $data['Logo'][] = $key;
            } else  if ($key['Type'] == 'Prospect') {
                $data['Prospect'][] = $key;
            } else  if ($key['Type'] == 'Old Designs') {
                $data['Old Designs'][] = $key;
            } else {
                $data['Others'][] = $key;
            }
        }
        // print_r( $data);



        // Extract the 'Name' column from the array for sorting
        $names = array_column($data['Logo'], 'Name');

        // Sort the array based on 'Name'
        array_multisort($names, SORT_ASC, $data['Logo']);

        // Create a new array with sorted logos
        $sortedLogoArray = [];

        foreach ($data['Logo'] as $logo) {
            $sortedLogoArray[$logo['Name']][] = $logo;
        }

        // Now $sortedLogoArray contains logo
        // print_r($sortedLogoArray);

        $value['sortedLogoArray'] = $sortedLogoArray;


        // Extract the 'Name' column from the array for sorting
        $names = array_column($data['Prospect'], 'Name');
        // Sort the array based on 'Name'
        array_multisort($names, SORT_ASC, $data['Prospect']);
        // Create a new array with sorted Prospect
        $sortedProspectArray = [];
        foreach ($data['Prospect'] as $Prospect) {
            $sortedProspectArray[$Prospect['Name']][] = $Prospect;
        }
        // Now $sortedProspectArray contains Prospect
        // print_r($sortedProspectArray);

        $value['sortedProspectArray'] = $sortedProspectArray;


        // Extract the 'Name' column from the array for sorting
        $names = array_column($data['Old Designs'], 'Name');
        // Sort the array based on 'Name'
        array_multisort($names, SORT_ASC, $data['Old Designs']);
        // Create a new array with sorted Old_Designs
        $sortedOld_DesignsArray = [];
        foreach ($data['Old Designs'] as $Old_Designs) {
            $sortedOld_DesignsArray[$Old_Designs['Name']][] = $Old_Designs;
        }
        // Now $sortedOld_DesignsArray contains Old_Designs
        // print_r($sortedOld_DesignsArray);
        $value['sortedOld_DesignsArray'] = $sortedOld_DesignsArray;




        // Extract the 'Name' column from the array for sorting
        $names = array_column($data['Others'], 'Name');
        // Sort the array based on 'Name'
        array_multisort($names, SORT_ASC, $data['Others']);
        // Create a new array with sorted Others
        $sortedOthersArray = [];
        foreach ($data['Others'] as $Others) {
            $sortedOthersArray[$Others['Name']][] = $Others;
        }
        // Now $sortedOthersArray contains Others
        // print_r($sortedOthersArray);
        $value['sortedOthersArray'] = $sortedOthersArray;
        $value['id'] = $id;
        $this->load->library('pagination');
        // print_r($value);
        $this->load->view('SideHeadFoot');
        $this->load->view('viewDigitalfile', $value);
    }


   
    public function add()
    {
        $id = $this->uri->segment(3);
        $data = $this->input->post();

        echo "<pre>";
        print_r($data);

        $this->load->library('form_validation');
        $this->load->model('Digitalfilemodel');
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('Type', 'Type', 'required');

        // Add form validation rule for file input
        $this->form_validation->set_rules('file[]', 'Image', 'callback_file_check');

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        } else {
            // Configure upload settings
            $config['upload_path'] = './DigitalFiles/';
            $config['allowed_types'] = 'jpg|jpeg|png|mp4|avi|mov|mkv';
            $config['max_size'] = 1000000;
            $config['encrypt_name'] = false;
            $this->load->library('upload', $config);

            // Check if files are selected
            if (!empty($_FILES['file']['name'][0])) {
                $filesCount = count($_FILES['file']['name']);
                for ($i = 0; $i < $filesCount; $i++) {
                    $_FILES['userfile']['name'] = $_FILES['file']['name'][$i];
                    $_FILES['userfile']['type'] = $_FILES['file']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $_FILES['file']['error'][$i];
                    $_FILES['userfile']['size'] = $_FILES['file']['size'][$i];

                    // Initialize upload library for each file
                    $this->upload->initialize($config);

                    // Upload the file
                    if ($this->upload->do_upload('userfile')) {
                        // Retrieve upload data for each file
                        $uploadData = $this->upload->data('file_name');
                        $file_ext = $this->upload->data('file_ext');
                       
                        print_r($uploadData);
                        echo 'File uploaded successfully: ' . $uploadData;
                        echo '<br>';
                        $data['image'] =  $uploadData;
                        $data['file'] =  $file_ext;
                        date_default_timezone_set('Asia/Kolkata');
                        $currentDateTime = date('Y-m-d H:i:s'); // Format: YYYY-MM-DD HH:MM:SS
                        echo $currentDateTime;
                        $data['created_on'] =  $currentDateTime;
                        $data['Client_id'] =  $id;
                        print_r($data);
                        // data save in Digitalfile table
                        $this->Digitalfilemodel->insertdata($data);
                    } else {
                        $uploadErrors = $this->upload->display_errors();
                        echo "Upload Error: $uploadErrors";
                        echo '<br>';
                    }
                }
                redirect(base_url() . 'index.php/Digitalfile/view/' . $id);
            } else {
                echo 'No files selected.';
            }
        }
    }

    // // Custom validation callback for file input
    public function file_check($str)
    {
        if (empty($_FILES['file']['name'][0])) {
            $this->form_validation->set_message('file_check', 'Please select at least one file to upload.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function showimage()
    {
        $data = $this->input->post();
        // print_r($data);
        $receivedddata[] = $this->Digitalfilemodel->viewdatabynameandtype($data);

        echo json_encode($receivedddata);
    }

    public function deletedata()
    {
        $data = $this->input->post();

        $receivedddata[] = $this->Digitalfilemodel->viewdatabynameandtype($data);

        // echo json_encode($data);
        // echo  '<pre>';
        // print_r($receivedddata);
        foreach ($receivedddata as $item => $value) {
            foreach ($value as $v) {
                $imagePath = './DigitalFiles/' . $v['image'];
                echo 'iamge';
                echo '<br>';
                echo $imagePath;
                echo '<br>';

                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image file
                    echo 'Image ' . $v['image'] . ' deleted.<br>';
                } else {
                    echo 'Image ' . $v['image'] . ' not found.<br>';
                }
            }
        }


        if ($this->Digitalfilemodel->Deletedatabynameandtype($data)) {
            echo json_encode(['status' => true]);
        } else {
            echo json_encode(['status' => false]);
        }
    }


    public function deleteparticularimage()
    {
        $id = $this->input->post('id');
        $data =  $this->Digitalfilemodel->viewbyid($id);
        // echo $data[0]['image'];

        if (!empty($data[0]['image'])) {
            $imagePath =    './DigitalFiles/' . $data[0]['image']; // Update the path accordingly

            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the file from the server

                // echo json_encode(['status' => 'Image deleted successfully.']);
            } else {
                // echo json_encode(['status' => 'Image not found or already deleted.']);
            }
            $this->Digitalfilemodel->deletebyid($id);
            echo json_encode(['status' => 'Image deleted successfully.']);
        } else {
            echo json_encode(['status' => 'Data not found for the given ID.']);
        }
    }


    public function updatestatus()
    {
        $data = $this->input->post();
        if ($this->Digitalfilemodel->updatestatus($data)) {

            echo json_encode(['Status' => '200']);
        } else {
            echo json_encode(['Status' => '500']);
        }
    }

    // public function  retriveddata()
    // {
    //     $data['clientID'] = $this->input->post('Client_id');
    //     // $data['clientID'] = $this->uri->segment(3);
    //     echo "<pre>";
    //     // print_r($data);
    //     $receivedddata = $this->Digitalfilemodel->showImagebyclientid($data['clientID']);

    //     $data['Logo'] = array();
    //     $data['Prospect']  = array();
    //     $data['Old Designs']  = array();
    //     $data['Others']  = array();

    //     foreach ($receivedddata as $key) {
    //         if ($key['Type'] == 'Logo') {
    //             $data['Logo'][] = $key;
    //         } else  if ($key['Type'] == 'Prospect') {
    //             $data['Prospect'][] = $key;
    //         } else  if ($key['Type'] == 'Old Designs') {
    //             $data['Old Designs'][] = $key;
    //         } else {
    //             $data['Others'][] = $key;
    //         }
    //     }




    //     // Extract the 'Name' column from the array for sorting
    //     $names = array_column($data['Logo'], 'Name');

    //     // Sort the array based on 'Name'
    //     array_multisort($names, SORT_ASC, $data['Logo']);

    //     // Create a new array with sorted logos
    //     $sortedLogoArray = [];

    //     foreach ($data['Logo'] as $logo) {
    //         $sortedLogoArray[$logo['Name']][] = $logo;
    //     }

    //     // Now $sortedLogoArray contains logo
    //     // print_r($sortedLogoArray);

    //     $value['sortedLogoArray'] = $sortedLogoArray;
    //     //    print_r($value['sortedLogoArray']);


    //     // Extract the 'Name' column from the array for sorting
    //     $names = array_column($data['Prospect'], 'Name');
    //     // Sort the array based on 'Name'
    //     array_multisort($names, SORT_ASC, $data['Prospect']);
    //     // Create a new array with sorted Prospect
    //     $sortedProspectArray = [];
    //     foreach ($data['Prospect'] as $Prospect) {
    //         $sortedProspectArray[$Prospect['Name']][] = $Prospect;
    //     }
    //     // Now $sortedProspectArray contains Prospect
    //     // print_r($sortedProspectArray);

    //     $value['sortedProspectArray'] = $sortedProspectArray;


    //     // Extract the 'Name' column from the array for sorting
    //     $names = array_column($data['Old Designs'], 'Name');
    //     // Sort the array based on 'Name'
    //     array_multisort($names, SORT_ASC, $data['Old Designs']);
    //     // Create a new array with sorted Old_Designs
    //     $sortedOld_DesignsArray = [];
    //     foreach ($data['Old Designs'] as $Old_Designs) {
    //         $sortedOld_DesignsArray[$Old_Designs['Name']][] = $Old_Designs;
    //     }
    //     // Now $sortedOld_DesignsArray contains Old_Designs
    //     // print_r($sortedOld_DesignsArray);
    //     $value['sortedOld_DesignsArray'] = $sortedOld_DesignsArray;




    //     // Extract the 'Name' column from the array for sorting
    //     $names = array_column($data['Others'], 'Name');
    //     // Sort the array based on 'Name'
    //     array_multisort($names, SORT_ASC, $data['Others']);
    //     // Create a new array with sorted Others
    //     $sortedOthersArray = [];
    //     foreach ($data['Others'] as $Others) {
    //         $sortedOthersArray[$Others['Name']][] = $Others;
    //     }
    //     // Now $sortedOthersArray contains Others
    //     // print_r($sortedOthersArray);
    //     $value['sortedOthersArray'] = $sortedOthersArray;

    //     echo json_encode($value);
    // }

    public function retriveddata()
    {
        $clientID = $this->input->post('Client_id');
        // $clientID = $this->uri->segment(3);
        $receivedData = $this->Digitalfilemodel->showImagebyclientid($clientID);

        $data = [
            'Logo' => [],
            'Prospect' => [],
            'Old Designs' => [],
            'Others' => [],
        ];

        // Categorize data
        foreach ($receivedData as $key) {
            switch ($key['Type']) {
                case 'Logo':
                    $data['Logo'][] = $key;
                    break;
                case 'Prospect':
                    $data['Prospect'][] = $key;
                    break;
                case 'Old Designs':
                    $data['Old Designs'][] = $key;
                    break;
                default:
                    $data['Others'][] = $key;
                    break;
            }
        }

        // Sorting and grouping
        $value = [
            'sortedLogoArray' => $this->sortAndGroupByName($data['Logo']),
            'sortedProspectArray' => $this->sortAndGroupByName($data['Prospect']),
            'sortedOld_DesignsArray' => $this->sortAndGroupByName($data['Old Designs']),
            'sortedOthersArray' => $this->sortAndGroupByName($data['Others']),
        ];

        echo json_encode($value);
        // echo"<pre>";
        // print_r($value);
    }

    private function sortAndGroupByName($items)
    {
        if (empty($items)) {
            return [];
        }

        $names = array_column($items, 'Name');
        array_multisort($names, SORT_ASC, $items);

        $sortedArray = [];
        foreach ($items as $item) {
            $sortedArray[$item['Name']][] = $item;
        }

        return $sortedArray;
    }
}
