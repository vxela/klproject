<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_bio extends Model
{
    protected $fillable = ['user_id', 'nama', 'no_hp', 'email', 'alamat', 'prov', 'kota', 'created_at', 'updated_at'];

}