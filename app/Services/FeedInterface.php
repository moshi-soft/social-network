<?php

namespace App\Contracts;

interface FeedInterface
{
    public function getFeeds(string $person_id);

    function _feedsOfFollowingPersons(string $person_id);

    function _feedsOfFollowingPages(string $page_id);


}
