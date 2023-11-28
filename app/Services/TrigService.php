<?php

namespace App\Services;

use App\Support\Constants\AstronomicalConstants;

class TrigService {

    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * calculate the arclength between two points on surface of Earth
     * 
     * @return float
     */
    public function arcLength($pointACoordinates, $pointBCoordinates): float {
        return AstronomicalConstants::RADIUS_OF_EARTH * $this->sphericalLawOfCosines($pointACoordinates, $pointBCoordinates);
    }

    /**
     * calculate the angle between two points on surface of sphere
     * 
     * @return float
     */
    public function sphericalLawOfCosines($pointACoordinates, $pointBCoordinates): float {
        $absLongitudeDiff = abs($pointACoordinates[1] - $pointBCoordinates[1]);
        return acos(sin($pointACoordinates[0]) * sin($pointBCoordinates[0]) + cos($pointACoordinates[0]) * cos($pointBCoordinates[0]) * cos($absLongitudeDiff));
    }

}