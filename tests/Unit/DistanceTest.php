<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\TrigService;

class DistanceTest extends TestCase
{
    public function test_distance_calculation_london_to_paris(): void
    {
        $londonCoordinates = [deg2rad(51.5072), deg2rad(0.1276)];
        $parisCoordinates = [deg2rad(48.8566), deg2rad(2.3522)];
        $distanceLondonToParis = 334563;

        $trigService = new TrigService();
        $distance = $trigService->arcLength($londonCoordinates, $parisCoordinates);
        
        $this->assertEquals($distanceLondonToParis, round($distance));
    }
}
