<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\PenggunaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function actionlogin(Request $request)
     {
          try {
             $username = $request->username;
             $password = $request->password;
      
             $response = Http::post('https://api.polytechnic.astra.ac.id:2906/api_dev/efcc359990d14328fda74beb65088ef9660ca17e/SIA/LoginSIA?username=' . $username . '&password=' . $password);
             $response->throw();
      
              // Simpan informasi pengguna ke dalam session
             session()->put([
                 'username' => $response['username'] ?? null,
                 'nama' => $response['nama'] ?? null,
                 'role' => $response['role'] ?? null,
             ]);
 
             if ($response['result']) {
                 if (isset($response['username']) && $response['username'] !== "") {
                     $username = $response['username'];
                     $user = PenggunaModel::where("username", $username)->first();
      
                     if (!$user) {
                         // Jika pengguna tidak ada dalam tabel lokal, tambahkan pengguna ke dalam tabel
                          $role = $response['role'];
                         // $role = $this->checkUsernameAndRole($username);
                          
                          // Simpan informasi pengguna ke dalam tabel PenggunaModel
                         
                             $newUser = new PenggunaModel();
                             $newUser->username = $username;
                             $newUser->nama = $response['nama'] ?? null;
                             $newUser->role = 'peserta';
                             $newUser->save();
                     }
      
                     $role = $response['role'];
                     if ($role === "MAHASISWA") {
                         return redirect(route('Halaman_Pelatih.index'));
                     } elseif ($role === "admin") {
                         return redirect(route('Halaman_Admin.index'));
                     } elseif ($role === "pelatih") {
                         return redirect(route('AstraLearn.index'));
                     } else {
                         
                         return response()->json(['error' => 'Role tidak valid!'], 400);
                     }
                 } else {
                     return response()->json(['error' => 'Nama Pengguna atau Kata Sandi Salah!'], 400);
                 }
             } else {
                 return response()->json(['error' => 'Failed to connect to the API'], $response->status());
             }
         } catch (\Illuminate\Http\Client\RequestException $e) {
              // Tangani kesalahan HTTP Client
             Log::error('API Connection Error: ' . $e->getMessage());
             return response()->json(['error' => 'Failed to connect to the API'], 500);
         } catch (\Exception $e) {
              // Tangani kesalahan umums
             Log::error('Unexpected Error: ' . $e->getMessage());
             return response()->json(['error' => 'Unexpected error occurred'], 500);
         }
     }


    public function dashboard()
    {
        // Pastikan middleware 'auth' sudah ditambahkan di route
        return view('pengguna.dashboard');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect('pengguna.dashboard');
        }else{
            return view('login.index');
        }
    }

    public function actionlogout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }

 }