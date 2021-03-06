<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // relacion uno a muchos reverse

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
