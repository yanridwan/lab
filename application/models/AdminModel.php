<?php
class AdminModel extends CI_Model
{
    public function tambah_id($data)
    {
        $this->db->insert('form', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
    public function tambah_analisis($data)
    {
        $this->db->insert('analisis', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function tambah_development($data)
    {
        $this->db->insert('development', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function numrows($tabel)
    {
        $query = $this->db->select()
            ->from($tabel)
            ->get();
        return $query->num_rows();
    }

    public function tambah_revisi($data)
    {
        $this->db->insert('revisi', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function ubah_id($data)
    {
        $this->db->update('form', $data);
        $id = $this->db->update_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function getByIdForm($id)
    {
        $this->db->select('*');
        $this->db->from('form');
        $this->db->where('form_id', $id);  // Also mention table name here
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
    }

    public function getFormById($id)
    {
        return $this->db->get_where('form', array('form_id' => $id))->row();
    }

    public function getPermintaanById($id)
    {
        return $this->db->get_where('permintaan', array('form_id' => $id))->row();
    }

    public function getRevisiById($id)
    {
        return $this->db->get_where('revisi', array('form_id' => $id))->row();
    }

    public function getFormStatus($id)
    {
        $a = "SELECT * FROM form, status WHERE form.status_id = status.status_id AND form.form_id = '{$id}'";
        $data = $this->db->query($a);
        return $data->row();
    }

    public function getDevelopmentStatus($id)
    {
        $a = "SELECT * FROM development, status WHERE development.status_id = status.status_id AND development.development_id = '{$id}'";
        $data = $this->db->query($a);
        return $data->row();
    }

    public function getRevisiByFormId($id)
    {
        $hasil = $this->db->where('form_id', $id)->get('revisi');
        if ($hasil->num_rows() > 0) {
            return $hasil->result();
        } else {
            return false;
        }
    }

    // public function getKomposisiByFormId($id)
    // {
    //     $b = "SELECT * FROM detail_komposisi, barang, form WHERE detail_komposisi.form_id = form.form_id AND detail_komposisi.barang_id = barang.barang_id AND detail_komposisi.form_id = '{$id}'";
    //     $data = $this->db->query($b);
    //     return $data->row();
    // }

    public function getPermintaanStatusById($id)
    {
        $this->db->select('*');
        $this->db->from('permintaan, status');
        $this->db->where('permintaan.status_id = status.status_id');
        $this->db->where('permintaan.form_id', $id);
        return $this->db->get()->result();
    }

    public function getKomposisiByFormId($id)
    {
        $this->db->select('*');
        $this->db->from('detail_komposisi, form, barang');
        $this->db->where('detail_komposisi.form_id = form.form_id');
        $this->db->where('detail_komposisi.barang_id = barang.barang_id');
        $this->db->where('detail_komposisi.form_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
    }

    public function getRevisiKomposisiByRevisiId($id)
    {
        $this->db->select('*');
        $this->db->from('revisi_komposisi, revisi, barang');
        $this->db->where('revisi_komposisi.revisi_id = revisi.revisi_id');
        $this->db->where('revisi_komposisi.barang_id = barang.barang_id');
        $this->db->where('revisi_komposisi.revisi_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function revkomposisi($id)
    {
        $revisi =  $this->db->where('form_id', $id)->get('revisi')->result_array();
        foreach ($revisi as $key => $value) {
            $this->db->from('revisi_komposisi, barang');
            $this->db->where('revisi_komposisi.barang_id = barang.barang_id');
            $this->db->where('revisi_komposisi.revisi_id', $value['revisi_id']);
            $revkomposisi = $this->db->get()->result_array();

            $revisi[$key]['revisi_komposisi'] = $revkomposisi;
        }
        return $revisi;
    }

    public function analisisdokumen($id)
    {
        $analisis = $this->db->where('development_id', $id)->get('analisis')->result_array();
        foreach ($analisis as $key => $value) {
            $this->db->from('analisis_dokumen');
            $this->db->where('analisis_dokumen.analisis_id', $value['analisis_id']);
            $analisisdokumen = $this->db->get()->result_array();

            $analisis[$key]['analisis_dokumen'] = $analisisdokumen;
        }
        return $analisis;
    }

    public function formrevisi($id)
    {
        $this->db->select('*');
        $this->db->from('revisi, form, status');
        $this->db->where('revisi.form_id = form.form_id');
        $this->db->where('revisi.status_id = status.status_id');
        $this->db->where('revisi.form_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function formrevisipermintaan($id)
    {
        $this->db->select('*');
        $this->db->from('revisi, form, status');
        $this->db->where('revisi.form_id = form.form_id');
        $this->db->where('revisi.status_id = status.status_id');
        // $this->db->where('permintaan.form_id = form.form_id');
        $this->db->where('revisi.form_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function getDetailRevisiByFormId($id)
    {
        $this->db->from('form');
        $this->db->join('revisi_komposisi', 'revisi_komposisi.form_id = form.form_id', 'left');
        $this->db->join('revisi', 'revisi_komposisi.revisi_id = revisi.revisi_id', 'left');
        $this->db->join('barang', 'revisi_komposisi.barang_id = barang.barang_id', 'left');
        $this->db->where('form.form_id', $id);
        return $this->db->get()->result();
    }

    public function getDetailRevisiByFormId2($id)
    {
        $this->db->from('revisi_komposisi, form, revisi, barang');
        $this->db->where('revisi_komposisi.revisi_id = revisi.revisi_id');
        $this->db->where('revisi_komposisi.form_id = form.form_id');
        $this->db->where('revisi_komposisi.barang_id = barang.barang_id');
        $this->db->where('revisi_komposisi.form_id', $id);
        return $this->db->get()->result();
    }

    public function getDetailRevisiKomposisiByFormId($id)
    {
        $this->db->from('revisi, form, revisi, status');
        $this->db->where('revisi.form_id = form.form_id');
        $this->db->where('revisi.status_id = status.status_id');
        $this->db->where('revisi.form_id', $id);
        return $this->db->get()->result();
    }

    public function uploadGambar()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['file_name']            = $this->nama;
        $config['overwrite']            = true;
        $config['max_size']             = 10240; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    public function upload()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']    = '10240';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('gambar')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploaddokumen()
    {
        $config['upload_path'] = './assets/dokumen/';
        $config['allowed_types'] = 'jpg|png|jpeg|doc|docx|pdf';
        $config['max_size']    = '10240';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dokumen')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadrnd()
    {
        $config['upload_path'] = './assets/development/';
        $config['allowed_types'] = 'jpg|png|jpeg|doc|docx|pdf';
        $config['max_size']    = '10240';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dokumen')) {
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadrevisi()
    {
        $config['upload_path'] = './assets/dokumen/';
        $config['allowed_types'] = 'jpg|png|jpeg|doc|docx|pdf';
        $config['max_size']    = '10240';
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('dokumen')) {
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function getDevKomposisiByFormId($id)
    {
        $this->db->select('*');
        $this->db->from('development_komposisi, development, barang');
        $this->db->where('development_komposisi.development_id = development.development_id');
        $this->db->where('development_komposisi.barang_id = barang.barang_id');
        $this->db->where('development_komposisi.development_id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return $query->result();
    }
}
