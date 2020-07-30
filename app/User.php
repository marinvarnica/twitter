<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function booted()
    {
        parent::booted();

        static::created(function (User $user){
            $user->profile()->create();
        });
    }

    public function avatar()
    {
        return '/storage/avatars/default.png';
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function following()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function tweetsFromFollowing()
    {
        $users = $this->following()->pluck('profile_id');

        return Tweet::whereIn('user_id', $users);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function hasLike(Tweet $tweet)
    {
        return $this->likes->contains('tweet_id', $tweet->id);
    }
}
