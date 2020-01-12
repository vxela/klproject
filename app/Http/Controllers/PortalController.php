<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PortalController extends Controller
{
    public function index(){
        return view('portal.page.index');
    }

    public function summary(){
        $jml_own = \App\User::where('role_id', 3)->count();
        $jml_fish = \App\Models\Tbl_user_fish::count();
        $jml_var = \App\Models\Tbl_user_fish::select('fish_id', DB::raw('count(*) as total'))
                        ->groupBy('fish_id')
                        ->orderBy('total', 'DESC')
                        ->first();
        $jml_own_city = \App\Models\Tbl_bio::select('prov', DB::raw('count(*) as t_prov'))
                        ->groupBy('prov')
                        ->orderBy('t_prov', 'DESC')
                        ->first();
        $jml_handler = \App\Models\Tbl_user_fish::select('handler_name', DB::raw('count(*) as t_handler'))
                        ->groupBy('handler_name')
                        ->orderBy('t_handler', 'DESC')
                        ->first();

        // return response()->json($jml_var);
        // dd($jml_var);

        return view('portal.page.summary', [
            'n_own' => $jml_own,
            'n_fish' => $jml_fish,
            'n_var' => $jml_var,
            'n_prov' => $jml_own_city,
            'n_hand' => $jml_handler,
        ]);
    }
}
