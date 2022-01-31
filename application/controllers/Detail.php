<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level_id') == '1') {
            if ($this->session->userdata('level_id') == '2') {
                if ($this->session->userdata('level_id') == '3') {
                    redirect('login');
                }
            }
        }
        $this->load->model('AdminModel');
    }

    public function cetak($id)
    {
        // ob_start();

        $data['form'] = $this->AdminModel->getFormById($id);
        $data['permintaan'] = $this->AdminModel->getPermintaanById($id);

        $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['revisi'] = array();
        foreach ($revisi as $value) {
            $data['revisi'][$value->revisi_id][] = $value;
        }

        $data['rev'] = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['komposisi'] = $this->AdminModel->getKomposisiByFormId($id);
        $data['revisikomposisi'] = $this->AdminModel->getRevisiKomposisiByRevisiId($id);
        $data['formstatus'] = $this->AdminModel->getFormStatus($id);
        $this->load->view('admin/print', $data);

        // $html = ob_get_contents();
        // ob_end_clean();

        // require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Sample.pdf', 'D');
    }

    public function halamandetail($id)
    {
        $data['form'] = $this->AdminModel->getFormById($id);
        $data['permintaan'] = $this->AdminModel->getPermintaanById($id);
        $data['permintaanstatus'] = $this->AdminModel->getPermintaanStatusById($id);

        // var_dump($data['permintaanstatus']);
        // die;

        $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['revisi'] = array();
        foreach ($revisi as $key => $value) {
            $data['revisi'][$value->revisi_id][] = $value;
        }


        $data['komposisi'] = $this->AdminModel->getKomposisiByFormId($id);
        $data['revisikomposisi'] = $this->AdminModel->getRevisiKomposisiByRevisiId($id);
        $data['formstatus'] = $this->AdminModel->getFormStatus($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $this->load->view('admin/detail', $data);
    }

    public function pengiriman()
    {
        $this->form_validation->set_rules('id', 'Nama Barang Keluar', 'required');

        $id = $this->input->post('id', TRUE);

        $where = array(
            'form_id' => $id
        );

        $b = array(
            'status_id' => 4
        );

        $data = array(
            'form_id' => $id,
        );

        $this->db->where($where)->update('form', $b);
        $this->db->where($where)->update('permintaan', $b);
        $this->db->insert('pengiriman', $data);
        redirect('detail/marketing/' . $id);
    }

    public function revisipengiriman()
    {
        $this->form_validation->set_rules('id', 'Id Revsi', 'required');

        $id = $this->input->post('id', TRUE);
        $formId = $this->input->post('formId', TRUE);

        $where = array(
            'revisi_id' => $id
        );

        $b = array(
            'status_id' => 4
        );

        $data = array(
            'form_id' => $formId,
            'revisi_id' => $id,
        );

        $form = array(
            'form_id' => $formId,
        );

        $this->db->where($form)->update('form', $b);
        $this->db->where($where)->update('revisi', $b);
        $this->db->insert('pengiriman', $data);
        redirect('detail/marketing/' . $formId);
    }

    public function revisiproses()
    {
        $this->form_validation->set_rules('barangId[]', 'Nama Barang Keluar', 'required');
        $this->form_validation->set_rules('qty[]', 'Qty Barang Keluar', 'required');
        $this->form_validation->set_rules('satuan[]', 'Satuan Barang Keluar', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('formId', 'Form ID', 'required');

        if ($this->form_validation->run() == TRUE) {
            $barangId = count($this->input->post('barangId', TRUE));
            $formId = $this->input->post('formId', TRUE);
            $Id = $this->input->post('id', TRUE);

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    'form_id' => $formId,
                    'revisi_id' => $Id,
                    'barang_id' => $this->input->post('barangId[' . $i . ']'),
                    'barang_keluar_qty' => $this->input->post('qty[' . $i . ']'),
                    'barang_keluar_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->insert('barang_keluar', $w[$i]);
            }

            $where = array(
                'revisi_id' => $Id
            );

            $data = array(
                'status_id' => 2,
            );

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    'revisi_komposisi_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->where($where)->update('revisi_komposisi', $w[$i]);
            }

            $this->db->where($where)->update('revisi', $data);

            redirect('permintaansample/sample');
        } else {
            redirect('admin');
        }
    }

    public function proses()
    {
        $this->form_validation->set_rules('barangId[]', 'Nama Barang Keluar', 'required');
        $this->form_validation->set_rules('qty[]', 'Qty Barang Keluar', 'required');
        $this->form_validation->set_rules('satuan[]', 'Satuan Barang Keluar', 'required');
        $this->form_validation->set_rules('formId', 'Form ID', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');

        if ($this->form_validation->run() == TRUE) {
            $barangId = count($this->input->post('barangId', TRUE));
            $satuan = $this->input->post('satuan', TRUE);
            $formId = $this->input->post('formId', TRUE);
            $Id = $this->input->post('id', TRUE);

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    'form_id' => $formId,
                    'barang_id' => $this->input->post('barangId[' . $i . ']'),
                    'barang_keluar_qty' => $this->input->post('qty[' . $i . ']'),
                    'barang_keluar_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->insert('barang_keluar', $w[$i]);
            }

            $where = array(
                'form_id' => $Id
            );

            $data = array(
                'status_id' => 2,
            );

            $b = array(
                'status_id' => 2,
            );

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    'detail_komposisi_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->where($where)->update('detail_komposisi', $w[$i]);
            }

            $this->db->where($where)->update('permintaan', $data);
            $this->db->where($where)->update('form', $b);

            redirect('permintaansample/sample');
        } else {
            redirect('admin');
        }
    }

    public function finish()
    {
        $this->form_validation->set_rules('permintaanId', 'Id', 'required');

        if ($this->form_validation->run() == TRUE) {
            $permintaanId = $this->input->post('permintaanId', TRUE);
            $id = $this->input->post('id', TRUE);

            $where = array(
                // 'permintaan_tanggal_jadi' => date('Y-m-d h:m:s'),
                'permintaan_id' => $permintaanId
            );

            $a = array(
                'form_id' => $id,
            );

            $data = array(
                'status_id' => 3,
            );

            $this->db->where($a)->update('form', $data);
            $this->db->where($where)->update('permintaan', $data);

            redirect('permintaansample/sample');
        } else {
            redirect('admin');
        }
    }

    public function finishrevisi()
    {
        $this->form_validation->set_rules('revisiId', 'Id', 'required');

        if ($this->form_validation->run() == TRUE) {
            $revisiId = $this->input->post('revisiId', TRUE);
            $id = $this->input->post('id', TRUE);

            $where = array(
                // 'permintaan_tanggal_jadi' => date('Y-m-d h:m:s'),
                'revisi_id' => $revisiId
            );

            $a = array(
                'form_id' => $id,
            );

            $data = array(
                'status_id' => 3,
            );

            $this->db->where($a)->update('form', $data);
            $this->db->where($where)->update('revisi', $data);

            redirect('permintaansample/sample');
        } else {
            redirect('admin');
        }
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('admin');
        } else {
            $this->db->where('form_id', $id);
            $this->db->delete('form');
            $this->session->set_flashdata('del', 'Permintaan Sample Berhasil Di Hapus');
            redirect('permintaansample');
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function marketing($id)
    {
        $data['form'] = $this->AdminModel->getFormById($id);
        $data['permintaan'] = $this->AdminModel->getPermintaanById($id);
        $data['permintaanstatus'] = $this->AdminModel->getPermintaanStatusById($id);

        // var_dump($data['permintaanstatus']);
        // die;

        $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['revisi'] = array();
        foreach ($revisi as $key => $value) {
            $data['revisi'][$value->revisi_id][] = $value;
        }

        $data['komposisi'] = $this->AdminModel->getKomposisiByFormId($id);
        $data['revisikomposisi'] = $this->AdminModel->formrevisi($id);
        $data['formstatus'] = $this->AdminModel->getFormStatus($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $this->load->view('admin/detail/marketing', $data);
    }

    public function sample($id)
    {
        $data['form'] = $this->AdminModel->getFormById($id);
        $data['permintaan'] = $this->AdminModel->getPermintaanById($id);
        $data['permintaanstatus'] = $this->AdminModel->getPermintaanStatusById($id);


        // var_dump($data['permintaanstatus']);
        // die;

        $data['formpermintaan'] = $this->db->from('form')
            ->join('permintaan', 'permintaan.form_id=form.form_id')
            // ->join('revisi', 'revisi.form_id = form.form_id')
            ->join('status', 'status.status_id = form.status_id')
            ->order_by('form.form_id', 'DESC')
            ->get()
            ->result();

        $data['barang'] = $this->db->get('barang')->result();

        // $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        // $data['revisi'] = array();
        // foreach ($revisi as $key => $value) {
        //     $data['revisi'][$value->revisi_id][] = $value;
        // }

        $data['myrevisi'] = $this->AdminModel->revkomposisi($id);
        // echo '<pre>';
        // print_r($data['myrevisi']);
        // echo '</pre>';
        // die;

        $data['formrevisi'] = $this->AdminModel->formrevisipermintaan($id);

        $data['komposisi'] = $this->AdminModel->getKomposisiByFormId($id);
        $data['revisikomposisi'] = $this->AdminModel->getDetailRevisiByFormId2($id);

        $data['formstatus'] = $this->AdminModel->getFormStatus($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $this->load->view('admin/detail/sample', $data);
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function revisisample()
    {
        $this->form_validation->set_rules('formPenanggungJawab', 'Form Penanggung Jawab', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi', 'required');
        $this->form_validation->set_rules('metodologi', 'Metodologi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan');
        $this->form_validation->set_rules('Fid', 'id', 'required');
        $this->form_validation->set_rules('Rid', 'id', 'required');
        $this->form_validation->set_rules('dokumen', 'dokumen');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->uploaddokumen();

            $formId = $this->input->post('Fid', TRUE);
            $revisiId = $this->input->post('Rid', TRUE);
            $formPenanggungJawab = $this->input->post('formPenanggungJawab', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $metodologi = $this->input->post('metodologi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'form_id' => $formId,
                    'revisi_id' => $revisiId,
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->insert('revisi_komposisi', $w[$i]);
            }

            $b = array(
                'revisi_dokumen' => $upload['file']['file_name'],
                'revisi_metodologi' => $metodologi,
                'revisi_penanggung_jawab' => $formPenanggungJawab,
                'revisi_keterangan' => $keterangan,
                'status_id' => 1
            );

            $where = array(
                'revisi_id' => $revisiId,
            );

            $stat = array(
                'status_id' => 2
            );

            $statform = array(
                'form_id' => $formId,
            );

            $this->db->where($where)->update('revisi', $b);
            $this->db->where($statform)->update('form', $stat);
            $this->session->set_flashdata('suc', 'Permintaan Sample Berhasil Di Masukkan');
            redirect('detail/sample/' . $formId);
        } else {
            redirect('admin');
        }
    }
}
