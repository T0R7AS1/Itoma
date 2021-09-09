<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function employe(){
        return $this->hasMany('App\Models\Employe', 'id', 'id');
    }
}
