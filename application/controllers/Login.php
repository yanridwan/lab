<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/auth/login');
        } else {
            $this->load->model('LoginModel');
            $valid_user = $this->LoginModel->check_credential();

            if ($valid_user == FALSE) {
                $this->session->set_flashdata('error', 'Username / Password Salah');
                redirect('login');
            } else {
                // if the username and password is a match
                $this->session->set_userdata('username', $valid_user->user_nama);
                $this->session->set_userdata('usernip', $valid_user->user_nip);
                $this->session->set_userdata('level_id', $valid_user->level_id);
                $this->session->set_userdata('gambar', $valid_user->user_foto);

                switch ($valid_user->level_id) {
                    case 1: //admin
                        redirect('admin');
                        break;
                    case 2: //gudang
                        redirect('admin');
                        break;
                    case 3: //member
                        redirect('admin');
                        break;
                    case 4: //member
                        redirect('admin');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
