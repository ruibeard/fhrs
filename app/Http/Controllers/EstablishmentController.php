<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstablishmentRequest;
use App\Http\Requests\UpdateEstablishmentRequest;
use App\Http\Resources\BusinessResource;
use App\Models\Establishment;
use App\Services\FHRS\Service;

class EstablishmentController extends Controller
{

    public function __invoke()
    {
        $service = resolve(Service::class);

        foreach ($service->establishements() as $item) {
            Establishment::updateOrCreate($this->mapFields($item));
        }
        return view('welcome')->with('establishments', Establishment::all());
    }

    public function mapFields(mixed $item): array
    {
        return [
            'FHRSID'                   => $item->FHRSID,
            'LocalAuthorityBusinessID' => $item->LocalAuthorityBusinessID,
            'BusinessName'             => $item->BusinessName,
            'BusinessTypeID'           => $item->BusinessTypeID,
            'AddressLine1'             => $item->AddressLine1,
            'AddressLine2'             => $item->AddressLine2,
            'AddressLine3'             => $item->AddressLine3,
            'AddressLine4'             => $item->AddressLine4,
            'Phone'                    => $item->Phone,
            'PostCode'                 => $item->PostCode,
            'RatingValue'              => $item->RatingValue,
            'RatingDate'               => $item->RatingDate,
            'LocalAuthorityName'       => $item->LocalAuthorityName,
            'Hygiene'                  => $item->scores->Hygiene,
            'Structural'               => $item->scores->Structural,
            'ConfidenceInManagement'   => $item->scores->ConfidenceInManagement,
            'longitude'                => $item->geocode->longitude,
            'latitude'                 => $item->geocode->latitude,
        ];
    }
}
