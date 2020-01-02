<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('backend.admin.index');
    }

    public function listPeserta() {
        return view('backend.admin.list_peserta');
    }
}
