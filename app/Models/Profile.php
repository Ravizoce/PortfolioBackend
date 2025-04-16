<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Profile extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "greating",
        "full_name",
        "level",
        "tag_line",
        "tag_line2",
        "about",
        "image_url"
    ];
    
    public function getAttribute($key)
    {
        if ($key == 'created_at') {
            return Carbon::parse(time: $this->attributes['created_at'])->diffForHumans();
        }
        return parent::getAttribute($key);
    }

}
