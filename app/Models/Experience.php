<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Experience extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        "designation",
        "company",
        "start_date",
        "end_date",
        "achievement",
        "description",
        "stack_used"
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
