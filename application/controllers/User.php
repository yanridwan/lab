<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') != '1') {
            redirect('login');
        }
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $data['user'] = $this->db->get('user')->result();
        $data['level'] = $this->db->get('level')->result();
        $data['userlevel'] = $this->db->from('user')
            ->join('level', 'level.level_id=user.level_id')
            ->get()
            ->result();
        $this->load->view('admin/user.php', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('gambar', 'Gambar');
        $this->form_validation->set_rules('nama', 'Nama User', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat User', 'required');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email User', 'required');
        $this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir', 'required');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level User', 'required');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->upload();

            $nama = $this->input->post('nama', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $no_telp = $this->input->post('no_telp', TRUE);
            $email = $this->input->post('email', TRUE);
            $ttl = $this->input->post('ttl', TRUE);
            $nip = $this->input->post('nip', TRUE);
            $password = $this->input->post('password', TRUE);
            $level = $this->input->post('level', TRUE);

            $data = array(
                'user_foto' => $upload['file']['file_name'],
                'user_nama' => $nama,
                'user_alamat' => $alamat,
                'user_no_telp' => $no_telp,
                'user_email' => $email,
                'user_tempat_tanggal_lahir' => $ttl,
                'user_nip' => $nip,
                'user_password' => $password,
                'level_id' => $level,
            );
            $this->db->insert('user', $data);

            redirect('user');
            // }
        } else {
            redirect('admin');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('gambar', 'Gambar');
        $this->form_validation->set_rules('userID', 'ID User', 'required');
        $this->form_validation->set_rules('nama', 'Nama User');
        $this->form_validation->set_rules('alamat', 'Alamat User');
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon');
        $this->form_validation->set_rules('email', 'Email User');
        $this->form_validation->set_rules('ttl', 'Tempat Tanggal Lahir');
        $this->form_validation->set_rules('nip', 'NIP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level User', 'required');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->upload();

            $id = $this->input->post('userID', TRUE);
            $nama = $this->input->post('nama', TRUE);
            $alamat = $this->input->post('alamat', TRUE);
            $no_telp = $this->input->post('no_telp', TRUE);
            $email = $this->input->post('email', TRUE);
            $ttl = $this->input->post('ttl', TRUE);
            $nip = $this->input->post('nip', TRUE);
            $password = $this->input->post('password', TRUE);
            $level = $this->input->post('level', TRUE);
            // $gambar = $this->AdminModel->uploadGambar();

            $where = array(
                'user_id' => $id
            );

            $data = array(
                'user_foto' => $upload['file']['file_name'],
                'user_nama' => $nama,
                'user_alamat' => $alamat,
                'user_no_telp' => $no_telp,
                'user_email' => $email,
                'user_tempat_tanggal_lahir' => $ttl,
                'user_nip' => $nip,
                'user_password' => $password,
                'level_id' => $level,
                // 'user_foto' => $gambar,
            );

            $this->db->where($where)->update('user', $data);

            redirect('user');
        } else {
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('user');
        } else {
            $this->db->where('user_id', $id);
            $this->db->delete('user');
            redirect('user');
        }
    }

    public function uploadGambar()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            = $this->nama;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }
}
