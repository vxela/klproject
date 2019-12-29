<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Validator;
use Session;
use Image;
use File;
use DB;

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

        if($r->hasFile('fish_pict')) {
            $vld = Validator::make($r->all(), [
                'fish_pict' => 'image|mimes:png,jpg|max:300'
            ]);
            if ($vld->fails()) {
                // echo "validate fail";
                Session::flash('notif', ['type' => 'error', 'msg' => 'Foto bertype png atau jpg maksimal 300Kb']);
                return redirect(route('user.regis_ikan', ['id' => auth()->user()->id]));
                
            } else {
                $filename_ext = $r->file('fish_pict')->getClientOriginalName();
                $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
                $extension = $r->file('fish_pict')->getClientOriginalExtension();
                $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
                $r->file('fish_pict')->storeAs('public/fish', $filenametostore);
                $r->file('fish_pict')->storeAs('public/fish/thumbnail', $filenametostore);
                $thumbnailpath = public_path('storage/fish/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->fit(100, 100, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);

                $img_path = '/storage/fish/'.$filenametostore;
            }
        } else {
            $img_path = '/storage/fish/default_fish.jpg';
        }

        DB::beginTransaction();

        $user_fish = [
            'user_id'            => $r->user_id,
            'handler_name'       => $r->handler_name,
            'handler_address'    => $r->handler_address,
            'bio_id'             => $r->bio_id,
            'fish_id'            => $r->varietas,
            'cat_id'             => $r->type_ukuran,
            'fish_picture'       => $img_path,
            'status'             => 'BELUM LUNAS',
            'date_reg'           => Carbon::now()->format('Y-m-d'),
            'time_reg'           => Carbon::now()->format('H:i:s')
        ];

        $fish = \App\Models\Tbl_user_fish::create($user_fish);

        if(!$fish) {
            DB::rollBack();
        }
        else {
            DB::commit();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Ikan Berhasil Di daftarkan']);
    
            return redirect()->route('user.fish', ['id'=> auth()->user()->id]);
        }
        

    }
}
