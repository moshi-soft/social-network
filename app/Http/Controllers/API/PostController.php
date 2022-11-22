<?php

namespace App\Http\Controllers\API;

use App\Contracts\PostInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateToPageRequest;
use App\Http\Requests\PostCreateToPersonRequest;

class PostController extends Controller
{
    protected PostInterface $post;

    public function __construct(PostInterface $post)
    {
        $this->post = $post;
    }

    public function createPostForPerson(PostCreateToPersonRequest $request)
    {
        try {
            return response()->success('Post created Successfully', $this->post->createPostForPerson(
                $request->validated()['post_content']), 201
            );
        } catch (\Exception $exception) {
            return response()->error("Couldn't create post: " . $exception->getMessage(), [], 422);
        }
    }

    public function createPostForPage(PostCreateToPageRequest $request, $page_id)
    {
        try {
            return response()->success('Post created Successfully', $this->post->createPostForPage(
                $page_id, $request->validated()['post_content']), 201
            );
        } catch (\Exception $exception) {
            return response()->error("Couldn't create post: " . $exception->getMessage(), [], 422);
        }
    }
}
