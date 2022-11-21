<?php

namespace App\Http\Controllers\API;

use App\Contracts\AuthenticationInterface;
use App\Contracts\PageInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageCreateRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PageController extends Controller
{
    protected PageInterface $page;

    public function __construct(PageInterface $page)
    {
        $this->page = $page;
    }

    public function create(PageCreateRequest $request)
    {
        try {
            return response()->success('Successfully page created', $this->page->create($request->validated()['page_name']), 201);
        } catch (\Exception $exception) {
            return response()->error("Couldn't create page: " . $exception->getMessage(), [], 422);
        }
    }
}
