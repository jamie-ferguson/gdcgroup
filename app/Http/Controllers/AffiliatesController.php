<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\FileService;
use App\Services\TrigService;


class AffiliatesController extends Controller
{
    /**
     * Instance vars
     */

    var $affiliateFilePath;
    var $distance;
    var $maxDistanceFromDublinOffice;
    var $dublinOfficeCoordinates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->affiliateFilePath = 'public/affiliates.txt';
        $this->distance = 100;
        $this->maxDistanceFromDublinOffice = $this->distance * 1000;
        $this->dublinOfficeCoordinates = [deg2rad(53.3340285), deg2rad(-6.2535495)];
    }

    /**
     * Display a list of the affiliates within a certain distance from Dublin office.
     */
    public function getAffiliatesByDistance(Request $request): View
    {
        $fileService = new FileService($this->affiliateFilePath);
        $data['fileExists'] = $fileService->fileExists();
        if ($data['fileExists']) {
            $affiliatesWithinDistance = [];

            $trigService = new TrigService();
            $affiliates = $fileService->readTxtFileWithObjects();
            foreach ($affiliates as $affiliate) {
                $affiliateCoordinates = [deg2rad($affiliate->latitude), deg2rad($affiliate->longitude)];
                $distance = $trigService->arcLength($this->dublinOfficeCoordinates, $affiliateCoordinates);
                if ($distance <= $this->maxDistanceFromDublinOffice) {
                    // take a note of the distance (in km) for display purposes
                    $affiliate->distance = number_format($distance / 1000, 3, '.', '') . ' km';
                    $affiliatesWithinDistance[] = $affiliate;
                }
            }

            // sort the array by affiliate ID (ascending)
            usort($affiliatesWithinDistance, fn($a, $b) => $a->affiliate_id - $b->affiliate_id);

            $data['distance'] = $this->distance;
            $data['affiliatesWithinDistance'] = $affiliatesWithinDistance;
        }

        return view('affiliates.list', $data);
    }
}
