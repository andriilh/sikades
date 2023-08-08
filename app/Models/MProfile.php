<?php

namespace App\Models;

use CodeIgniter\Model;

class MProfile extends Model
{

    public function getTotalUser()
    {
        $query = $this->db->query("SELECT COUNT(id_login) AS total_user FROM login WHERE status_keaktifan='aktif'");
        return $query->getRowArray();
    }
}
