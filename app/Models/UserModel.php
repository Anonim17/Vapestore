<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table    = 'user';
    protected $primary  = 'id_user';
    protected $primaryKey  = 'id_user';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_user', 'username', 'password', 'nama_lengkap', 'email', 'alamat', 'jenis_kelamin', 'no_hp', 'level'];

    // protected $skipValidation   = true;

    public function get_data($username, $password)
    {
        return $this->db->table('user')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
}
