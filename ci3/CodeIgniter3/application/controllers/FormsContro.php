<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FormsContro extends CI_Controller
{

    public $db;
    public $form_validation;
    public $RoleModel;
    public $Forms;
    public $session;
    public $upload;


    function viewForms()
    {
        $this->load->model('Forms');
        $result = $this->Forms->view();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->load->view('Forms/ViewForms.php', $data);
    }

    
    function addForms()
    {

        $this->load->model('Forms');
        $this->load->model('RoleModel');
        $result = $this->RoleModel->viewRoles();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');
        $this->form_validation->set_rules('name', 'name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Forms/AddForms.php', $data);
        } else {
            $data = array();
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['description'] = $this->input->post('description');
            $data['question'] = implode(',', $this->input->post('question'));
            $data['options'] = $this->input->post('options'); // Assuming $data['options'] is an array


            $data['type'] = implode(',', $this->input->post('type'));
            $data['required'] = implode(',', $this->input->post('required'));
            $data['dis'] = implode(',', $this->input->post('dis'));
            $data['pattern'] = implode(',', $this->input->post('pattern'));

            $data['ptrn_msg'] = implode(',', $this->input->post('ptrn_msg'));
            $data['cols'] = implode(',', $this->input->post('cols'));
            $data['permissions'] = implode(',', $this->input->post('permissions'));


            $name    = $this->input->post('name');
            $status    = $this->input->post('status');
            $description    = $this->input->post('description');
            $question    = $this->input->post('question');
            $type    = $this->input->post('type');
            $required    = $this->input->post('required');
            $dis    = $this->input->post('dis');
            $pattern    = $this->input->post('pattern');
            $ptrn_msg    = $this->input->post('ptrn_msg');
            $cols    = $this->input->post('cols');
            $permissions    = $this->input->post('permissions');
            $options = $this->input->post('options'); // Assuming $options is an array

            print_r($required);




            for ($i = 0; $i < count($question); $i++) {
                $data1 = array(

                    'name' => $this->input->post('name'),
                    'status' =>  $this->input->post('status'),
                    'description' => $this->input->post('description'),
                    'question' => $question[$i],
                    'type' => $type[$i],
                    'required' => $required[$i],
                    'dis' => $dis[$i],
                    'pattern' => $pattern[$i],
                    'ptrn_msg' => $ptrn_msg[$i],
                    'cols' => $cols[$i],
                    'permissions' => $permissions[$i],
                    'options' => $options[$i],
                );

                $this->Forms->insert($data1);
            }



            redirect(base_url() . 'index.php/FormsContro/viewForms');
        }
    }


    function editForm()
    {
        $name = $this->uri->segment(3);
        echo $name;

        $this->load->model('Forms');
        $this->load->model('RoleModel');
        $result = $this->RoleModel->viewRolename();
        $olddata = $this->Forms->viewformsbyname($name);
        // echo "<pre>";
        // print_r($olddata);
        // print_r($result);
        $data = array();
        $data['result'] = $result;
        $data['olddata'] = $olddata;
        // print_r($data);
        // echo count($olddata);
        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('SideHeadFoot.php');
            $this->load->view('Forms/EditForms.php', $data);
        } else {

            // $data = array();
            // $data = $this->input->post();
            // echo "<pre>";
            // print_r($data);

            $data = array();
            $data['name'] = $this->input->post('name');
            $data['status'] = $this->input->post('status');
            $data['description'] = $this->input->post('description');
            $data['require'] = $this->input->post('require');
            $data['id'] = $this->input->post('iddd');
            $data['question'] = $this->input->post('question');
            $data['type'] = $this->input->post('type');
            $data['dis'] = $this->input->post('dis');
            $data['pattern'] = $this->input->post('pattern');
            $data['ptrn_msg'] = $this->input->post('ptrn_msg');
            $data['cols'] = $this->input->post('cols');
            $data['permissions'] = $this->input->post('permissions');
            $data['options'] = $this->input->post('options');

            // Assuming you receive the array in this format: [0,0,0]
            $receivedArray =  $data['require'][0];

            // Remove the brackets from the received array string
            $cleanedArray = str_replace(['[', ']'], '', $receivedArray);

            // Split the cleaned array string into individual elements
            $individualElements['require'] = explode(',', $cleanedArray);
            // print_r($individualElements);
            $data['require'] = $individualElements['require'];
            // echo "<pre>";
            // print_r($data);
            $looptime =  count($data['require']);
            // echo $looptime;
            // foreach($data['require'] as $d){
            //     echo $d;
            // }

            $updatedvalue = array();


            for ($i = 0; $i < $looptime; $i++) {
                // echo "<br>";
                if (!empty($data['id'][$i])) {
                    // echo "Empty Nahi " . $data['id'][$i];

                    $data1 = array(
                        'name' =>   $data['name'],
                        'status' => $data['status'],
                        'description' =>  $data['description'],
                        'required' =>  $data['require'][$i],
                        'question' =>  $data['question'][$i],
                        'type' =>  $data['type'][$i],
                        'dis' =>  $data['dis'][$i],
                        'pattern' =>  $data['pattern'][$i],
                        'ptrn_msg' =>  $data['ptrn_msg'][$i],
                        'cols' =>  $data['cols'][$i],
                        'permissions' =>  $data['permissions'][$i],
                        'options' =>  $data['options'][$i],
                    );
                    // echo "<br>";
                    // print_r($data1);

                    $updatedvalue[] = $data['id'][$i];

                    $this->Forms->updateData($data['id'][$i], $data1);
                } else {
                    if (!empty($data['question'][$i])) {
                        // echo "Empty ahe" . $data['id'][$i];
                        $data1 = array(
                            'name' =>   $data['name'],
                            'status' => $data['status'],
                            'description' =>  $data['description'],
                            'required' =>  $data['require'][$i],
                            'question' =>  $data['question'][$i],
                            'type' =>  $data['type'][$i],
                            'dis' =>  $data['dis'][$i],
                            'pattern' =>  $data['pattern'][$i],
                            'ptrn_msg' =>  $data['ptrn_msg'][$i],
                            'cols' =>  $data['cols'][$i],
                            'permissions' =>  $data['permissions'][$i],
                            'options' =>  $data['options'][$i],
                        );
                        // echo "<br>";
                        // print_r($data1);
                        $inserted_id =  $this->Forms->insert($data1);
                        $updatedvalue[] = $inserted_id;

                        // $updated[] = $data1;
                    }
                }
                // echo "<br>";
            }

            $existingdata =   $this->Forms->viewformsbyname($name);
            $newdataforcomapare = array();
            foreach ($existingdata as $e) {
                $newdataforcomapare['id'][] = $e['id'];
            }



            // echo "<br>";
            // echo "fkt id";
            // echo "<br>";
            // print_r($updatedvalue);
            // echo "<br>";

            // echo "<br> ";
            // echo "updated and inserted";
            // echo "<br> ";
            // print_r($newdataforcomapare['id']);
            // echo "<br> ";
            // echo "<br> ";
            // echo "come form post ";
            // echo "<br> ";


            // Extract only the values from the "fkt id" array
            // Use array_diff() to find values in "updated and inserted" that are not in "fkt id"
            $diff = array_diff($newdataforcomapare['id'], $updatedvalue);

            print_r($diff);
            foreach($diff as $dif){
                // echo $dif;
                $this->Forms->dataDeletebyid($dif);
            }





            redirect(base_url() . 'index.php/FormsContro/viewForms');
        }
    }



    function deleteData($userData)
    {
        $this->load->model('Forms');
        $this->Forms->dataDelete($userData);
        redirect(base_url() . 'index.php/FormsContro/viewForms');
    }

    public function addQuestion()
    {
        // Load the Forms model
        $this->load->model('Forms');

        // Fetch the form view data
        $result = $this->Forms->view();
        $data = array();
        $data['result'] = $result;

        // Check if form is submitted
        if ($this->input->post()) {
            // Fetch existing answers from POST request
            $form_Name = $this->input->post('form_Name');
            $client_id = $this->input->post('client_id');
        } else {
            // Fetch existing answers from URI segment
            $client_id = $this->uri->segment(4);
            $form_Name = $this->uri->segment(3);
        }

        // Fetch existing answers
        $existingAnswers = $this->Forms->fetchAnswers($client_id, $form_Name);

        if (!empty($existingAnswers)) {
            $data['existingAnswers'] = $existingAnswers;
        }
        

        // Set form validation rules
        $this->form_validation->set_rules('form_Name', 'Form Name', 'required');
        $this->form_validation->set_rules('client_id', 'Client ID', 'required');

        if ($this->form_validation->run() == false) {
            // Load the views with form data
            $this->load->view('SideHeadFoot.php');
            $this->load->view('Forms/showForm.php', $data);
        } else {
            // Prepare data for insertion or update
            $data = array(
                'form_name' => $this->input->post('form_Name'),
                'client_id' => $this->input->post('client_id'),
                'question' => implode(",", $this->input->post('question')),
                'ans' => implode(",", $this->input->post('ans')),
            );

            // Debugging statement to check if data is being prepared correctly


            // Additional debugging statement to see if this block is being executed
            echo "Checking if existing answers exist...<br>";

            if (!empty($existingAnswers)) {
                // Update existing answers
                echo "Existing answers found. Updating...<br>";
                $this->Forms->updateForm($client_id, $form_Name, $data);
            } else {
                // Insert new answers
                echo "No existing answers found. Inserting new data...<br>";
                $this->Forms->insertForm($data);
            }

            // Redirect to some page after processing
            redirect(base_url() . 'index.php/UpdateClientContro/viewCalender/' . $data['client_id']);
        }
    }


    function viewAns()
    {
        $this->load->model('Forms');
        $result = $this->Forms->viewAns();
        $data = array();
        $data['result'] = $result;

        $this->load->view('SideHeadFoot.php');

        $this->load->view('Forms/showAns.php', $data);
    }

    public function status()
    {
        if (isset($_REQUEST['status'])) {
            $this->load->model('Forms');
            $up_Status = $this->Forms->updateStatus();


            if ($up_Status > 0) {
                $this->session->set_flashdata("Update Successfully");
            } else {
                $this->session->set_flashdata("Update Unsuccessfully");
            }
            return redirect('index.php/FormsContro/viewForms');
        }
    }
}
