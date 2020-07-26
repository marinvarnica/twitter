<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->tweetsFromFollowing()->paginate(5);
        return new TweetCollection($tweets);
    }
}
