<?php

namespace App\Contracts;

interface FollowInterface
{
    public function followPerson(string $person_id);

    public function followPage(string $page_id);

    function _isFollowingSelectedPerson(string $personId);

    function _isFollowingSelectedPage(string $pageId);

}
