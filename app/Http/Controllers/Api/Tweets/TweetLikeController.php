<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Tweet;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet)
    {
        if(auth()->user()->hasLike($tweet))
        {
            return response(null, 409); //already exists
        }

        auth()->user()->likes()->create([
            'tweet_id' => $tweet->id
        ]);
    }

    public function destroy(Tweet $tweet)
    {
        auth()->user()->likes->where('tweet_id', $tweet->id)->first()->delete();
    }
}
