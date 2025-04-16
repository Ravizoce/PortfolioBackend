<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Education extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="educations", $fillable=[
        "degree_name",
        "board",
        "college",
        "start_date",
        "end_date",
        "content",
        "description",
        "gpa",
        "final_project",
    ];

    public function getAttribute($key)
    {
        if ($key == 'created_at') {
            return Carbon::parse(time: $this->attributes['created_at'])->diffForHumans();
        }
        if ($key == 'start_date') {
            return Carbon::parse(time: $this->attributes['created_at'])->format('j-M-Y');
        }
        if ($key == 'end_date') {
            return Carbon::parse(time: $this->attributes['created_at'])->format('j-M-Y');
        }
        return parent::getAttribute($key);
    }
}
