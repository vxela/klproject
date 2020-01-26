<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbl_cat_regular extends Model
{
    protected $fillable = [
        'varietas_id', 'position', 'desk', 'created_at', 'updated_at'
    ];

    public function fish() {
        return \App\Models\Tbl_fish::find($this->varietas_id);
    }
}
