<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\Validator;
use Response;
use Storage;
use Session;
use Image;
use File;
use DB;
use PDF;
use Mush;

class AdminController extends Controller
{
    public function index() {
        return view('backend.admin.index');
    }

    public function listPeserta() {
        // $peserta = \App\Models\Tbl_bio::all()->paginate(10);
        $peserta = \App\User::with(['bio','user_fish'])->where('role_id','=', 3)->get();
        // dd($peserta);
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

    public function storePeserta(Request $r) {
        DB::beginTransaction();
        
        $data_user = [
            'role_id'   =>3,
            'name'      =>$r->username,
            'email'     =>$r->email,
            'password'  =>bcrypt($r->password)
        ];

        $user = \App\User::create($data_user);

        $data_regis = [
            'user_id'    => $user->id,
            'nama'       => $r->nama_lengkap,
            'no_hp'      => $r->no_hp,
            'email'      => $r->email,
            'alamat'     => $r->alamat,
            'prov'       => $r->prov,
            'kota'       => $r->kabupaten
        ];

        $bio = \App\Models\Tbl_bio::create($data_regis);

        if( !$user || !$bio )
        {
            DB::rollBack();
        } else {
            DB::commit();
        }

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil mendaftarkan peserta!!.. || username ='.$r->username.' || Password = '.$r->password.' ||']);

        return redirect()->back();
    }

    public function addAdmin() {
        return view('backend.admin.tambah_admin');
    }

    public function storeAdmin(Request $r) {
        DB::beginTransaction();
        
        $data_user = [
            'role_id'   =>1,
            'name'      =>$r->username,
            'email'     =>$r->email,
            'password'  =>bcrypt($r->password)
        ];

        $user = \App\User::create($data_user);

        $data_regis = [
            'user_id'    => $user->id,
            'nama'       => $r->nama_lengkap,
            'no_hp'      => $r->no_hp,
            'email'      => $r->email,
            'alamat'     => $r->alamat,
            'prov'       => $r->prov,
            'kota'       => $r->kabupaten
        ];

        $bio = \App\Models\Tbl_bio::create($data_regis);

        if( !$user || !$bio )
        {
            DB::rollBack();
        } else {
            DB::commit();
        }

        Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil menambahkan administrator !!.. || username ='.$r->username.' || Password = '.$r->password.' ||']);

        return redirect()->back();
    }

    public function dataFish() {
        $fishs = \App\Models\Tbl_user_fish::all();

        return view('backend.admin.list_ikan', ['data_fish' => $fishs]);
    }

    public function printStickerFish($id){
        $fish = \App\Models\Tbl_user_fish::find($id);
        // dd($fish);
        return view('backend.pdf.test', ['fish' => $fish]);
        // $pdf = PDF::loadView('backend.pdf.test', ['fish' => $fish]);
        // return $pdf->stream($id.'-file.pdf');
    }

    public function setupUserPass() {

        $peserta = \App\User::where('role_id', 3)->get();

        return view('backend.admin.c_pass_user', ['data_peserta' => $peserta]);
    }

    public function updatePass(Request $r) {
        if ($r->has('user_id')) {
            $user_id = $r->user_id;
            $user = \App\User::find($user_id);
            $user->password = bcrypt($r->password);
            $user->save();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Pawword berhasil berubah, harap password disimpan dengan baik, password '.$user->name.' : '.$r->password]);
            return redirect()->back();
            
        } else {
            $user_id = auth()->user()->id;
            $user = \App\User::find($user_id);
            $user->password = bcrypt($r->password);
            $user->save();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Pawword berhasil berubah, harap password disimpan dengan baik, password '.$user->name.' : '.$r->password]);
            return redirect()->route('logout');
        }

    }

    public function setupPass() {
        return view('backend.admin.change_password');
    }

    public function FishPoint() {
        $point = \App\Models\Tbl_fish_point::all();
            
        return view('backend.admin.fish_point', ['data_point' => $point]);
    }

    public function addFishPoint() {

        $fs = \App\User::where('role_id', 3)
                                        ->get();

        return view('backend.admin.add_fish_point', ['data_fish' => $fs]);

    }

    public function getFishByBio($id) {
        $fs = \App\Models\Tbl_user_fish::with('fish')
                                        ->where('bio_id', $id)
                                        ->where('status', 'LUNAS')
                                        ->get();

        // $res = "";                                        
        // foreach ($fs as $fish) {
        //     $res .= "<option value='".$fs->id."'>".$fs->fish->name." | ".$fs->fish_size."</option>";
        // }

        // echo $res;

        return response()->json($fs, 200);

    }

    public function storeFishPoint(Request $r) {
        // dd($r->all());
        $user = \App\Models\Tbl_bio::find($r->bio_id);

        $fish = \App\Models\Tbl_fish_point::where('user_fish_id', $r->fish_id)->count();

        if($fish != 0) {
            $fish = \App\Models\Tbl_fish_point::where('user_fish_id', $r->fish_id)->first();

            $new = \App\Models\Tbl_fish_point::find($fish->id);

            $new->point = $r->fish_point;
            $new->date = Carbon::now()->format('Y-m-d');
            $new->time = Carbon::now()->format('H:i:s');

            $new->save();

            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Point Di Update']);
            return redirect()->back();

        } else {
            $data_point = [
                'user_id' => $user->user_id,
                'user_fish_id' => $r->fish_id,
                'point' => $r->fish_point,
                'date' => Carbon::now()->format('Y-m-d'),
                'time' => Carbon::now()->format('H:i:s')            
            ];
        }

        // print_r($data_point);

        $store_fish = \App\Models\Tbl_fish_point::updateOrCreate($data_point);

        Session::flash('notif', ['type' => 'success', 'msg' => 'Point Berhasil Di Simpan']);

        return redirect()->back();

    }

    public function champion() {
        $champion = \App\Models\Tbl_fish_champion::all();
        return view('backend.admin.champion_list', ['data_champion' => $champion]);
    }
    
    public function addChampion() {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $fish = \App\Models\Tbl_user_fish::with(['fish', 'bio'])
                                            ->where('status', 'LUNAS')
                                            ->get();
        return view('backend.admin.add_champion', ['data_cat' => $cat, 'data_ikan' => $fish]);
    }

    public function getChampionCat($grade) {
        $cat = \App\Models\Tbl_cat_champion::where('grade', $grade)->get();
        return Response::json($cat);
    }
    
    public function getFishChampion($user_id) {
        $fish = \App\Models\Tbl_user_fish::with('fish')
                                            ->where('user_id', $user_id)
                                            ->where('status', 'LUNAS')
                                            ->get();
        return Response::json($fish);
    }

    public function storeFishChampion(Request $r) {

        
        $fish = \App\Models\Tbl_user_fish::find($r->user_fish_id);
        
        $point = \App\Models\Tbl_fish_point::where('user_fish_id', $fish->id)->first();

        // dd($point);
        if($point == null) {
            // Session::flash('notif', ['type' => 'error', 'msg' => 'Point Ikan no '.Mush::no_reg($fish->id).' Kosong silahkan di isi dan Ulangi Lagi']);
            // return redirect()->route('admin.champion');

            $fpoint = 1234;

        } else {

            $fpoint = $point->point;

        }

        $data_champion = [
            'user_fish_id'  => $fish->id,
            'user_id'   => $fish->user_id,
            'cat_id'    => $fish->cat_id,
            'champion_cat_id'   => $r->cat_id,
            'point_id'  => $fpoint,
            'date'  => Carbon::now()->format('Y-m-d'),
            'time'  => Carbon::now()->format('H:i:s'),
        ];

        DB::beginTransaction();

        $champion = \App\Models\Tbl_fish_champion::create($data_champion);

        if(!$champion) {
            DB::rollBack();
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menyimpan Data Champion, Ulangi Lagi']);
        } else {
            DB::commit();
            Session::flash('notif', ['type' => 'success', 'msg' => 'Data Champion Berhasil Tersimpan']);
        }
        return redirect()->route('admin.champion');

    }

    public function showFishChampion($id) {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $fish = \App\Models\Tbl_user_fish::with(['fish', 'bio'])
                                            ->where('status', 'LUNAS')
                                            ->get();
        $user = \App\User::where('role_id', 3)->get();
        $champ = \App\Models\Tbl_fish_champion::find($id);

        return view('backend.admin.show_champion', ['data_cat' => $cat, 'data_ikan' => $fish, 'champion' => $champ]);

    }

    public function updateFishChampion(Request $r,$id) {

        $champion = \App\Models\Tbl_fish_champion::find($id);

        $user_fish = \App\Models\Tbl_user_fish::find($r->user_fish_id);

        
        $champion->user_fish_id = $r->user_fish_id;
        $champion->user_id = $r->owner;
        $champion->cat_id = $user_fish->cat_id;
        $champion->champion_cat_id = $r->cat_id;
        $champion->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $update = $champion->save();

        if(!$update) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Update Data Champion, Ulangi Lagi']);
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Update Data Champion Berhasil!!']);
        }
        return redirect()->route('admin.champion');
    }

    public function addCatChampion() {
        $cat = \App\Models\Tbl_cat_champion::distinct()->get(['grade']);
        $position = \App\Models\Tbl_cat_champion::distinct()->get(['grade', 'cat_name']);
        return view('backend.admin.add_cat_champion', ['data_cat' => $cat, 'data_position' => $position]);
    }

    public function storeCatChampion(Request $r) {
        $data_cat = [
            'grade' => $r->grade,
            'cat_name' => $r->position,
            'cat_desk' => $r->desc
        ];

        $cat = \App\Models\Tbl_cat_champion::create($data_cat);

        if(!$cat) {
            Session::flash('notif', ['type' => 'error', 'msg' => 'Gagal Menyimpan Data Category Champion, Ulangi Lagi']);
            return redirect()->back();
        } else {
            Session::flash('notif', ['type' => 'success', 'msg' => 'Berhasil Menyimpan Data Category Champion!']);
            return redirect()->back();
        }
    }
}
