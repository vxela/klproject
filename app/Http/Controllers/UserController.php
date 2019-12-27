<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('backend.user.index');
    }

    public function personalData($id) {
        $bio = \App\User::with('bio')->find($id);

        // dd($bio);
        // echo $bio->bio->nama;
        return view('backend.user.personal', ['user' => $bio]);
    }

    public function fishData($id) {
        return view('backend.user.fish');
    }
}
