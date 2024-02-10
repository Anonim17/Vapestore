<?php

namespace App\Models;

use CodeIgniter\Model;

class ItkModel extends Model {
    protected $table    = 'item_transaksi_keluar';
    protected $primary  = 'id_itk';
    protected $primaryKey  = 'id_itk';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_itk', 'id_tk', 'id_pembeli', 'id_barang', 'jumlah'];

    // protected $skipValidation   = true;
}
