<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\Link\LinkDataResource;
use App\Http\Requests\Link\CreateRequest;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Link\CallRequest;
use App\Http\Controllers\Controller;
use App\Repositories\LinkRepository;

class LinkController extends Controller
{
    /**
     * @var LinkRepository
     */
    private $repository;

    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function create(CreateRequest $request)
    {
        $link = $this->repository->createLink($request->link);
        return Response::ok(["link" => new LinkDataResource($link)]);
    }

    /**
     * @param CallRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function call(CallRequest $request)
    {
        $redirectPath = $this->repository->callLink($request->short);
        return redirect()->away($redirectPath->link);
    }
}
