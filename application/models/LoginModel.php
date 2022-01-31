<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model
{

    public function check_credential()
    {
        $username = set_value('username');
        $password = set_value('password');

        $hasil = $this->db->where('user_nip', $username)
            ->where('user_password', $password)
            ->limit(1)
            ->get('user');

        if ($hasil->num_rows() > 0) {
            return $hasil->row();
        } else {
            return array();
        }
    }
}
