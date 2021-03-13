<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // relacion uno muchos
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
