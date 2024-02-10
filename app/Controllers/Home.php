<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BarangModel;
use Config\Encryption;
use CodeIgniter\Model;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }

    public function home()
    {
        $barang_model = new BarangModel();

        if (!isset($_GET['id'])) {
            return view('home', ['data' => $barang_model->findAll()]);
        }

        if (isset($_GET['id'])) {
            $data[] = $barang_model->find($_GET['id']);
            return view('home', ['data' => $data]);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function dashboard()
    {
        $barang_model = new BarangModel();

        return view('dashboard/dashboard', ['data' => $barang_model->findAll()]);
    }

    public function penjualan_index()
    {
        $db = \Config\Database::connect(); // Menghubungkan ke database

        $data = $db->table('item_transaksi_keluar')
            ->select('item_transaksi_keluar.*, barang.*, transaksi_keluar.*, user.*')
            ->join('barang', 'item_transaksi_keluar.id_barang = barang.id_barang')
            ->join('transaksi_keluar', 'item_transaksi_keluar.id_tk = transaksi_keluar.id_tk')
            ->join('user', 'user.id_user = item_transaksi_keluar.id_pembeli')
            ->distinct()
            ->get()
            ->getResultArray();

        $groupedArrays = [];

        // Proses untuk membagi array berdasarkan data yang sama
        foreach ($data as $item) {
            $id = $item['id_tk'];
            if (!isset($groupedArrays[$id])) {
                $groupedArrays[$id] = [];
            }

            $groupedArrays[$id][] = $item;
        }

        $groupedArrays = array_values($groupedArrays);
        // dd($groupedArrays);

        return view('/penjualan/index', ['data' => $groupedArrays]);
    }
    public function pembayaran_index()
    {
        $db = \Config\Database::connect(); // Menghubungkan ke database

        // $total_harga = $db->table('item_transaksi_keluar')
        //     ->select('item_transaksi_keluar.id_tk, item_transaksi_keluar.id_pembeli, SUM(item_transaksi_keluar.jumlah * barang.satuan_harga) as total_harga')
        //     ->join('barang', 'barang.id_barang = item_transaksi_keluar.id_barang')
        //     ->where('item_transaksi_keluar.id_pembeli = ' . session()->get('user_id'))
        //     ->groupBy('item_transaksi_keluar.id_tk')
        //     ->get()
        //     ->getResultArray();

        // $total_harga = $db->table('transaksi_keluar')
        //     ->select('transaksi_keluar.*')
        //     ->get()
        //     ->getResultArray();

        $data = $db->table('item_transaksi_keluar')
            ->select('item_transaksi_keluar.*, barang.*, transaksi_keluar.*')
            ->join('barang', 'item_transaksi_keluar.id_barang = barang.id_barang')
            ->join('transaksi_keluar', 'item_transaksi_keluar.id_tk = transaksi_keluar.id_tk')
            ->where('item_transaksi_keluar.id_pembeli', session()->get('user_id'))
            ->distinct()
            ->get()
            ->getResultArray();

        $groupedArrays = [];

        // Proses untuk membagi array berdasarkan data yang sama
        foreach ($data as $item) {
            $id = $item['id_tk'];
            if (!isset($groupedArrays[$id])) {
                $groupedArrays[$id] = [];
            }

            $groupedArrays[$id][] = $item;
        }

        $groupedArrays = array_values($groupedArrays);
        // dd($groupedArrays);

        return view('/pembayaran/index', ['data' => $groupedArrays]);
    }

    public function login()
    {
        $muser = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $password = md5($password);

        $cek = $muser->get_data($username, $password);

        if (isset($cek)) {
            session()->set('user_id', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('nama_lengkap', $cek['nama_lengkap']);
            session()->set('email', $cek['email']);
            session()->set('alamat', $cek['alamat']);
            session()->set('jenis_kelamin', $cek['jenis_kelamin']);
            session()->set('no_hp', $cek['no_hp']);
            session()->set('level', $cek['level']);

            return redirect()->to(base_url('/dashboard'));
        } else {
            session()->setFlashdata('notif', 'Username / Password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function create_akun()
    {
        $muser = new UserModel();
        $encryption = service('encrypter');

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp' => $this->request->getPost('no_hp'),
            'level' => $this->request->getPost('level'),
        ];

        if ($muser->insert($data, false)) {
            session()->setFlashdata('notif', 'Selamat anda punya akun baru!');
            return redirect()->to(base_url('/'));
        } else {
            session()->setFlashdata('notif', 'Gagal buat akun!');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function generate_qrcode($url)
    {
        $data = explode('#', $url);

        $barang_model = new BarangModel();
        $find = $barang_model->find($data[1]);

        $url = base_url($data[0] . '?id=' . $data[1]);
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($url)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->labelText($find['nama'])
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->validateResult(false)
            ->build();

        // Directly output the QR code
        header('Content-Type: ' . $result->getMimeType());

        // Save it to a file
        $result->saveToFile(__DIR__ . '/qrcode.png');

        // Generate a data URI to include image data inline (i.e. inside an <img> tag)
        $dataUri = $result->getDataUri();


        echo '<img src="' . $dataUri . '"';
    }
}
