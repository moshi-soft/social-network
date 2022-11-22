<?php

namespace App\Services;

use App\Contracts\FeedInterface;
use App\Models\Follower;
use App\Models\User;

class FeedService implements FeedInterface
{
    public function getFeeds()
    {
        return User::with('postsAsFeeds')
            ->where('id', '=', auth()->id())
            ->first()?->toArray();
    }
}
