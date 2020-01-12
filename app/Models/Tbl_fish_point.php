<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_fish_point extends Model
{
    protected $fillable = ['user_fish_id', 'user_id', 'point', 'date', 'time', 'created_at', 'updated_at'];
}
