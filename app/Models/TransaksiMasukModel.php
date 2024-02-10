<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukModel extends Model {
    protected $table    = 'transaksi_masuk';
    protected $primary  = 'id_tm';
    protected $primaryKey  = 'id_tm';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $useTimestamps = true;

    protected $allowedFields    = ['id_tm', 'supplier', 'jumlah', 'total_harga_beli', 'created_at'];

    protected $createdField = 'created_at';

    // protected $skipValidation   = true;
}
