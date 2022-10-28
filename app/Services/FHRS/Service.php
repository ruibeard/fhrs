<?php

namespace App\Services\FHRS;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Service
{
    public function __construct(
        private readonly string $baseUri,
        private readonly int $timeout
    ) {
    }

    public function establishements()
    {
        $request = $this->buildRequest();

        $response = $request->get(
            url: $this->baseUri.'Establishments',
            query: [
                'pageSize'       => '2',
                'businesstypeId' => '1',
            ]);

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response->object()->establishments;
    }

    private function buildRequest(): PendingRequest
    {
        return Http::withHeaders(
            headers: [
                'Accept'          => 'application/json',
                'x-api-version'   => '2',
                'Accept-Language' => 'en-GB',
            ]
        )
            ->timeout($this->timeout);
    }
}