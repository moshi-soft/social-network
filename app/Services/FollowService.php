<?php

namespace App\Services;

use App\Contracts\FollowInterface;
use App\Models\Follower;
use App\Models\Page;
use App\Models\User;

class FollowService implements FollowInterface
{
    public function followPerson(string $person_id)
    {
        //dd($person_id);
        $user = User::findOrFail($person_id);
        return $user->followers()->create([
            'follower_id' => auth()->id(),
            //'status' => 'Active', // default
        ]);
    }

    public function followPage(string $page_id)
    {
        $page = Page::where('id', '=', $page_id)->firstOrFail();
        return $page->followers()->create([
            'follower_id' => auth()->id(),
            //'status' => 'Active', // default
        ]);
    }

    function _isFollowingSelectedPerson(string $personId)
    {
        return Follower::where('follower_id', '=', auth()->id())->where('followable_id', '=', $personId)->count();
    }

    function _isFollowingSelectedPage(string $pageId)
    {
       return Follower::where('follower_id', '=', auth()->id())->where('followable_id', '=', $pageId)->count();
    }

}
