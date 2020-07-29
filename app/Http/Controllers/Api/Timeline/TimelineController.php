<?php

namespace App\Http\Controllers\Api\Timeline;

use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;
use App\Http\Resources\TweetResource;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $tweets = auth()->user()
            ->tweetsFromFollowing()
            ->latest()
            ->with('user', 'likes')
            ->paginate(9);

        return new TweetCollection($tweets);
    }
}
