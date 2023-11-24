<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class DashboardController extends   Controller
{

    public function index()
    {

        if (Session::get('username') === null) {
            return view('Layout/Login');
        } else {
            $dataVoucher = $this->getVoucher();
            $dataKategori = $this->getKategori();
            return view('Dashboard/Dashboard', [
                'voucher' => $dataVoucher,
                'kategori' => $dataKategori
            ]);
        }
    }
    public function DashboardByKategori($kategori)
    {

        if (Session::get('username') === null) {
            return view('Layout/Login');
        } else {
            $dataVoucher = $this->getVoucherByKategori($kategori);
            $dataKategori = $this->getKategori();
            return view('Dashboard/Dashboard', [
                'voucher' => $dataVoucher,
                'kategori' => $dataKategori
            ]);
        }
    }

    public function getVoucher()
    {
        $log = Log::channel("errorlog");

        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher";
            $response = $client->request('GET', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
    public function getKategori()
    {
        $log = Log::channel("errorlog");

        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher/GetKategoriesList";
            $response = $client->request('GET', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
    public function getVoucherByKategori($kategori)
    {
        $log = Log::channel("errorlog");

        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher/GetByKategori?kategori=" . $kategori;
            $response = $client->request('GET', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }

    public function UpdateVoucher(Request $request)
    {


        $log = Log::channel("errorlog");
        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher/UpdateVoucher?id=" . $request->input('id');
            $response = $client->request('PUT', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
}
