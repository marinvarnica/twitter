<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
   protected $guarded = [];

   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function originalTweet()
   {
        return $this->belongsTo(Tweet::class, 'original_tweet_id', 'id');
   }
}
