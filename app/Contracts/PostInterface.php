<?php

namespace App\Contracts;

interface PostInterface
{
    public function createPostForPerson(string $post);

    public function createPosForPage(string $page_id,string $post);

}
