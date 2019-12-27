<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_user_fish extends Model
{
    //
    protected $table = 'tbl_user_fishs';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bio() {
        return $this->belongsTo('App\Models\Tbl_bio');
    }

    public function fish() {
        return $this->hasOne('App\Models\Tbl_fish', 'id', 'fish_id');
    }

    public function cat() {
        return $this->hasOne('App\Models\Tbl_cat', 'id', 'cat_id');
    }

}
