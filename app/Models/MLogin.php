<?php

namespace App\Models;

use CodeIgniter\Model;

class MLogin extends Model
{

    public $table = 'login';

    public function cek_login($user, $pass)
    {
        return $this->db->table('login')
            ->where(['username' => $user, 'password' => $pass])
            ->get()->getRowArray();
    }

    public function cek_login_sekertaris($user, $pass)
    {
        return $this->db->table('login')
            ->join('sekertaris', 'sekertaris.id_sekertaris = login.id_user')
            ->where(['username' => $user, 'password' => $pass])
            ->get()->getRowArray();
    }

    public function cek_login_masyarakat($user, $pass)
    {
        return $this->db->table('login')
            ->join('masyarakat', 'masyarakat.id_masyarakat = login.id_user')
            ->where(['username' => $user, 'password' => $pass])
            ->get()->getRowArray();
    }

    public function cek_login_lurah($user, $pass)
    {
        return $this->db->table('login')
            ->join('lurah', 'lurah.id_lurah = login.id_user')
            ->where(['username' => $user, 'password' => $pass])
            ->get()->getRowArray();
    }

    public function proses_tambah_data_pengguna($data)
    {
        return $this->db->table('masyarakat')->insert($data);
    }
    public function proses_tambah_data_login($data)
    {
        return $this->db->table('login')->insert($data);
    }

    public function checkUser($username)
    {
        return $this->db->table('login')
            ->select(['username', 'id_login', 'id_user'])
            ->where(['username' => $username])
            ->get()->getRowArray();
    }

    public function changePassword($id, $password)
    {
        $data = ['password' => $password];
        return $this->db->table('login')->where('id_login', $id)->update($data);
    }
}
