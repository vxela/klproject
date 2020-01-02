<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('backend.admin.index');
    }

    public function listPeserta() {
        $peserta = \App\Models\Tbl_bio::all();
        return view('backend.admin.list_peserta', ['data_peserta' => $peserta]);
    }

    public function listFishPeserta($id) {
        $fish = \App\Models\Tbl_user_fish::where('user_id', $id)->get();

        return view('backend.admin.list_fish_peserta', ['data_fish' => $fish]);
    }
}
