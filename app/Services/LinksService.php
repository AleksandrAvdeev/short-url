<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Support\Str;

class LinksService
{
    public function createLink(string $url): Link
    {
        $link = Link::query()->where('url', $url)->first();

        if (is_null($link)) {
            $link = Link::query()
                ->create([
                    'url' => $url,
                    'code' => $this->generateUniqueCode(),
                ]);
        }

        return $link;
    }

    private function generateUniqueCode(): string
    {
        $code = Str::random(6);
        $linkExists = Link::query()->where('code', $code)->exists();

        if ($linkExists) {
            return $this->generateUniqueCode();
        }

        return $code;
    }

    public function getLinkByCode(string $code): Link
    {
        $link = Link::query()->where('code', $code)->firstOrFail();

        $link->increment('clicks');

        return $link;
    }
}
