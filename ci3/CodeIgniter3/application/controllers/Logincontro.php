<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logincontro extends CI_Controller
{
    public $form_validation;
    public $db;
    public $session;
    public $LoginModel;
    public $RoleModel;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('RoleModel');
        $this->load->model('LoginModel');
        $this->load->library('form_validation');
        $this->load->library('Session');
    }

    public function login()
    {
        echo $this->session->userdata('user_id');
        echo $this->session->userdata('name');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('Confirm_Password', 'Confirm_Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Login.php');
        } else {
            $data = array(
                $this->session->userdata('user_id'),
                $this->session->userdata('name'),
                'username' => $this->input->post('username'),
                'Confirm_Password' => $this->input->post('Confirm_Password')
            );

            $user = $this->LoginModel->loginUser($data);

            if ($user) {
                $role = $user->role; // Assuming the role field is named 'role'
                $name = $user->name;
                $id = $user->id;
                $this->session->set_userdata('user_id', $id);
                $this->session->set_userdata('name', $name);
                echo $this->session->userdata('user_id');

                switch ($role) {
                    case "Content_Writer":
                        redirect(base_url('index.php/CR_Writer/Cr_dashboardControll/viewDashboard'));
                        break;
                    case 'Graphic_designer':
                        redirect(base_url('index.php/GR_Desinger/Gr_dashboardControll/viewDashboard'));
                        break;
                    case 'Social Media Manager':
                        redirect(base_url('index.php/SMM/Smm_dashboardControll/viewDashboard'));
                        break;

                    case 'Head Content Writer':
                        redirect(base_url('index.php/Head_CR_Writer/Head_Cr_dashboardControll/viewDashboard'));
                        break;

                    case 'Head Graphic designer':
                        redirect(base_url('index.php/Head_GR_Desinger/Head_Gr_dashboardControll/viewDashboard'));
                        break;

                    case 'Head Social Media Manager':
                        redirect(base_url('index.php/Head_SMM/Head_Smm_dashboardControll/viewDashboard'));
                        break;
                    case 'Team Lead':
                        redirect(base_url('index.php/TeamLead/TL_dashboardControll/viewDashboard'));
                        break;
                    case 'Head Team Lead':
                        redirect(base_url('index.php/Head_Team_Lead/Head_TL_dashboardControll/viewDashboard'));
                        break;
                    case 'Sales':
                        redirect(base_url('index.php/Sales/Sale_TL_dashboardControll/viewDashboard'));
                        break;
                    case 'HR':
                        redirect(base_url('index.php/HR/HR_dashboardControll/viewDashboard'));
                        break;
                    case 'Accountant':
                        redirect(base_url('index.php/Accountant/Acc_dashboardControll/viewDashboard'));
                        break;
                    case 'Admin':
                        redirect(base_url('index.php/Admin/Admin_dashboardControll/viewDashboard'));
                        break;
                    default:
                        redirect(base_url('index.php/Logincontro/login'));
                        break;
                }
            } else {
                $data['error'] = 'Invalid username or Confirm_Password';
                $this->load->view('Login.php', $data);
            }
        }
    }
}
