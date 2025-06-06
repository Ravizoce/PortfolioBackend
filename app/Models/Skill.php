<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "name",
        "slug",
        "type",
        "group",
        "icon_tag",
        "icon_svg",
    ];

    // public function project(){
    //     return $this->belongsToMany()
    // }
}
