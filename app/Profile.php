<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function avatar()
    {
        return '/storage/avatars/default.png';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
