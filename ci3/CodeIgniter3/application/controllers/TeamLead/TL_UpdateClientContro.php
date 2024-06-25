
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TL_UpdateClientContro extends CI_Controller
{

    public function __construct()
    {



        parent::__construct();


        //VVVVVVVVVVVVVVVVVVVVVVVVVVV THis is for permission  VVVVVVVVVVVVVVVVVVVVVV

        $this->load->model('TeamLeadModel/TL_TeamModel');

        // Set the name condition

        $name = 'Team Lead';
        $statuses = $this->TL_TeamModel->getRoleStatus($name);


        $data['myClientStatus'] = $statuses['Client'];
        $data['myDashboardStatus'] = $statuses['Dashboard'];
        $data['myExamsStatus'] = $statuses['My_Exams'];
        $data['myVideosStatus'] = $statuses['My_Videos'];
        $data['mySocial_MediaStatus'] = $statuses['Social_Media'];
        $data['myPackage_Category'] = $statuses['Package_Category'];
        $data['myPackage_GST'] = $statuses['Package_GST'];
        $data['myPackage_Service'] = $statuses['Package_Service'];
        $data['myPackage'] = $statuses['Package'];

        $this->load->view('TeamLead/TL_SideHeadFoot', $data);


        // ^^^^^^^^^^^^^^^^^^^^^^^ This is for Permission  ^^^^^^^^^^^^^^^^^^^^^^


    }




    public $Cr_WriterModel;
    public $TL_TeamModel;
    public $db;
    public $form_validation;
    public $GenrateCalender;
    public $PackageModel;
    public $PackageServicesModel;
    public $Forms;
    public $ClientFormModel;
    public $session;
    public $Curd_model;
    public $upload;
    public $UpdateTaskModel;


    function viewCalender()
    {

        $this->load->model('Forms');
        $this->load->model('Curd_model');
        $this->load->model('ClientFormModel');


        $addnewclient1 = $this->Curd_model->viewData();
        $result = $this->Forms->view();
        $check = $this->ClientFormModel->view();

        $data1 = array(
            'addnewclient1' => $addnewclient1,
            'result' => $result,
            'check' => $check,

        );

        // $this->load->view('SideHeadFoot.php');
        $this->load->view('TeamLead/TL_UpdateClient.php', $data1);
    }





    // All about genrate Calender VVVVVVVVV


    public function genrateCalender()
    {


        // this is for display Calender type in client
        $this->load->model('Curd_model');
        $addnewclient1 = $this->Curd_model->viewData();
        $Clientpackage = $this->Curd_model->viewpackage();

        $this->load->model('PackageModel');
        $package = $this->PackageModel->viewpackage();






        $data1 = array();
        $data1['addnewclient1'] = $addnewclient1;
        $data1['package'] = $package;
        $data1['Clientpackage'] = $Clientpackage;



        $this->load->model('GenrateCalender');

        $this->form_validation->set_rules('numberOfDays', 'number_of_days', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('TeamLead/TL_GenrateCalender.php', $data1);
        } else {

            $data = array();
            //Databse field                       //  form field   
            $uniqueId = substr(uniqid(), -5);
            $data['delet_id'] = $uniqueId;
            $data['start_date'] = $this->input->post('startDate');
            $data['number_of_days'] = $this->input->post('numberOfDays');
            $data['service']  = implode(',', $this->input->post('selectedOptions'));
            $data['name'] = implode(',', $this->input->post('Name'));
            $data['details'] = implode(',', $this->input->post('details'));
            $data['additional_info'] = implode(',', $this->input->post('additionalInfo'));
            $data['date_formatted'] = implode(',', $this->input->post('selectedDates'));
            $data['imageLogo'] =   $this->input->post('imageLogo');
            $data['client_id'] =   $this->input->post('client_id'); // Assigning client_id extracted from URL  
            $data['brand_name'] = $this->input->post('brand_name');
            $data['cr_Status'] = 1;
            // print_r($data['service']);
            // print_r($data['date_formatted']);

            //           Above data going in calender45 table
            $this->GenrateCalender->insert1($data);

            // Assuming you want to insert each value into a separate row     
            $startDate = $this->input->post('startDate');
            $client_names = $this->input->post('Name');
            $imageLogo =  $this->input->post('imageLogo');
            $task_names = $this->input->post('selectedOptions');
            $dateComponents = $this->input->post('selectedDates');
            // $dateComponents = array_filter($dateComponents);

            // print_r($dateComponents);



            $dataarray = array();

            foreach ($dateComponents as $dateList) {
                // Split the current element into individual dates
                $dates = explode(',', $dateList);

                // Now $dates is an array containing individual date strings
                // You can iterate over this array or access individual elements directly
                foreach ($dates as $date) {
                    // Output each date
                    $date . "<br>";

                    // Extract only the date part
                    $date = date('Y-m-d', strtotime($date));

                    // Append each date to the $dataarray
                    $date;
                }
                $dataarray[] = $date;
            }

            // print_r($dataarray);




            // Print the $dataarray

            $Client_id = $this->input->post('client_id');
            $brand_name = $this->input->post('brand_name');

            // print_r($date);
            $cr_Status = '1';


            // Loop through the arrays and insert each value into a separate row
            for ($i = 0; $i < count($task_names); $i++) {
                // Assuming $dataarray has the same length as $task_names
                $deadline_datetime = isset($dataarray[$i]) ? $dataarray[$i] : null;

                $data1 = array(
                    'delet_id' => $uniqueId,
                    'client_name' => $client_names[$i],
                    'task_name' => $task_names[$i],
                    'cr_Status' => '1', // Set cr_Status to 1
                    'deadline_datetime' => $deadline_datetime,
                    'client_id' => $this->input->post('client_id'),
                    'imageLogo' => $this->input->post('imageLogo'),
                    'brand_name' => $this->input->post('brand_name')
                );
                echo "<pre>";
                print_r($data1);
                echo "<pre>";

                // Above data going in dashbord table
                $this->GenrateCalender->insertDashbord($data1);
            }
            redirect(base_url() . 'index.php/TeamLead/TL_UpdateClientContro/viewClientCalender/' . $data['client_id']);
        }
    }




    function viewClientCalender()
    {
        $this->load->model('Curd_model');
        $addnewclient1 = $this->Curd_model->viewData();
        $data['addnewclient1'] = $addnewclient1;

        $this->load->model('GenrateCalender');
        $result = $this->GenrateCalender->viewData();
        $data['result'] = $result;

        // $this->load->view('SideHeadFoot.php');
        $this->load->view('TeamLead/TL_ViewClientCalender.php', $data);
    }




    function editData()
    {
        $this->load->model('GenrateCalender');
        $this->load->model('Curd_model');
        $this->load->model('PackageModel');
        $this->load->model('UpdateTaskModel');

        $id = $this->uri->segment(4);
        // echo $id;


        $package = $this->PackageModel->viewpackage();
        $check = $this->GenrateCalender->viewdatabyid($id);
        $addnewclient1 = $this->Curd_model->viewData();
        $Clientpackage = $this->Curd_model->viewpackage();

        // print_r($id);
        $data = array(
            'check' => $check,
            'addnewclient1' => $addnewclient1,
            'package' => $package,
            'Clientpackage' => $Clientpackage,
        );
        // echo "<br>";
        // echo $id;
        // echo "<br>";
        // echo "<pre>";
        if (!empty($check)) {
            foreach ($check as $ch) {
                if ($ch['id'] == $id) {
                    // echo "<pre>";
                    // print_r($ch);
                    $d   =   $this->UpdateTaskModel->viewdatabyclient_id($ch['Client_id'], $ch['delet_id']);
                    // print_r($ch);
                    // print_r($d);
                    $data['olddata'] = $d;
                    $data['correctdata'] = $ch;
                }
            }
        }
        // echo "<pre>";

        // print_r($data['check']);
        // print_r($data['addnewclient1']);
        // print_r($data['package']);
        // print_r($data['Clientpackage']);
        // print_r($data['olddata']);
        // print_r( $data['correctdata']);


        // // Split the 'name' and 'details' fields by commas and remove extra spaces
        // if (!empty($data['check'])) {
        //     foreach ($data['check'] as &$entry) {
        //         if (isset($entry['date_formatted'])) {
        //             $allDates = explode(',', $entry['date_formatted']);
        //             $entry['date_formatted'] = array_filter($allDates, function ($value) {
        //                 return    strtotime($value) !== false;
        //             }); // Extract only valid dates
        //             $entry['date_formatted'] = array_map('trim', $entry['date_formatted']); // Remove extra spaces
        //         }
        //         if (isset($entry['name'])) {
        //             $entry['name'] = array_map('trim', explode(',', $entry['name']));
        //         }
        //         if (isset($entry['details'])) {
        //             $entry['details'] = array_map('trim', explode(',', $entry['details']));
        //         }
        //         if (isset($entry['additional_info'])) {
        //             $entry['additional_info'] = array_map('trim', explode(',', $entry['additional_info']));
        //         }
        //     }
        // }

        // for ($i = 0; $i <  count($data['check'][0]['date_formatted']); $i++) {
        //     if ($i % 2 !== 0) {
        //         $data['dates_form'][]['date'] = $data['check'][0]['date_formatted'][$i];
        //     }
        // }

        // Print the modified array
        // echo "<pre>";
        // print_r($data['check']);
        // echo "</pre>";


        // print_r($data['dates_form']);

        // if (isset($entry['date_formatted'])) 

        // for ($i = 0; $i <  count($data['check'][0]['name']); $i++) {

        //     $data['dates_form'][$i]['name'] = $data['check'][0]['name'][$i];
        // }

        // for ($i = 0; $i <  count($data['check'][0]['details']); $i++) {

        //     $data['dates_form'][$i]['details'] = $data['check'][0]['details'][$i];
        // }

        // for ($i = 0; $i <  count($data['check'][0]['additional_info']); $i++) {

        //     $data['dates_form'][$i]['additional_info'] = $data['check'][0]['additional_info'][$i];
        // }


        // print_r($data['dates_form']);

        // echo "<pre>";

        // echo "olddata";
        // echo "<br>";
        // print_r($data['olddata']);

        // $data['allarray'] = array();

        // foreach ($data['olddata'] as $d) {
        //     // print_r($d['deadline_datetime']);
        //     // echo "<br>";
        //     foreach ($data['dates_form'] as $de) {
        //         if ($d['deadline_datetime'] == $de['date']) {
        //             //   echo "hello";
        //             $tempArray = array(
        //                 'task_name' => $d['task_name'],
        //                 'deadline_datetime' => $d['deadline_datetime'],
        //                 'name' => $de['name'],
        //                 'details' => $de['details'],
        //                 'additional_info' => $de['additional_info']
        //             );
        //             $data['allarray'][] = $tempArray;
        //         }
        //     }
        // }

        // echo"<pre>";
        // print_r( $data['allarray']);



        $this->form_validation->set_rules('numberOfDays', 'number_of_days', 'required');

        if ($this->form_validation->run() == false) {
            //$this->load->view('SideHeadFoot.php');
            $this->load->view('TeamLead/TL_Edit_Calender.php', $data);
        } 
        else 
        {
            $edit = array(
                'start_date' =>  $this->input->post('startDate'),
                'number_of_days' => $this->input->post('numberOfDays'),
                'service' =>  implode(',', $this->input->post('selectedOptions')),
                'name' => implode(',', $this->input->post('Name')),
                'details' => implode(',', $this->input->post('details')),
                'additional_info' => implode(',', $this->input->post('additionalInfo')),
                'date_formatted' =>   implode(',', $this->input->post('formattedDate')),
            );
            echo "<pre>";
            print_r($edit);
            echo "<br>";
            echo $id;
            echo "<br>";

            $this->GenrateCalender->updatCalender($id, $edit);
            $startDate = $this->input->post('startDate');
            $client_names = $this->input->post('Name');
            $imageLogo =  $this->input->post('imageLogo');
            $task_names = $this->input->post('selectedOptions');
            $dateComponents = $this->input->post('formattedDate');
            $dateComponents = array_filter($dateComponents);

            print_r($task_names);
            // print_r($data['correctdata']);
            foreach ($dateComponents as $dateList) {
                // Split the current element into individual dates
                $dates = explode(',', $dateList);

                // Now $dates is an array containing individual date strings
                // You can iterate over this array or access individual elements directly
                foreach ($dates as $date) {
                    // Output each date
                    // echo $date . "<br>";

                    // Extract only the date part
                    $date = date('Y-m-d', strtotime($date));

                    // Append each date to the $dataarray

                }
                $dataarray[] = $date;
            }

            print_r($dataarray);

            // Initialize the combined array
            $combinedArray = array();

            // Check if both arrays have the same length
            if (count($task_names) == count($dataarray)) {
                // Iterate through the arrays and combine elements
                for ($i = 0; $i < count($task_names); $i++) {
                    $combinedArray[$i]['task_name'] = $task_names[$i];
                    $combinedArray[$i]['deadline_datetime'] =  $dataarray[$i];
                }
            } else {
                echo "The arrays are not of the same length.";
            }

            // Print the combined array
            echo "combinedArray";
            print_r($combinedArray);
            $Fetchdashboard = $this->GenrateCalender->viewdatabydelet_ID($data['correctdata']['delet_id']);
            echo "Fetchdashboard";
            print_r($Fetchdashboard);

            // echo "<br>";
            // echo "Start loop";
            // echo "<br>";


            foreach ($combinedArray as $combarray) {
                if (empty($combarray['task_name'])) {
                    continue; // Skip this entry if task_name is empty
                }

                $found = false;
                foreach ($Fetchdashboard as $fetchdash) {
                    if ($fetchdash['deadline_datetime'] == $combarray['deadline_datetime'] && $fetchdash['task_name'] == $combarray['task_name']) {
                        // Update record if both deadline_datetime and task_name match
                        $this->GenrateCalender->updatedashboarddata($fetchdash['id'], $combarray);
                        $found = true;
                        break;
                    }
                }

                if (!$found) {

                    echo "<br>";
                    echo "forinserting";
                    echo "<br>";
                    print_r($combarray);
                    echo "<br>";
                    // Insert new entry if no matching record is found in Fetchdashboard
                    $this->GenrateCalender->insertDashbord([
                        'Client_id' => $data['correctdata']['Client_id'],
                        'brand_name' => $data['correctdata']['brand_name'],
                        'imageLogo' => $data['correctdata']['imageLogo'],
                        'deadline_datetime' => $combarray['deadline_datetime'],
                        'task_name' => $combarray['task_name'],
                        'cr_Status' => '1',
                        'delet_id' => $data['correctdata']['delet_id']
                    ]);
                }
            }


            // foreach ($combinedArray as $combarray) 
            // {
            //     if (empty($combarray['task_name'])) {

            //         continue; // Skip this entry if task_name is empty
            //     }

            //     $found = false;
            //     foreach ($Fetchdashboard as $fetchdash) {
            //         if ($fetchdash['deadline_datetime'] == $combarray['deadline_datetime']) {
            //             $this->GenrateCalender->updatedashboarddata($fetchdash['id'], $combarray);
            //             $found = true;
            //             break;
            //         }
            //     }

            //     if (!$found) {
            //         // If no matching deadline_datetime is found in Fetchdashboard, insert new entry
            //         $this->GenrateCalender->insertDashbord([
            //             'Client_id' => $data['correctdata']['Client_id'],
            //             'brand_name' => $data['correctdata']['brand_name'],
            //             'imageLogo' => $data['correctdata']['imageLogo'],
            //             'deadline_datetime' => $combarray['deadline_datetime'],
            //             'task_name' => $combarray['task_name'],
            //             'cr_Status' => '1',
            //             'delet_id' => $data['correctdata']['delet_id']
            //         ]);
            //     }
            // }

            $updatedticket = $this->GenrateCalender->viewdatabydelet_ID($data['correctdata']['delet_id']);
            echo "Updatedticket";
            echo "<br>";

            print_r(($updatedticket));
            echo "combinedArray";
            echo "<br>";
            print_r($combinedArray);

            // Iterate through the combinedArray to check for matching entries
            $fordeletearray = array();
            foreach ($combinedArray as &$combinedEntry) {
                foreach ($updatedticket as $updatedEntry) {
                    if ($combinedEntry['deadline_datetime'] == $updatedEntry['deadline_datetime'] && $combinedEntry['task_name'] == $updatedEntry['task_name']) {
                        // print_r($updatedEntry);
                        $fordeletearray[] = $updatedEntry;
                        // The entry is common, so we can break out of the inner loop
                        break;
                    }
                }
            }
            echo "<br> delete <br>";
            print_r($fordeletearray);


            // Extract IDs from the delete array
            $deleteIds = array_column($fordeletearray, 'id');

            // Filter the updatedticket array to get entries whose IDs are not in the delete array
            $filteredArray = array_filter($updatedticket, function ($updatedEntry) use ($deleteIds) {
                return !in_array($updatedEntry['id'], $deleteIds);
            });

            // Extract IDs from the filtered array
            $filteredIds = array_column($filteredArray, 'id');

            // Print the IDs that do not exist in the delete array
            print_r($filteredIds);

            foreach ($filteredIds as $fill) {
                // echo $fill;
                $this->GenrateCalender->deletedashboardticket($fill);
            }

            redirect(base_url('index.php/TeamLead/TL_UpdateClientContro/viewClientCalender/') . $data['correctdata']['Client_id']);
        }
    }






    function deleteData($userData)
    {

        $id = $this->uri->segment(4);
        $this->load->model('GenrateCalender');
        $result = $this->GenrateCalender->deleteCalender($userData);
        $result = $this->GenrateCalender->deleteDashbord($userData);
        // echo  $id;
        // echo  $userData;
        if (empty($result)) {
            redirect(base_url() . 'index.php/TeamLead/TL_UpdateClientContro/viewClientCalender');
        }
        $this->GenrateCalender->deleteCalender($userData);
        redirect(base_url() . 'index.php/TeamLead/TL_UpdateClientContro/viewClientCalender');
    }
}
