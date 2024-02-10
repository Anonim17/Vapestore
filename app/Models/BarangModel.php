<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model {
    protected $table    = 'barang';
    protected $primary  = 'id_barang';
    protected $primaryKey  = 'id_barang';

    protected $useAutoIncrement = true;

    protected $returnType   = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['id_barang', 'nama', 'gambar', 'satuan_barang', 'satuan_harga', 'keterangan'];

    // protected $skipValidation   = true;
}
