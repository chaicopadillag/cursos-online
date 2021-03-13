<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    // realacion
    public function platform()
    {
        return $this->belongsTo(Platform::class);
    }

    // reclaion muchos a mcuhos

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    // relacion uno a uno polir
    public function resource()
    {
        return $this->morphOne(Resource::class, 'resourceable');
    }

    // relacion uno a mcuho poli
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function reactions()
    {
        return $this->morphMany(Reaction::class, 'reactionable');
    }
}
