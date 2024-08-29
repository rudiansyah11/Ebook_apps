<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;
use App\Mail\GeneratePasswordEmail;


class AuthController extends Controller
{

    public function genpass(Request $req){

        // Validasi input email
        $validated = $req->validate([
            'email_generate' => 'required|email',
        ]);
        $email = $validated['email_generate'];

        $namePart = explode('@', $email)[0];
        $namePart = str_replace(['.', '_'], ' ', $namePart);
        $namePart = preg_replace('/\d/', '', $namePart);
        $name = ucwords($namePart);

        // passing id users
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $passing_id_user = substr(str_shuffle($permitted_chars), 0, 16);

        // expired password
        date_default_timezone_set('Asia/Jakarta');
        $now_date = strtotime("+7 day");
        $expired_at = date('Y-m-d H:i:s', $now_date);

        // generate password
        $password = $this->generateRandomPassword();

        // send email
        $send_email = Mail::to($email)->send(new GeneratePasswordEmail($email, $name, $password, $expired_at));

        // dd([
        //     'email' => $email,
        //     'name' => $name,
        //     'password' => $password,
        //     'expired_at' => $expired_at
        // ]);
        
        // "email" => "rudiansyahsukisno@gmail.com"
        // "name" => "Rudiansyahsukisno"
        // "password" => "DXr_iaKM)Zd<&37c"
        // "expired_at" => "2024-08-22 16:07:55"
        $user = new User();
        $user->passing_id_user = $passing_id_user;
        $user->email = htmlspecialchars($email);
        $user->full_name = htmlspecialchars($name);
        $user->expired_at = htmlspecialchars($expired_at);
        $user->password = Hash::make($password);
        $user->rule = '2';
        $user->no_phone = null;
        $user->address = null;
        $user->save();

        if($user){
            return redirect()->route('login')->with('success', 'Automatic Generate password success, check your email!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
        }
    }

    private function generateRandomPassword($length = 16){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=<>?';
        $charactersLength = strlen($characters);
        $randomPassword = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomPassword;
    }

    public function testEmail() {
        $email = 'rudiansyahsukisno@gmail.com';
        $name = 'Test User';
        $password = 'TestPassword123!';
        
        date_default_timezone_set('Asia/Jakarta');
        $now_date = strtotime("+7 day");
        $expired_at = date('Y-m-d H:i:s', $now_date);
    
        Mail::to($email)->send(new GeneratePasswordEmail($email, $name, $password, $expired_at));
    
        return 'Email sent successfully!';
    }

    public function login(){
        if (auth()->check()) {

            if( auth()->user()->rule == "1"){
                return redirect()->route('dashboard');

            } else {
                return redirect()->route('menu');
            }

        } else {
            return view('auth.login');
        }
    }

    public function loginProcess(Request $request){

        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];




        if (Auth::attempt($credetials)) {

            // jika akun sudah expired
            date_default_timezone_set('Asia/Jakarta');
            $now_date = Carbon::now();

            // Get expired time from user model
            $expired = auth()->user()->expired_at;

            // Convert both to Carbon instances
            $expired_date = Carbon::parse($expired);

            // Check if current date is after expired date
            if ($now_date->greaterThan($expired_date)) {
                
                Auth::logout();
                // Redirect to the login page with a message
                return redirect('/login')->with('error', 'Akun Anda telah expired.');
                
            } else {
                if( auth()->user()->rule == "1"){
                    return redirect()->route('dashboard')->with('success', 'Login berhasil'); 
    
                } else {
                    return redirect()->route('menu')->with('success', 'Login berhasil');
                }
            }


        }
        return back()->with('error', 'Email or Password salah');
    }


    public function register(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $passing_id_user = substr(str_shuffle($permitted_chars), 0, 16);
        

        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric',
            'role_akses' => 'required|integer',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // If validation passes, continue to process
        try {
            $user = new User();
            $user->passing_id_user = $passing_id_user;
            $user->name = htmlspecialchars($validatedData['username']);
            $user->email = htmlspecialchars($validatedData['email']);
            $user->role = htmlspecialchars($validatedData['role_akses']);
            $user->password = Hash::make($validatedData['password']);
            $user->save();

            $user_detail = new UserDetail();
            $user_detail->passing_id_user = $passing_id_user;
            $user_detail->no_phone = htmlspecialchars($validatedData['phone']);
            $user_detail->name = htmlspecialchars($validatedData['username']);
            $user_detail->title = null;
            $user_detail->division = null;
            $user_detail->region = null;
            $user_detail->photo = null;
            $user_detail->save();

            return redirect()->route('login')->with('success', 'Registration successful!, Please log in now.s');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong! Please try again.')->withInput();
        }

        // Verifikasi password lama
        if (!Hash::check($req->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
        }

    }

    
    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('login');
    }
}
