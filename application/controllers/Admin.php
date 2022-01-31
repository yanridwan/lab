<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') != '1') {
            if ($this->session->userdata('level_id') != '2') {
                if ($this->session->userdata('level_id') != '3') {
                    if ($this->session->userdata('level_id') != '4') {
                        redirect('login');
                    }
                }
            }
        }
        $this->load->model('AdminModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['permintaansample'] = $this->AdminModel->numrows('form');
        $data['pengiriman'] = $this->AdminModel->numrows('pengiriman');
        $data['user'] = $this->AdminModel->numrows('user');
        $data['finish'] = $this->db->select()->from('form')->where('status_id = 3')->get()->num_rows();
        // $data['form'] = $this->db->get('form')->result();
        $data['lastorder'] = $this->db->from('form')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['received'] = $this->db->from('form')
            ->join('status', 'status.status_id = form.status_id')
            ->where('form.status_id = 1')
            ->order_by('form.form_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['progress'] = $this->db->from('form')->limit(4)
            ->join('status', 'status.status_id = form.status_id')
            ->where('form.status_id = 2')
            ->order_by('form.form_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['done'] = $this->db->from('form')->limit(4)
            ->join('status', 'status.status_id = form.status_id')
            ->where('form.status_id = 5')
            ->order_by('form.form_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['dev'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->order_by('development.development_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['devReceived'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->where('development.status_id = 1')
            ->order_by('development.development_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['devOnProgress'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->where('development.status_id = 2')
            ->order_by('development.development_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $data['devSuccess'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->where('development.status_id = 8')
            ->order_by('development.development_id', 'DESC')
            ->limit(5)
            ->get()
            ->result();
        $this->load->view('admin/index', $data);
    }
}
