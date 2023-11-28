<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AffiliatesTest extends TestCase
{
    use RefreshDatabase;

    public function test_affiliates_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/affiliates');

        $response->assertStatus(200);
    }
}
