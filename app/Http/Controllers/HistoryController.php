<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Log;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class HistoryController extends   Controller
{

    public function index()
    {
        if (Session::get('username') === null) {
            return view('Layout/Login');
        } else {
            $dataVoucher = $this->getVoucher();
            $dataKategori = $this->getHistoryKategori();
            return view('History/history', [
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
            $url = "https://localhost:7250/api/Voucher/GetVoucherHistory";
            $response = $client->request('GET', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
    public function getHistoryKategori()
    {
        $log = Log::channel("errorlog");

        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher/GetClaimKategoriesList";
            $response = $client->request('GET', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
    public function delete(Request $request)
    {
        $log = Log::channel("errorlog");

        try {
            $client = new Client();
            $url = "https://localhost:7250/api/Voucher_Claim/DeleteVoucherClaim?id=" . $request->input('id');
            $response = $client->request('DELETE', $url, [
                'verify' => false,
            ]);
            return   json_decode($response->getBody());
        } catch (\Exception $e) {
            $log->error("Get Master Voucher: " . $e->getMessage());
            return false;
        }
    }
}
