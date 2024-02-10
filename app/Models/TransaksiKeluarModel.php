<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiKeluarModel extends Model {
    protected $table    = 'transaksi_keluar';
    protected $primary  = 'id_tk';
    protected $primaryKey  = 'id_tk';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $useTimestamps = true;

    protected $allowedFields    = ['id_tk', 'total_bayar', 'status', 'created_at'];

    protected $createdField = 'created_at';

    // protected $skipValidation   = true;
}
