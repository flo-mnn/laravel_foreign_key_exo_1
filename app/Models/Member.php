<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    public function genders()
    {
        return $this->belongsTo(Gender::class,'gender_id');
    }
}
