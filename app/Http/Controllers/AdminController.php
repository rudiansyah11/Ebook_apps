<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use App\Models\dataRefer;


use Carbon\Carbon;

class AdminController extends Controller
{

    public function get_authen($passing_id_user){
        $user_details = User::where('passing_id_user', $passing_id_user)->first();
        return $user_details;
    }

    public function dashboard(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $datanya = [
            'data_detail' => $user_details
        ];
        return view('afterlogin.dashboard', compact('datanya'));
    }

    public function menu(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $datanya = [
            'data_detail' => $user_details
        ];
        return view('afterlogin.first_menu', compact('datanya'));
    }

    public function faq(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $datanya = [
            'data_detail' => $user_details
        ];
        return view('afterlogin.faq', compact('datanya'));
    }


    // =============================
    // PROFILE USERS
    // =============================
    public function profile(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $data_refer = DB::table('data_refers')->select('title', 'valuenya')->get();

        $datanya = [
            'data_detail' => $user_details,
            'data_refer' => $data_refer
        ];

        // dd($datanya);
        return view('profile', compact('datanya'));
    }

    public function update_profile(Request $req){
        $req->validate([
            'user_akses' => 'required|integer',
            'phone' => 'required|numeric',
            'title' => 'required',
            'region' => 'required',
            'division' => 'required',
        ]);

        $execute = User::where('passing_id_user', auth()->user()->passing_id_user)->update([
            'role' => $req->user_akses
        ]);

        $execute = UserDetail::where('passing_id_user', auth()->user()->passing_id_user)->update([
            'title' => $req->title,
            'region' => $req->region,
            'no_phone' => $req->phone,
            'division' => $req->division
        ]);

        return back()->with('success', 'data successfully to update.');
    }

    public function change_password(Request $req){

        $req->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // 'confirmed' akan mengecek apakah 'new_password' sesuai dengan 'new_password_confirmation'
        ]);

        // Dapatkan user saat ini
        $user = Auth::user();

        // Verifikasi password lama
        if (!Hash::check($req->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
        }

        // Update password baru
        $passing_id_user = auth()->user()->passing_id_user;
        $new_pass = Hash::make($req->new_password);

        User::where('passing_id_user', $passing_id_user)->update(['password' => $new_pass]);

        return back()->with('success', 'Password berhasil diubah');
    }

    public function upload_pp(Request $req){
        $req->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
        ]);

        $file = $req->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        // masukan database menggunakan parameter email
        $passing_id_user = auth()->user()->passing_id_user;
        UserDetail::where('passing_id_user',$passing_id_user)->update(['photo' => $filename]);
        
        // Menyimpan file ke folder public/profile_photos
        $file->move(public_path('assets/profile_picture'), $filename);

        // Jika Anda ingin menyimpan path foto di database, Anda bisa melakukan seperti ini
        // auth()->user()->update(['profile_photo' => $filename]);
        return back()->with('success', 'Photo uploaded successfully.')->with('path', $filename);
    }


    // =============================
    // NOTIFICATION
    // ============================

    public function createNotification($pic, $type, $message){
        
        // looping dulu semua data usernya, untuk di sent ke semua users
        $get_user = User::all();

        foreach($get_user as $row){

            notification::create([
                'passing_id_user' => $row->passing_id_user,
                'pic' => $pic,
                'type' => $type,
                'data' => $message,
            ]);
        }
        return true;
    }

    public function unread(){
        $notifications = notification::where('passing_id_user', auth()->user()->passing_id_user )
        ->where('read', false)
        ->orderByDesc('id')
        ->get()
        ->map(function ($notification) {
            $notification->formatted_date = Carbon::parse($notification->created_at)->format('Y-m-d H:i:s');
            return $notification;
        });

        return response()->json($notifications);
    }

    public function markread(Request $req){

        // update status read to be true
        notification::where('passing_id_user', auth()->user()->passing_id_user )
        ->where('read', false)
        ->update(['read' => true]);

        // return response()->json(['message' => 'Notifications marked as read']);
        $notifications = notification::where('passing_id_user', auth()->user()->passing_id_user )
        ->orderByDesc('id')
        ->get()
        ->map(function ($notification) {
            $notification->formatted_date = Carbon::parse($notification->created_at)->format('Y-m-d H:i:s');
            return $notification;
        });

        return response()->json($notifications);
    }

    // =============================
    // DATA REFER/
    // =============================
    public function data_refer(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );

        $data_refer = dataRefer::orderByDesc('id')->get();
        $ref_titles = DB::table('data_refers')
            ->select('title')
            ->distinct()
            ->get();

        $datanya = [
            'data_detail' => $user_details,
            'data_refer' => $data_refer,
            'ref_titles' => $ref_titles
        ];

        return view('data_refer.menu_refer', compact('datanya'));
    }

    public function buatrefer(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $ref_titles = DB::table('data_refers')
            ->select('title')
            ->distinct()
            ->get();

        $datanya = [
            'data_detail' => $user_details,
            'ref_titles' => $ref_titles
        ];


        return view('data_refer.input_refer', compact('datanya'));
    }

    public function executebuatrefer(Request $req){

        // Validasi input
        $validator = Validator::make($req->all(), [
            'title' => 'required',
            'valuenya' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $title = htmlspecialchars($req->input('title'));
        $valuenya = htmlspecialchars($req->input('valuenya'));

        $execute = new dataRefer();
        $execute->title = $title;
        $execute->valuenya = $valuenya;
        $execute->save();

        if($execute){

            // create notification for all user
            $type="Data Refer";
            $pic = auth()->user()->name;
            $message = "Has been add new data refer: ".$title." - ".$valuenya;
            $this->createNotification($pic, $type, $message);

            // create log
            
            return redirect()->route('data_refer.menu')->with('success', 'Data Refer berhasil diperbaharui');
        }
    }

    public function getdetail_datareffer(Request $req){
        $idnya = $req->id;
        $tampung_refer = DB::table('data_refers')->where('id', $idnya)->first();
        return response()->json($tampung_refer);
    }

    public function executeupdaterefer(Request $req){

        if( empty($req->idnya) ){
            return back()->with('error', 'Something wrong!');
        }

        // Validasi input
        $validator = Validator::make($req->all(), [
            'idnya' => 'required',
            'title' => 'required',
            'valuenya' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $title = htmlspecialchars($req->input('title'));
        $valuenya = htmlspecialchars($req->input('valuenya'));
        
        dataRefer::where('id', $req->idnya)->update([
            'title' => $title,
            'valuenya' => $valuenya
        ]);

        return back()->with('success', 'Data Refer berhasil diperbaharui');
    }

    public function hapusrefer($id){
        if( empty($id) ){
            return back()->with('error', 'Something wrong!');
        }

        dataRefer::where('id', $id)->delete();
        return back()->with('success', 'Data Refer berhasil diperbaharui');
    }


    // =============================
    // PEMESANAN BUS/ BUS BOOKING
    // =============================
    public function pemesanan(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $datanya = [
            'data_detail' => $user_details
        ];


        return view('pemesanan.menu_pemesanan', compact('datanya'));
    }

    public function buatpemesanan(){
        // munculin data untuk di headernya
        $user_details = $this->get_authen( auth()->user()->passing_id_user );
        $datanya = [
            'data_detail' => $user_details
        ];

        
        return view('pemesanan.buat_pemesanan', compact('datanya'));
    }

    public function executebuatpemesanan(Request $req){
        dd($req->all());
        
        return redirect()->route('jadwalbus.menu')->with('success', 'Berhasil membuat pemesanan.');
    }
    

}
