<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_regular_champion extends Model
{
    protected $fillable = [
        'cat_reg_id', 'fish_id', 'created_at', 'updated_at'
    ];

    public function cat_regular() {
        return $this->hasOne('\App\Models\Tbl_cat_regular');
    }

    public function peserta() {
        return \App\Models\Tbl_user_fish::find($this->fish_id);
    }
    public function cat_reg() {
        return \App\Models\Tbl_cat_regular::find($this->cat_reg_id);
    }
}
