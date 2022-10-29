<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Services\FHRS\Service;
use Illuminate\Http\Request;

class EstablishmentController extends Controller
{


    public function __invoke(Request $request)
    {
        $address = $request->get('address');
        $service = resolve(Service::class);

        foreach ($service->establishements($address) as $item) {
            Establishment::updateOrCreate($this->mapFields($item));
        }

        $establishments = Establishment::where('AddressLine3', $address)->orWhere('AddressLine4', $address)->get();

        return view('index')->with('establishments', $establishments);
    }

    private function mapFields(object $item): array
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
