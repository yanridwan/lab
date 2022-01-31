<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Development extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('AdminModel');
    }
    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function cetak($id)
    {
        // $pdf = new FPDF('l', 'mm', 'A5');
        // // membuat halaman baru
        // $pdf->AddPage();
        // // setting jenis font yang akan digunakan
        // $pdf->SetFont('Arial', 'B', 16);
        // // mencetak string 
        // $pdf->Cell(190, 7, 'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA', 0, 1, 'C');
        // $pdf->SetFont('Arial', 'B', 12);
        // $pdf->Cell(190, 7, 'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK', 0, 1, 'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        // $pdf->Cell(10, 7, '', 0, 1);
        // $pdf->SetFont('Arial', 'B', 10);
        // $pdf->Cell(20, 6, 'NIM', 1, 0);
        // $pdf->Cell(85, 6, 'NAMA MAHASISWA', 1, 0);
        // $pdf->Cell(27, 6, 'NO HP', 1, 0);
        // $pdf->Cell(25, 6, 'TANGGAL LHR', 1, 1);
        // $pdf->SetFont('Arial', '', 10);
        // $pdf->Output();



        // ob_start();

        $title_page = 'Daftar Mahasiswa';

        $data['dev'] = $this->AdminModel->getDevelopmentStatus($id);
        $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['detail'] = array();
        foreach ($revisi as $key => $value) {
            $data['revisi'][$value->revisi_id][] = $value;
        }
        $data['komposisi'] = $this->AdminModel->getDevKomposisiByFormId($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $data['analisisDokumen'] = $this->AdminModel->analisisdokumen($id);
        $a = $this->load->view('admin/development/print', $data);
        $this->pdf->pdf_create($a, $title_page, 'A4', 'potrait'); //render atau membuat pdf dari html diatas
        //$this->pdf->pdf_create($HTML,$title_page,'A4','potrait',FALSE);//jika langsung didownload pdf-nya

        // $html = ob_get_contents();
        // ob_end_clean();
        // require './assets/html2pdf/autoload.php';
        // $pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Sample RnD.pdf', 'D');
    }

    public function research()
    {
        $data['dev'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->where('development.status_id = 2 or development.status_id = 8')
            ->order_by('development.development_id', 'DESC')
            ->get()
            ->result();
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('admin/development/research', $data);
    }

    public function rnd()
    {
        $data['dev'] = $this->db->from('development')
            ->join('status', 'status.status_id = development.status_id')
            ->order_by('development.development_id', 'DESC')
            ->get()
            ->result();
        $data['barang'] = $this->db->get('barang')->result();
        $this->load->view('admin/development/rnd', $data);
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function tambah()
    {
        // $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('jenisSample', 'Jenis Sample', 'required');
        $this->form_validation->set_rules('developer', 'Developer', 'required');
        $this->form_validation->set_rules('komposisi[]', 'Komposisi', 'required');
        $this->form_validation->set_rules('warna', 'Warna', 'required');
        $this->form_validation->set_rules('aroma', 'Aroma', 'required');
        $this->form_validation->set_rules('tekstur', 'Tekstur', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat', 'required');
        $this->form_validation->set_rules('gramasi', 'Gramasi', 'required');
        $this->form_validation->set_rules('metodologi', 'Metodologi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('dokumen', 'dokumen');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->uploadrnd();


            // $formTanggal = $this->input->post('formTanggal', TRUE);
            $jenisSample = $this->input->post('jenisSample', TRUE);
            $developer = $this->input->post('developer', TRUE);
            // $status = $this->input->post('status', TRUE);
            $komposisi = count($this->input->post('komposisi', TRUE));
            $warna = $this->input->post('warna', TRUE);
            $aroma = $this->input->post('aroma', TRUE);
            $tekstur = $this->input->post('tekstur', TRUE);
            $manfaat = $this->input->post('manfaat', TRUE);
            $gramasi = $this->input->post('gramasi', TRUE);
            $metodologi = $this->input->post('metodologi', TRUE);
            $keterangan = $this->input->post('keterangan', TRUE);

            $data = array(
                'development_dokumen' => $upload['file']['file_name'],

                'development_tanggal_masuk' => date('Y-m-d H:i:s'),
                'development_jenis_sample' => $jenisSample,
                'development_developer' => $developer,
                'development_warna' => $warna,
                'development_aroma' => $aroma,
                'development_tekstur' => $tekstur,
                'development_manfaat' => $manfaat,
                'development_metodologi' => $metodologi,
                'development_gramasi' => $gramasi,
                'development_keterangan' => $keterangan,
                'status_id' => 1,
            );

            $dev_id = $this->AdminModel->tambah_development($data);

            for ($i = 0; $i < $komposisi; $i++) {
                $w[$i] = array(
                    'development_id' => $dev_id,
                    'barang_id' => $this->input->post('komposisi[' . $i . ']')
                );

                $this->db->insert('development_komposisi', $w[$i]);
            }

            // $this->db->insert('form', $data);
            // $this->db->insert('development', $data);
            $this->session->set_flashdata('suc', 'Jenis Sample Berhasil Di Masukkan');
            redirect('development/rnd');
        } else {
            redirect('admin');
        }
    }



    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function detailrnd($id)
    {
        $data['dev'] = $this->AdminModel->getDevelopmentStatus($id);

        $revisi = $this->AdminModel->getDetailRevisiByFormId2($id);
        $data['detail'] = array();
        foreach ($revisi as $key => $value) {
            $data['revisi'][$value->revisi_id][] = $value;
        }

        $data['komposisi'] = $this->AdminModel->getDevKomposisiByFormId($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $data['analisisDokumen'] = $this->AdminModel->analisisdokumen($id);

        $this->load->view('admin/development/detail/rnd', $data);
    }

    public function detailresearch($id)
    {
        $data['dev'] = $this->AdminModel->getDevelopmentStatus($id);

        $data['komposisi'] = $this->AdminModel->getDevKomposisiByFormId($id);
        $data['gudang'] = $this->db->from('gudang')
            ->join('barang', 'barang.barang_id = gudang.barang_id')
            ->order_by('barang.barang_nama', 'ASC')
            ->order_by('barang.barang_kode', 'ASC')
            ->get()
            ->result();
        $data['analisis'] = $this->db->from('analisis')
            ->join('development', 'development.development_id = analisis.development_id')
            ->where('analisis.development_id =' . $id)
            ->get()
            ->result();

        $data['analisisDokumen'] = $this->AdminModel->analisisdokumen($id);
        // echo '<pre>';
        // print_r($data['analisisDokumen']);
        // echo '</pre>';
        // die;

        $this->load->view('admin/development/detail/research', $data);
    }

    public function proses()
    {
        $this->form_validation->set_rules('barangId[]', 'Nama Barang Keluar', 'required');
        $this->form_validation->set_rules('qty[]', 'Qty Barang Keluar', 'required');
        $this->form_validation->set_rules('satuan[]', 'Satuan Barang Keluar', 'required');
        $this->form_validation->set_rules('id', 'Id', 'required');

        if ($this->form_validation->run() == TRUE) {
            $barangId = count($this->input->post('barangId', TRUE));
            $satuan = $this->input->post('satuan', TRUE);
            // $formId = $this->input->post('formId', TRUE);
            $id = $this->input->post('id', TRUE);

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    'development_id' => $id,
                    'barang_id' => $this->input->post('barangId[' . $i . ']'),
                    'barang_keluar_qty' => $this->input->post('qty[' . $i . ']'),
                    'barang_keluar_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->insert('barang_keluar', $w[$i]);
            }

            $where = array(
                'development_id' => $id,
            );

            $data = array(
                'status_id' => 2,
            );

            for ($i = 0; $i < $barangId; $i++) {
                $w[$i] = array(
                    // 'development_komposisi_qty' => $this->input->post('qty[' . $i . ']'),
                    'development_komposisi_satuan' => $this->input->post('satuan[' . $i . ']')
                );

                $this->db->where($where)->update('development_komposisi', $w[$i]);
            }

            $this->db->where($where)->update('development', $data);

            redirect('development/detailrnd/' . $id);
        } else {
            redirect('admin');
        }
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////




    public function finish()
    {
        $this->form_validation->set_rules('id', 'ID Form', 'required');

        // $formId = $this->input->post('formId', TRUE);
        $id = $this->input->post('id', TRUE);

        $where = array(
            'development_id' => $id
        );

        $b = array(
            'status_id' => 8
        );

        $this->db->where($where)->update('development', $b);
        $this->session->set_flashdata('done', 'Permintaan Sample SELESAI');
        redirect('development/detailrnd/' . $id);
    }

    public function failed()
    {
        $this->form_validation->set_rules('id', 'ID Form', 'required');

        $id = $this->input->post('id', TRUE);

        $where = array(
            'development_id' => $id
        );

        $b = array(
            'status_id' => 9
        );

        $this->db->where($where)->update('development', $b);
        $this->session->set_flashdata('failed', 'Permintaan Sample GAGAL');
        redirect('development/detailrnd/' . $id);
    }

    public function hapus($id)
    {
        if ($id == "") {
            redirect('development/rnd');
        } else {
            $this->db->where('development_id', $id);
            $this->db->delete('development');
            $this->session->set_flashdata('del', 'Permintaan Sample Berhasil Di Hapus');
            redirect('development/rnd');
        }
    }



    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function tambahanalysis()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('tanggalmulai', 'tanggalmulai');
        $this->form_validation->set_rules('tanggalselesai', 'tanggalselesai');
        $this->form_validation->set_rules('analisa', 'analisa', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('research', 'research', 'required');
        $this->form_validation->set_rules('dokumen', 'dokumen');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->uploadrnd();


            $id = $this->input->post('id', TRUE);
            $tanggalmulai = $this->input->post('tanggalmulai', TRUE);
            $tanggalselesai = $this->input->post('tanggalselesai', TRUE);
            $analisa = $this->input->post('analisa', TRUE);
            $hasil = $this->input->post('hasil', TRUE);
            $research = $this->input->post('research', TRUE);

            $data = array(
                'development_id' => $id,
                'analisis_tanggal_mulai' => date('Y-m-d H:i:s', strtotime($tanggalmulai)),
                'analisis_tanggal_selesai' => $tanggalselesai,
                'analisis_analisa' => $analisa,
                'analisis_hasil' => $hasil,
                'analisis_research' => $research,
            );
            $inputanalisis = $this->AdminModel->tambah_analisis($data);

            $aa = array(
                'analisis_id' => $inputanalisis,
                'development_id' => $id,
                'analisis_dokumen_dokumen' => $upload['file']['file_name'],
            );

            // $this->db->insert('analisis', $data);
            $this->db->insert('analisis_dokumen', $aa);
            $this->session->set_flashdata('suc', 'Jenis Sample Berhasil Di Masukkan');
            redirect('development/detailresearch/' . $id);
        } else {
            redirect('admin');
        }
    }

    public function updateanalysis()
    {
        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('tanggalmulai', 'tanggalmulai');
        $this->form_validation->set_rules('tanggalselesai', 'tanggalselesai');
        $this->form_validation->set_rules('analisa', 'analisa', 'required');
        $this->form_validation->set_rules('hasil', 'hasil', 'required');
        $this->form_validation->set_rules('research', 'research', 'required');
        $this->form_validation->set_rules('devid', 'devid', 'required');
        // $this->form_validation->set_rules('dokumen', 'dokumen');

        if ($this->form_validation->run() == TRUE) {
            // if (null !== 'dokumen') {
            // }
            // $upload = $this->AdminModel->uploadrnd();

            $id = $this->input->post('id', TRUE);
            $tanggalmulai = $this->input->post('tanggalmulai', TRUE);
            $tanggalselesai = $this->input->post('tanggalselesai', TRUE);
            $analisa = $this->input->post('analisa', TRUE);
            $hasil = $this->input->post('hasil', TRUE);
            $research = $this->input->post('research', TRUE);
            $devid = $this->input->post('devid', TRUE);

            $data = array(
                'development_id' => $devid,
                'analisis_tanggal_mulai' => $tanggalmulai,
                'analisis_tanggal_selesai' => $tanggalselesai,
                'analisis_analisa' => $analisa,
                'analisis_hasil' => $hasil,
                'analisis_research' => $research,
                // 'analisis_dokumen' => $upload['file']['file_name'],
            );


            // if (null !== $upload) {
            //     $dok = array(
            //         'analisis_dokumen' => $upload['file']['fime_name'],
            //     );
            // }

            $a = array(
                'analisis_id' => $id,
            );

            $this->db->where($a)->update('analisis', $data);
            // $this->db->where($a)->update('analisis', $dok);
            $this->session->set_flashdata('suc', 'Jenis Sample Berhasil Di Masukkan');
            redirect('development/detailresearch/' . $devid);
        } else {
            redirect('admin');
        }
    }

    public function attach()
    {
        $this->form_validation->set_rules('id', 'analisis_id', 'required');
        $this->form_validation->set_rules('devid', 'development id', 'required');
        $this->form_validation->set_rules('dokumen', 'dokumen');

        if ($this->form_validation->run() == TRUE) {
            $upload = $this->AdminModel->uploadrnd();
            $id = $this->input->post('id', TRUE);
            $devid = $this->input->post('devid', TRUE);

            $data = array(
                'analisis_id' => $id,
                'development_id' => $devid,
                'analisis_dokumen_dokumen' => $upload['file']['file_name'],
            );

            $this->db->insert('analisis_dokumen', $data);
            redirect('development/detailresearch/' . $devid);
        } else {
            redirect('admin');
        }
    }
}
