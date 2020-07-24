<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function followers()
    {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }
}
