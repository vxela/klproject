<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortalController extends Controller
{
    public function index(){
        return view('portal.page.index');
    }

    public function summary(){
        return view('portal.page.summary');
    }
}
