<?php

namespace App\Contracts;

interface FollowerInterface
{
    public function followPerson(string $person_id);

    public function followPage(string $page_id);

}
