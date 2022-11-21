<?php

namespace App\Services;

use App\Contracts\PageInterface;
use App\Models\Page;

class PageService implements PageInterface
{
    public function create(string $page_name)
    {
        return Page::create([
            'page_name' => $page_name,
            'owner_id' => auth()->id(),
            //'status' => 'Active', // default
        ]);
    }

}
