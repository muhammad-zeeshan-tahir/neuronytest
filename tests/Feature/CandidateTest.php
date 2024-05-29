<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CandidateTest extends TestCase
{

    public function testSetUp()
    {
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
        $this->assertTrue(true);
    }

    public function testCandidateIndex(){

        $response = $this->get(route('candidates-list')); // Assuming '/' route returns the welcome view

        $response->assertStatus(200);
        $response->assertViewIs('candidates.index');

    }
}
