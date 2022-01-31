<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermintaanSample extends CI_Controller
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
    }

    public function index()
    {
        $data['formpermintaan'] = $this->db->from('form')
            ->join('permintaan', 'permintaan.form_id=form.form_id')
            // ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->get()
            ->result();
        $data['permintaan'] = $this->db->get('permintaan')->result();
        $data['revisi'] = $this->db->get('revisi')->result();
        $data['formrevisi'] = $this->db->from('form')
            ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->get()
            ->result();
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('admin/permintaan_sample', $data);
    }

    public function tambah()
    {
        // $this->form_validation->set_rules('formTanggal', 'Tanggal Form', 'required');
        $this->form_validation->set_rules('formNamaCustomer', 'Nama Form', 'required');
        $this->form_validation->set_rules('formPermintaanSample', 'Permintaan Sample Form', 'required');
        $this->form_validation->set_rules('formPenanggungJawab', 'Penanggung Jawab Form', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi Form', 'required');
        $this->form_validation->set_rules('warna', 'Warna Form', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma Form', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur Form', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Form', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi Form', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Form', 'required');

        if ($this->form_validation->run() == TRUE) {
            // $formTanggal = $this->input->post('formTanggal', TRUE);
            $formNamaCustomer = $this->input->post('formNamaCustomer', TRUE);
            $formPermintaanSample = $this->input->post('formPermintaanSample', TRUE);
            $formPenanggungJawab = $this->input->post('formPenanggungJawab', TRUE);
            // $status = $this->input->post('status', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            $data = array(
                // 'form_tanggal' => $formTanggal,
                'form_tanggal' => date('Y-m-d H:i:s'),
                'form_nama_customer' => $formNamaCustomer,
                'form_permintaan_sample' => $formPermintaanSample,
                'form_penanggung_jawab' => $formPenanggungJawab,
                'status_id' => 1,
            );

            $form_id = $this->AdminModel->tambah_id($data);

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'form_id' => $form_id,
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->insert('detail_komposisi', $w[$i]);
            }
            // $this->db->insert('detail_komposisi', $c);

            $b = array(
                'form_id' => $form_id,
                // 'permintaan_komposisi' => $komposisi,
                'permintaan_tanggal_masuk' => date('Y-m-d H:i:s'),
                'permintaan_warna' => $warna,
                'permintaan_aroma' => $aroma,
                'permintaan_tekstur' => $tekstur,
                'permintaan_manfaat' => $manfaat,
                'permintaan_gramasi' => $gramasi,
                'permintaan_keterangan' => $keterangan,
                'status_id' => 1
            );
            // $this->db->insert('form', $data);
            $this->db->insert('permintaan', $b);
            $this->session->set_flashdata('suc', 'Permintaan Sample Berhasil Di Masukkan');
            redirect('permintaansample');
        } else {
            redirect('admin');
        }
    }

    public function ubah()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('formNamaCustomer', 'Nama Form', 'required');
        $this->form_validation->set_rules('formPermintaanSample', 'Permintaan Sample Form', 'required');
        $this->form_validation->set_rules('formPenanggungJawab', 'Penanggung Jawab Form', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi Form', 'required');
        $this->form_validation->set_rules('warna', 'Warna Form', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma Form', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur Form', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Form', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi Form', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Form', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id', TRUE);
            $formNamaCustomer = $this->input->post('formNamaCustomer', TRUE);
            $formPermintaanSample = $this->input->post('formPermintaanSample', TRUE);
            $formPenanggungJawab = $this->input->post('formPenanggungJawab', TRUE);
            // $status = $this->input->post('status', TRUE);
            // $komposisi = $this->input->post('komposisi', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);


            $where = array(
                'form_id' => $id
            );

            $data = array(
                'form_nama_customer' => $formNamaCustomer,
                'form_permintaan_sample' => $formPermintaanSample,
                'form_penanggung_jawab' => $formPenanggungJawab,
                'status_id' => 1,
            );

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->where($where)->update('detail_komposisi', $w[$i]);
            }

            // $form_id = $this->AdminModel->ubah_id($data, $where);
            $this->db->where($where)->update('form', $data);

            $b = array(
                // 'form_id' => $form_id,
                // 'permintaan_komposisi' => $komposisi,
                'permintaan_warna' => $warna,
                'permintaan_aroma' => $aroma,
                'permintaan_tekstur' => $tekstur,
                'permintaan_manfaat' => $manfaat,
                'permintaan_gramasi' => $gramasi,
                'permintaan_keterangan' => $keterangan,
            );

            // $this->AdminModel->update('form', $data, $where);
            $this->db->where($where)->update('permintaan', $b);
            $this->session->set_flashdata('updt', 'Permintaan Sample Berhasil Di Update');

            redirect('permintaansample');
        } else {
            $this->load->view('admin');
        }
    }

    public function revisi()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi Revisi', 'required');
        $this->form_validation->set_rules('warna', 'Warna Revisi', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma Revisi', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur Revisi', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Revisi', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi Revisi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Revisi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id', TRUE);
            // $komposisi = $this->input->post('komposisi', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            // $ukuran = $this->input->post('ukuran', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            $b = array(
                'form_id' => $id,
                'revisi_tanggal_masuk' => date('Y-m-d H:i:s'),
                'revisi_warna' => $warna,
                'revisi_aroma' => $aroma,
                'revisi_tekstur' => $tekstur,
                'revisi_manfaat' => $manfaat,
                'revisi_gramasi' => $gramasi,
                'revisi_keterangan' => $keterangan,
                'status_id' => 1
            );

            $revisi_id = $this->AdminModel->tambah_revisi($b);

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'revisi_id' => $revisi_id,
                    'form_id' => $id,
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->insert('revisi_komposisi', $w[$i]);
            }

            $where = array(
                'form_id' => $id,
            );
            $form = array(
                'status_id' => 6
            );
            $this->db->where($where)->update('form', $form);
            $this->session->set_flashdata('rev', 'Permintaan Sample Berhasil Di Revisi');
            // $this->db->insert('form', $data);
            // $this->db->insert('revisi', $b);
            redirect('permintaansample');
        } else {
            redirect('admin');
        }
    }

    public function finish()
    {
        // $this->form_validation->set_rules('formId', 'Id Revsi', 'required');
        $this->form_validation->set_rules('id', 'ID Form', 'required');
        $this->form_validation->set_rules('hasil_akhir', 'Hasil Akhir', 'required');

        // $formId = $this->input->post('formId', TRUE);
        $id = $this->input->post('id', TRUE);
        $hasilAkhir = $this->input->post('hasil_akhir', TRUE);

        $where = array(
            'form_id' => $id
        );

        $b = array(
            'form_hasil_akhir' => $hasilAkhir,
            'status_id' => 5
        );

        $this->db->where($where)->update('form', $b);
        $this->session->set_flashdata('done', 'Permintaan Sample Selesai');
        redirect('permintaansample/sample');
    }

    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    public function marketing()
    {
        $data['form'] = $this->AdminModel->numrows('form');
        $data['formpermintaan'] = $this->db->from('form')
            ->join('permintaan', 'permintaan.form_id=form.form_id')
            // ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->get()
            ->result();
        $data['permintaan'] = $this->db->get('permintaan')->result();
        $data['revisi'] = $this->db->get('revisi')->result();
        $data['formrevisi'] = $this->db->from('form')
            ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->get()
            ->result();
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('admin/permintaansample/marketing', $data);
    }

    public function sample()
    {
        $data['formrevisi'] = $this->db->from('form')
            ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->limit(1)
            ->get()
            ->result();
        $data['formpermintaan'] = $this->db->from('form')
            ->join('permintaan', 'permintaan.form_id=form.form_id')
            // ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->get()
            ->result();
        $data['permintaan'] = $this->db->get('permintaan')->result();
        $data['revisi'] = $this->db->get('revisi')->result();
        $data['formrevisi'] = $this->db->from('form')
            ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->get()
            ->result();
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('admin/permintaansample/sample', $data);
    }

    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////

    public function marketingtambah()
    {
        $this->form_validation->set_rules('formNamaCustomer', 'Nama Form', 'required');
        $this->form_validation->set_rules('formPermintaanSample', 'Permintaan Sample Form', 'required');
        $this->form_validation->set_rules('formMarketing', 'Penanggung Marketing', 'required');
        $this->form_validation->set_rules('warna', 'Warna Form', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma Form', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur Form', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Form', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi Form', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Form', 'required');

        if ($this->form_validation->run() == TRUE) {
            $formNamaCustomer = $this->input->post('formNamaCustomer', TRUE);
            $formPermintaanSample = $this->input->post('formPermintaanSample', TRUE);
            $formMarketing = $this->input->post('formMarketing', TRUE);
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            $data = array(
                'form_tanggal' => date('Y-m-d H:i:s'),
                'form_nama_customer' => $formNamaCustomer,
                'form_permintaan_sample' => $formPermintaanSample,
                'form_marketing' => $formMarketing,
                'status_id' => 1,
            );

            $form_id = $this->AdminModel->tambah_id($data);

            $b = array(
                'form_id' => $form_id,
                'permintaan_tanggal_masuk' => date('Y-m-d H:i:s'),
                'permintaan_warna' => $warna,
                'permintaan_aroma' => $aroma,
                'permintaan_tekstur' => $tekstur,
                'permintaan_manfaat' => $manfaat,
                'permintaan_gramasi' => $gramasi,
                'permintaan_keterangan' => $keterangan,
                'status_id' => 1
            );
            // $this->db->insert('form', $data);
            $this->db->insert('permintaan', $b);
            $this->session->set_flashdata('suc', 'Permintaan Sample Berhasil Di Masukkan');
            redirect('permintaansample/marketing');
        } else {
            redirect('admin');
        }
    }

    public function marketingrevisi()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('warna', 'Warna Revisi', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma Revisi', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur Revisi', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Revisi', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi Revisi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan Revisi', 'required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id', TRUE);
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            $b = array(
                'form_id' => $id,
                'revisi_tanggal_masuk' => date('Y-m-d H:i:s'),
                'revisi_warna' => $warna,
                'revisi_aroma' => $aroma,
                'revisi_tekstur' => $tekstur,
                'revisi_manfaat' => $manfaat,
                'revisi_gramasi' => $gramasi,
                'revisi_keterangan' => $keterangan,
                'status_id' => 1
            );

            // $revisi_id = $this->AdminModel->tambah_revisi($b);

            $where = array(
                'form_id' => $id,
            );
            $status = array(
                'status_id' => 6
            );

            $this->db->insert('revisi', $b);
            $this->db->where($where)->update('form', $status);
            $this->session->set_flashdata('rev', 'Permintaan Sample Berhasil Di Revisi');
            redirect('permintaansample/marketing');
        } else {
            redirect('admin');
        }
    }


    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////



    public function tambahsample()
    {
        $this->form_validation->set_rules('formPenanggungJawab', 'Form Penanggung Jawab', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi', 'required');
        $this->form_validation->set_rules('metodologi', 'Metodologi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan');
        $this->form_validation->set_rules('Fid', 'id', 'required');
        $this->form_validation->set_rules('Pid', 'id', 'required');
        $this->form_validation->set_rules('dokumen', 'Dokumen');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->uploaddokumen();


            $formId = $this->input->post('Fid', TRUE);
            $permintaanId = $this->input->post('Pid', TRUE);
            $formPenanggungJawab = $this->input->post('formPenanggungJawab', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $metodologi = $this->input->post('metodologi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'form_id' => $formId,
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->insert('detail_komposisi', $w[$i]);
            }

            $b = array(
                'permintaan_dokumen' => $upload['file']['file_name'],
                'permintaan_metodologi' => $metodologi,
                'permintaan_penanggung_jawab' => $formPenanggungJawab,
                'permintaan_keterangan' => $keterangan,
                'status_id' => 1
            );

            $where = array(
                'permintaan_id' => $permintaanId,
            );

            $stat = array(
                'status_id' => 2
            );

            $statform = array(
                'form_id' => $formId,
            );

            $this->db->where($where)->update('permintaan', $b);
            $this->db->where($statform)->update('form', $stat);
            $this->session->set_flashdata('suc', 'Permintaan Sample Berhasil Di Masukkan');
            // redirect('permintaansample/sample');
            redirect('detail/sample/' . $formId);
        } else {
            redirect('admin');
        }
    }
}
