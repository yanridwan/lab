<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') != '1') {
            // $this->session->set_flashdata('error', 'Sorry, you are not logged in!');
            if ($this->session->userdata('level_id') != '2') {
                redirect('login');
            }
        }
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $this->db->order_by('barang_nama', 'ASC');
        // $data['barang'] = $this->db->get('barang')->result();
        $data['barang'] = $this->db->from('barang')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_supplier', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $this->load->view('admin/barang', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('barangNama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('supplierNama', 'Supplier Barang', 'required');
        $this->form_validation->set_rules('barangKode', 'Kode Barang', 'required');

        if ($this->form_validation->run() == TRUE) {
            $barangNama = $this->input->post('barangNama', TRUE);
            $barangSupplier = $this->input->post('supplierNama', TRUE);
            $barangKode = $this->input->post('barangKode', TRUE);

            $sql = $this->db->query("SELECT * FROM barang WHERE barang_nama = '$barangNama' AND barang_supplier = '$barangSupplier'")->num_rows();
            if ($sql > 0) {
                // $notif = array(
                //     'status' => 'error',
                //     'msg' => 'Maaf Data Sudah Ada',
                // );
                // $this->session->set_flashdata('notif', $notif);
                $this->session->set_flashdata('dup', 'Maaf Data Sudah Ada');
                redirect('barang');
            } else {
                $data = array(
                    'barang_nama' => ucfirst($barangNama),
                    'barang_supplier' => ucfirst($barangSupplier),
                    'barang_kode' => $barangKode,
                );
                $this->db->insert('barang', $data);
                // $this->session->set_flashdata('message', 'Berhasil disimpan');
                // $notif = array(
                //     'status' => 'success',
                //     'msg' => 'Data Berhasil Ditambahkan',
                // );
                // $this->session->set_flashdata('notif', $notif);
                $this->session->set_flashdata('suc', 'Data Berhasil Ditambahkan');
                redirect('barang');
            }
        } else {
            redirect('admin');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('barangID', 'ID Barang', 'required');
        $this->form_validation->set_rules('barangNama', 'Nama Barang', 'required');
        $this->form_validation->set_rules('supplierNama', 'Supplier Barang', 'required');
        $this->form_validation->set_rules('barangKode', 'Kode Barang', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('barangID', TRUE);
            $barangNama = $this->input->post('barangNama', TRUE);
            $supplierNama = $this->input->post('supplierNama', TRUE);
            $barangKode = $this->input->post('barangKode', TRUE);

            $where = array(
                'barang_id' => $id
            );

            $data = array(
                'barang_nama' => $barangNama,
                'barang_supplier' => $supplierNama,
                'barang_kode' => $barangKode,
            );

            $this->db->where($where)->update('barang', $data);
            $this->session->set_flashdata('updt', 'Data Berhasil DiUpdate');

            redirect('barang');
        } else {
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('admin');
        } else {
            $this->db->where('barang_id', $id);
            $this->db->delete('barang');
            $this->session->set_flashdata('del', 'Data Berhasil DiDelete');
            redirect('barang');
        }
    }
}
