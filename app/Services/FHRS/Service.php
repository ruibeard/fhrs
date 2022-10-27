<?php

namespace App\Services\FHRS;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Service
{
    public function __construct(
        private string $baseUri,
        private int $timeout
    ) {
    }

    public function establishements()
    {
        $request = $this->buildRequest();

        $response = $request->get(url: $this->baseUri.'Establishments');

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response;
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
            ->timeout(30);
    }
}