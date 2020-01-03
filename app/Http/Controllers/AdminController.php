<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Validator;
use Storage;
use Session;
use Image;
use File;
use DB;

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

    public function detailUserFish($id) {
        $ufish = \App\Models\Tbl_user_fish::with([
            'user',
            'bio',
            'fish',
            'cat'
        ])->find($id);

        $cat = \App\Models\Tbl_cat::all();
        $var = \App\Models\Tbl_fish::all();

        return view('backend.admin.detail_user_fish', ['fish' => $ufish, 'data_cat' => $cat, 'data_var' => $var]);
    }

    public function UpdateUserFish(Request $req) {
        // dd($req->all());
        $ufish_id = $req->fish_id;

        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->handler_name = $req->handler_name;
        $ufish->handler_address = $req->handler_address;
        $ufish->fish_id = $req->varietas;
        $ufish->cat_id = $req->type_ukuran;
        $ufish->fish_size = $req->fish_size;
        
        if($req->status_reg == 'LUNAS') {
            $ufish->status = $req->status_reg;
            $ufish->confirm_by = auth()->user()->name;
        } else {
            $ufish->status = $req->status_reg;
            $ufish->confirm_by = '';
            $ufish->fish_resi_picture = '';
        }


        $update = $ufish->save();

        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Data Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function ConfirmRegistrasi(Request $r) {
        // dd($r->all());
        $id = $r->fish_id;

        $ufish = \App\Models\Tbl_user_fish::find($id);
        $ufish->status = $r->status;
        $ufish->confirm_by = auth()->user()->name;

        $update = $ufish->save();
        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Data Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Ikan Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function updateFishPicture(Request $req) {
        if($req->hasFile('fish_pict')) {
            $filename_ext = $req->file('fish_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_pict')->storeAs('public/fish', $filenametostore);
            $req->file('fish_pict')->storeAs('public/fish/thumbnail', $filenametostore);
            $oripath = public_path('storage/fish/'.$filenametostore);
            $thumbnailpath = public_path('storage/fish/thumbnail/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);
            $img = Image::make($thumbnailpath)->fit(100, 100, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);

            $img_path = '/storage/fish/'.$filenametostore;
            $img_thumb_path = '/storage/fish/thumbnail/'.$filenametostore;
        } else {
            $img_path = '/storage/fish/default_fish.jpg';
            $img_thumb_path = '/storage/fish/thumbnail/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);
        $oldimg = preg_replace("#/storage/fish/#", "", $ufish->fish_picture);
        // echo $oldimg;
        //delete old fish
        // echo base_path('/'.$oldimg);
        Storage::delete(base_path($oldimg));
        Storage::delete(base_path('/thumbnail'.$oldimg));
        $ufish->fish_picture = $img_path;
        $ufish->fish_picture_thumb = $img_thumb_path;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Gambar Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Ikan Berhasil Di Update']);
        }

        return redirect()->back();

    }

    public function uploadFishResiReg(Request $req) {
        if($req->hasFile('fish_resi_pict')) {
            $filename_ext = $req->file('fish_resi_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_resi_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_resi_pict')->storeAs('public/resi', $filenametostore);
            $oripath = public_path('storage/resi/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);

            $img_path = '/storage/resi/'.$filenametostore;
        } else {
            $img_path = '/storage/resi/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->fish_resi_picture = $img_path;
        $ufish->status = "LUNAS";
        $ufish->confirm_by = auth()->user()->name;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Simpan Resi Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Resi Berhasil Di Simpan']);
        }

        return redirect()->back();
    }

    public function updateFishResiReg(Request $req) {
        if($req->hasFile('fish_resi_pict')) {
            $filename_ext = $req->file('fish_resi_pict')->getClientOriginalName();
            $filename = pathinfo($filename_ext, PATHINFO_FILENAME);
            $extension = $req->file('fish_resi_pict')->getClientOriginalExtension();
            $filenametostore = $filename.'_'.Carbon::now()->format('Y_m_d_His').'.'.$extension;
            $req->file('fish_resi_pict')->storeAs('public/resi', $filenametostore);
            $oripath = public_path('storage/resi/'.$filenametostore);
            $img = Image::make($oripath)->resize(500, null, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($oripath);

            $img_path = '/storage/resi/'.$filenametostore;
        } else {
            $img_path = '/storage/resi/default_fish.jpg';
        }

        $ufish_id = $req->fish_id;
        $ufish = \App\Models\Tbl_user_fish::find($ufish_id);

        $ufish->fish_resi_picture = $img_path;
        $ufish->status = "LUNAS";
        $ufish->confirm_by = auth()->user()->name;
        $update = $ufish->save();


        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Update Resi Gagal, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Gambar Resi Berhasil Di Update']);
        }

        return redirect()->back();
    }

    public function addPeserta() {
        return view('backend.admin.tambah_peserta');
    }

}
