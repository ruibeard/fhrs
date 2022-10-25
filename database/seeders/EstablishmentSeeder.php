<?php

namespace Database\Seeders;

use App\Models\Establishment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstablishmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $est = [
            "FHRSID"                   => 733619,
            "LocalAuthorityBusinessID" => "8970",
            "BusinessName"             => "All that Sparkles",
            "BusinessTypeID"           => 1,
            "AddressLine1"             => "",
            "AddressLine2"             => "213 Manchester New Road",
            "AddressLine3"             => "Middleton",
            "AddressLine4"             => "Manchester",
            "PostCode"                 => "M24 1JT",
            "Phone"                    => "",
            "RatingValue"              => "4",
            "RatingDate"               => "2020-08-22T00:00:00",
            "LocalAuthorityName"       => "Rochdale",

            "Hygiene"                => 0,
            "Structural"             => 5,
            "ConfidenceInManagement" => 5,


            "longitude" => "-2.201418",
            "latitude"  => "53.539855",

        ];

        $est2 = [

            "FHRSID"                   => 331093,
            "LocalAuthorityBusinessID" => "1057647",
            "BusinessName"             => "The Orangery",
            "BusinessTypeID"           => 1,
            "AddressLine1"             => "North Manchester General Hospital",
            "AddressLine2"             => "Delaunays Road",
            "AddressLine3"             => "Manchester",
            "AddressLine4"             => "",
            "PostCode"                 => "M8 5RB",
            "Phone"                    => "",
            "RatingValue"              => "5",
            "RatingDate"               => "2017-02-02T00:00:00",
            "LocalAuthorityName"       => "Manchester",
            "Hygiene"                  => 5,
            "Structural"               => 5,
            "ConfidenceInManagement"   => 5,
            "longitude"                => "-2.229502",
            "latitude"                 => "53.517891",
        ];

        $est3 = [
            "FHRSID"                   => 123263,
            "LocalAuthorityBusinessID" => "5173",
            "BusinessName"             => "Sugar Shack",
            "BusinessTypeID"           => 1,
            "AddressLine1"             => "",
            "AddressLine2"             => "673 Manchester Old Road",
            "AddressLine3"             => "Middleton",
            "AddressLine4"             => "Manchester",
            "PostCode"                 => "M24 4GF",
            "Phone"                    => "",
            "RatingValue"              => "3",
            "RatingDate"               => "2022-06-07T00:00:00",
            "LocalAuthorityName"       => "Rochdale",
            "Hygiene"                  => 10,
            "Structural"               => 10,
            "ConfidenceInManagement"   => 10,
            "longitude"                => "-2.227526",
            "latitude"                 => "53.543062",

        ];
        Establishment::create($est);
        Establishment::create($est2);
        Establishment::create($est3);
    }
}
