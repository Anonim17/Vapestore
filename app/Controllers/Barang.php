<?php

namespace App\Controllers;

use App\Models\BarangModel;
use Config\Encryption;
use CodeIgniter\Model;

class Barang extends BaseController
{
    public function barang_store()
    {
        $barang_model = new BarangModel();

        $imageFile = $this->request->getFile('image');

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Move the uploaded file to a folder (e.g., public/AdminLTE/image_data)
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/AdminLTE/image_data', $newName);
        } else {
            session()->setFlashdata('notif', 'Format Gambar Salah!');
            return redirect()->to(base_url('/barang/index'));
        }

        $data = [
            'nama' => $this->request->getPost('name'),
            'gambar' => $newName,
            'satuan_barang' => $this->request->getPost('satuan_barang'),
            'satuan_harga' => $this->request->getPost('satuan_harga'),
            'keterangan' => $this->request->getPost('keterangan'),
        ];

        if ($barang_model->insert($data, false)) {
            session()->setFlashdata('notif', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/barang/index'));
        } else {
            session()->setFlashdata('notif', 'Data Gagal Ditambahkan!');
            return redirect()->to(base_url('/barang/index'));
        }
    }

    public function barang_update($id)
    {
        $barangModel = new BarangModel();

        return view('barang/update', ['data' => $barangModel->find($id)]);
    }

    public function update_save()
    {
        $barangModel = new BarangModel();

        $imageFile = $this->request->getFile('image');

        if ($imageFile->isValid() && !$imageFile->hasMoved()) {
            // Move the uploaded file to a folder (e.g., public/AdminLTE/image_data)
            $newName = $imageFile->getRandomName();
            $imageFile->move(ROOTPATH . 'public/AdminLTE/image_data', $newName);

            $data = [
                'nama' => $this->request->getPost('name'),
                'gambar' => $newName,
                'satuan_barang' => $this->request->getPost('satuan_barang'),
                'satuan_harga' => $this->request->getPost('satuan_harga'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];
            
        } else {
            $data = [
                'nama' => $this->request->getPost('name'),
                'satuan_barang' => $this->request->getPost('satuan_barang'),
                'satuan_harga' => $this->request->getPost('satuan_harga'),
                'keterangan' => $this->request->getPost('keterangan'),
            ];
            
        }

        if ($barangModel->update($this->request->getPost('id_barang'), $data, null)) {
            session()->setFlashdata('notif', 'Data Berhasil Ditambahkan!');
            return redirect()->to(base_url('/barang/index'));
        } else {
            session()->setFlashdata('notif', 'Data Gagal Ditambahkan!');
            return redirect()->to(base_url('/barang/index'));
        }
    }

    public function barang_index()
    {
        $barang_model = new BarangModel();

        return view('barang/index', ['data' => $barang_model->findAll()]);
    }

    public function barang_create()
    {
        return view('barang/create');
    }

    public function barang_delete($id)
    {
        $barangModel = new BarangModel();

        $filename = $barangModel->findColumn('gambar', $id);
        $imageDirectory = 'public/AdminLTE/image_data/';

        // Buat path lengkap ke gambar yang akan dihapus
        $imagePath = ROOTPATH . $imageDirectory . $filename[0];

        // Cek apakah gambar ada di direktori
        if (file_exists($imagePath)) {
            // Hapus gambar
            unlink($imagePath);

            // Tampilkan pesan sukses
            echo 'Gambar berhasil dihapus.';
        } else {
            // Tampilkan pesan jika gambar tidak ditemukan
            echo 'Gambar tidak ditemukan.';
        }

        $barangModel->delete($id);

        session()->setFlashdata('notif', 'Data Berhasil Dihapus!');
        return redirect()->to(base_url('/barang/index'));
    }
}
