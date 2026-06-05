<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLinkRequest;
use App\Services\LinksService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class LinksController extends Controller
{
    public function __construct(private LinksService $linksService)
    {
    }

    public function store(CreateLinkRequest $createLinkRequest): JsonResponse
    {
        $link = $this->linksService->createLink($createLinkRequest->url);

        return new JsonResponse([
            'code' => $link->code,
            'short_url' => url('/' . $link->code),
        ]);
    }

    public function redirect(string $code): RedirectResponse
    {
        $link = $this->linksService->getLinkByCode($code);

        return redirect()->away($link->url);
    }

    public function stats(string $code): JsonResponse
    {
        $link = $this->linksService->getLinkByCode($code);

        return new JsonResponse([
            'url' => $link->url,
            'code' => $link->code,
            'clicks' => $link->clicks,
            'created_at' => $link->created_at,
        ]);
    }
}
