<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\book;

class EbookController extends Controller
{
    public function index(){
        $data_book = book::orderByDesc('id')->get();
        return view('index_page', compact('data_book'));
    }

    public function order_book($passing_id_book){
        $get_data = book::where('passing_id_book', $passing_id_book )->first();
        return view('order_page', compact('get_data'));
    }

    public function order_process(Request $req){
        // dd($req->all());

        // Get the email from the request
        $email = $req->input('email');

        // Remove the domain part of the email and split by dot or underscore
        $namePart = explode('@', $email)[0];

        // Replace dots and underscores with spaces for more readable names
        $namePart = str_replace(['.', '_'], ' ', $namePart);

        // Convert to proper case
        $name = ucwords($namePart);

        // Output for debugging
        dd([
            'email' => $email,
            'name' => $name
        ]);
    }


}
