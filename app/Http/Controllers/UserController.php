<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function Login(Request $request)
    {

        $username = $request->username;
        $password = $request->input('password');
        // $curl = curl_init();

        $log = Log::channel("errorlog");
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://localhost:7250/api/User/Login',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "username": "' . $username . '",
                    "password": "' . $password . '"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $getjson = json_decode($response);

            if ($getjson->data != null) {
                $getdata = $getjson->data;

                Session::put('username', $getdata->username);
                Session::put('nama', $getdata->nama);
            }

            return $response;
        } catch (\Exception $e) {
            $log->error("Get User LOGIN " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function Register(Request $request)
    {

        $username = $request->username;
        $password = $request->input('password');
        $nama = $request->nama;
        $email = $request->email;
        // $curl = curl_init();

        $log = Log::channel("errorlog");
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://localhost:7250/api/User/Register',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
                    "username": "' . $username . '",
                    "email": "' . $email . '",
                    "name": "' . $nama . '",
                    "password": "' . $password . '"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $getjson = json_decode($response);



            return $response;
        } catch (\Exception $e) {
            $log->error("Get User LOGIN " . $e->getMessage());
            return $e->getMessage();
        }
    }
    public function Logout()
    {
        Session::flush();
        return true;
    }
}
