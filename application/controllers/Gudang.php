<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
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
    }

    public function index()
    {
        // $data['gudang'] = $this->db->get('gudang')->result();
        $data['barang'] = $this->db->from('barang')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        // $data['barang'] = $this->db->get('barang')->result();
        // $data['gudangbarang'] = $this->db->from('gudang')
        //     ->join('barang', 'barang.barang_id=gudang.barang_id')
        //     ->get()
        //     ->result();
        $data['gudangbarang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $this->load->view('admin/gudang', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('barangID', 'Nama Barang', 'required');
        $this->form_validation->set_rules('gudangQty', 'Qty Gudang', 'required');
        $this->form_validation->set_rules('gudangSatuan', 'Satuan Gudang', 'required');
        // $this->form_validation->set_rules('gudangTanggal', 'Gudang Tanggal', 'required');

        if ($this->form_validation->run() == TRUE) {
            $barangID = $this->input->post('barangID', TRUE);
            $gudangQty = $this->input->post('gudangQty', TRUE);
            $gudangSatuan = $this->input->post('gudangSatuan', TRUE);
            // $gudangTanggal = $this->input->post('gudangTanggal', TRUE);

            $sql = $this->db->query("SELECT barang_id FROM gudang WHERE barang_id = '$barangID'")->num_rows();
            if ($sql > 0) {
                $data = array(
                    'barang_id' => $barangID,
                    'barang_masuk_qty' => $gudangQty,
                    'barang_masuk_satuan' => $gudangSatuan,
                    // 'barang_masuk_tanggal' => $gudangTanggal,
                );
                $this->db->insert('barang_masuk', $data);
                $this->session->set_flashdata('suc', 'Data Berhasil Di Tambahkan');
                redirect('gudang');
            } else {
                $a = array(
                    'barang_id' => $barangID,
                    'barang_masuk_qty' => $gudangQty,
                    'barang_masuk_satuan' => $gudangSatuan,
                    // 'barang_masuk_tanggal' => $gudangTanggal,
                );
                $b = array(
                    'barang_id' => $barangID,
                    'gudang_qty' => $gudangQty,
                    'gudang_satuan' => $gudangSatuan,
                );
                $this->db->insert('barang_masuk', $a);
                $this->db->insert('gudang', $b);
                $this->session->set_flashdata('del', 'Data Berhasil Di Masukkan');
                redirect('gudang');
            }
        } else {
            redirect('admin');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('gudangID', 'ID Gudang', 'required');
        $this->form_validation->set_rules('barangID', 'ID Barang', 'required');
        $this->form_validation->set_rules('gudangQty', 'Qty Gudang', 'required');
        $this->form_validation->set_rules('gudangSatuan', 'Satuan Gudang', 'required');

        if ($this->form_validation->run() == TRUE) {
            $gudangID = $this->input->post('gudangID', TRUE);
            $barangID = $this->input->post('barangID', TRUE);
            $gudangQty = $this->input->post('gudangQty', TRUE);
            $gudangSatuan = $this->input->post('gudangSatuan', TRUE);

            $where = array(
                'gudang_id' => $gudangID
            );

            $data = array(
                'barang_id' => $barangID,
                'gudang_qty' => $gudangQty,
                'gudang_satuan' => $gudangSatuan,
            );

            $this->db->where($where)->update('gudang', $data);
            $this->session->set_flashdata('updt', 'Data Berhasil Di Update');

            redirect('gudang');
        } else {
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('admin');
        } else {
            $this->db->where('gudang_id', $id);
            $this->db->delete('gudang');
            $this->session->set_flashdata('del', 'Data Berhasil Di Hapus');
            redirect('gudang');
        }
    }
}
