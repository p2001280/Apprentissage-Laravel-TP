<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Weather;
use Mockery\MockInterface; 

class WeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->partialMock(Weather::class, function (MockInterface $mock) {
            $mock->shouldReceive('isSunnyTomorrow')->once()->andReturn(true);
        });
        
        $response = $this->get('/api/weather');
        $response->assertOk();
        $response->assertJsonPath('weather', 'sunny');
    }

    public function test_with_bad_weather(): void
    {
        $this->partialMock(Weather::class, function (MockInterface $mock) {
            $mock->shouldReceive('isSunnyTomorrow')->once()->andReturn(false);
        });
        
        $response = $this->get('/api/weather');
        $response->assertOk();
        $response->assertJsonPath('weather', 'rainy');
    }
}
