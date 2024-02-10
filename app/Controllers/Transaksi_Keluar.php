<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiKeluarModel;
use App\Models\UserModel;
use App\Models\ItkModel;
use Config\Encryption;
use CodeIgniter\Model;

class Transaksi_Keluar extends BaseController
{
    public function tambah_barang()
    {
        $itk_model = new ItkModel();

        $data = [
            'id_pembeli' => $this->request->getPost('id_pembeli'),
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        if ($itk_model->insert($data, false)) {
            session()->setFlashdata('notif', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/dashboard'));
        } else {
            session()->setFlashdata('notif', 'Data Gagal Ditambahkan!');
            return redirect()->to(base_url('/dashboard'));
        }
    }

    public function checkout()
    {
        $db = \Config\Database::connect(); // Ambil koneksi database

        // Jalankan perintah SELECT SQL
        $itk_model = $db->query('SELECT * FROM item_transaksi_keluar, barang WHERE id_tk IS NULL AND item_transaksi_keluar.id_barang = barang.id_barang');

        // Ambil hasil data dalam bentuk array
        $itk_model = $itk_model->getResultArray();

        return view('pembayaran/checkout', ['data' => $itk_model]);
    }

    public function delete_barang($id)
    {
        $itk_model = new ItkModel();

        $itk_model->delete($id);

        session()->setFlashdata('notif', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('pembayaran/checkout'));
    }

    public function status()
    {
        $db = \Config\Database::connect(); // Menghubungkan ke database

        $datatk = [
            'status' => $_GET['status'],
        ];

        $db->table('transaksi_keluar')->where('id_tk', $_GET['id_tk'])->update($datatk);

        session()->setFlashdata('notif', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('penjualan/index'));
    }

    public function bayar()
    {

        $data = [
            'total_bayar' => $_GET['total_harga'],
            'status' => 'menunggu',
        ];
        $db = \Config\Database::connect(); // Menghubungkan ke database
        $db->table('transaksi_keluar')->insert($data);

        // Mendapatkan nilai autoincrement (ID) dari data yang baru saja ditambahkan
        $id_tk = $db->insertID();
        $id_itk = $_GET['id_itk'];
        foreach ($id_itk as $index => $value) {
            // echo "ID ITK[" . $index . "]: " . $value . "<br>";
            $dataitk = [
                'id_tk' => $id_tk,
            ];
            $db->table('item_transaksi_keluar')->where('id_itk', $value)->update($dataitk);
        }

        return redirect()->to(base_url('/pembayaran/index'));


        // if ($itk_model->insert($data, false)) {
        //     session()->setFlashdata('notif', 'Data Berhasil Ditambahkan!');
        //     return redirect()->to(base_url('/pembayaran/index'));
        // } else {
        //     session()->setFlashdata('notif', 'Data Gagal Ditambahkan!');
        //     return redirect()->to(base_url('/pembayaran/index'));
        // }
    }
}
