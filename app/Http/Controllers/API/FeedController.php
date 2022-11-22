<?php

namespace App\Http\Controllers\API;

use App\Contracts\FeedInterface;
use App\Contracts\FollowInterface;
use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{
    protected FeedInterface $feed;

    public function __construct(FeedInterface $feed)
    {
        $this->feed = $feed;
    }

    public function feeds()
    {
        try {
            return response()->success('Success', $this->feed->getFeeds()['posts_as_feeds'], 200);
        } catch (\Exception $exception) {
            return response()->error("Couldn't retrive feeds: " . $exception->getMessage(), [], 500);
        }
//        DB::connection()->enableQueryLog();
//        $abc = User::with('postsAsFeeds')
//            ->where('id','=',auth()->id())
//            ->get()
//            ->toArray()
//        ;
//        dd(DB::getQueryLog());
//        return $abc;
    }
}
