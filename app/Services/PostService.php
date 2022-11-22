<?php

namespace App\Services;

use App\Contracts\PostInterface;
use App\Models\Page;
use App\Models\User;

class PostService implements PostInterface
{
    public function createPostForPerson(string $post_content)
    {
        $user = User::find(auth()->id());
        return $user->posts()->create([
            'post_content' => $post_content,
            //'status' => 'Active', // default
        ]);
    }

    public function createPostForPage(string $page_id, string $post_content)
    {
        $page = Page::where('id','=',$page_id)->where('owner_id','=',auth()->id())->firstOrFail();
        return $page->posts()->create([
            'post_content' => $post_content,
            //'status' => 'Active', // default
        ]);
    }

}
