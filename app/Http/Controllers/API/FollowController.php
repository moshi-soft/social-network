<?php

namespace App\Http\Controllers\API;

use App\Contracts\FollowInterface;
use App\Http\Controllers\Controller;

class FollowController extends Controller
{
    protected FollowInterface $follow;

    public function __construct(FollowInterface $follow)
    {
        $this->follow = $follow;
    }

    public function followPerson($personId)
    {
        if ($this->follow->_isFollowingSelectedPerson(personId: $personId)) {
            return response()->error("The person has already been followed ", [], 422);
        }
        try {
            return response()->success('Successfully following people', $this->follow->followPerson($personId), 201);
        } catch (\Exception $exception) {
            return response()->error("Couldn't follow person: " . $exception->getMessage(), [], 422);
        }
    }

    public function followPage($pageId)
    {
        if ($this->follow->_isFollowingSelectedPage(pageId: $pageId)) {
            return response()->error("The person has already been followed ", [], 422);
        }
        try {
            return response()->success('Successfully following page', $this->follow->followPage($pageId), 201);
        } catch (\Exception $exception) {
            return response()->error("Couldn't follow page: " . $exception->getMessage(), [], 500);
        }
    }
}
