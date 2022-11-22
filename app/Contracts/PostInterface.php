<?php

namespace App\Contracts;

interface PostInterface
{
    public function createPostForPerson(string $post_content);

    public function createPostForPage(string $page_id,string $post_content);

}
