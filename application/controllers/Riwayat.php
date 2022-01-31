<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') != '1') {
            if ($this->session->userdata('level_id') != '2') {
                if ($this->session->userdata('level_id') != '3') {
                    redirect('login');
                }
            }
        }
        $this->load->model('AdminModel');
    }

    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function barangmasuk()
    {
        $data['barang'] = $this->db->from('barang_masuk')
            ->join('barang', 'barang.barang_id=barang_masuk.barang_id')
            ->get()
            ->result();
        $data['barangMasuk'] = $this->db->get('barang_masuk')->result();
        $this->load->view('admin/riwayat/barang_masuk', $data);
    }

    public function barangkeluar()
    {
        $data['barang'] = $this->db->from('barang_keluar')
            ->join('barang', 'barang.barang_id=barang_keluar.barang_id')
            ->get()
            ->result();
        $data['barangMasuk'] = $this->db->get('barang_masuk')->result();
        $this->load->view('admin/riwayat/barang_keluar', $data);
    }

    public function pengiriman()
    {
        $data['pengirimanform'] = $this->db->from('pengiriman')
            ->join('form', 'form.form_id = pengiriman.form_id')
            ->order_by('pengiriman.pengiriman_id', 'DESC')
            ->get()
            ->result();
        $data['form'] = $this->db->get('form')->result();
        $this->load->view('admin/riwayat/pengiriman', $data);
    }

    public function tambahresi()
    {
        $this->form_validation->set_rules('pengirimanId', 'ID Barang', 'required');
        $this->form_validation->set_rules('resi', 'Kode Barang', 'required');

        if ($this->form_validation->run() == TRUE) {
            $pengirimanId = $this->input->post('pengirimanId', TRUE);
            $resi = $this->input->post('resi', TRUE);

            $where = array(
                'pengiriman_id' => $pengirimanId
            );

            $data = array(
                'pengiriman_resi' => $resi,
            );

            $this->db->where($where)->update('pengiriman', $data);

            redirect('riwayat/pengiriman');
        } else {
            redirect('admin');
        }
    }
}
