<?php

namespace App\Models;

use CodeIgniter\Model;

class ItmModel extends Model {
    protected $table    = 'item_transaksi_masuk';
    protected $primary  = 'id_itm';
    protected $primaryKey  = 'id_itm';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_itm', 'id_tm', 'id_barang'];

    // protected $skipValidation   = true;
}
