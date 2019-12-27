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
        $ufish = \App\Models\Tbl_user_fish::with([
            'user' => function($query) use ($id) {
                $query->where('id', '=', $id);
                },
            'bio' => function($query) use ($id) {
                $query->where('user_id', '=', $id);
                },
            'fish', 'cat'    
        ])->get();

        // $ufish = \App\User::where('id', $id)->with('user_fish')->get();
        // $ufish = \App\Models\Tbl_user_fish::with('fish')->get();    
        // dd($ufish);
        return view('backend.user.fish', ['data_fish' => $ufish]);
    }
}
