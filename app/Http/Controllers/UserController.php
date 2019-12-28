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
        ])->where('user_id', $id)->get();

        // $ufish = \App\User::where('id', $id)->with('user_fish')->get();
        // $ufish = \App\Models\Tbl_user_fish::with('fish')->get();    
        // dd($ufish);
        // echo count($ufish);
        return view('backend.user.fish', ['user_id' => $id, 'data_fish' => $ufish]);
    }

    public function userRegisterFish($id) {
        $user_id = $id;
        $user = \App\User::with('bio')->find($user_id);

        $varietas = \App\Models\Tbl_fish::all();

        $cat = \App\Models\Tbl_cat::all();

        // dd($user);

        return view('backend.user.create_fish', [
            'user' => $user,
            'data_varietas' => $varietas,
            'data_cat' => $cat,
        ]);
    }

    public function userStoreFish(Request $r) {
        dd($r->all());
    }
}
