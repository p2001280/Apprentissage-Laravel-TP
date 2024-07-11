<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Cache;
use Illuminate\Contracts\Cache\Repository; // Assurez-vous que ce namespace est correct
use Tests\TestCase;
use App\Weather; // Assurez-vous que ce namespace est correct
use Mockery;

class WeatherTest extends TestCase
{
    protected function tearDown(): void {
        parent::tearDown();
        Cache::clearResolvedInstances();
        Mockery::close(); // Ajoutez cette ligne pour fermer Mockery après chaque test
    }

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $mock = \Mockery::mock(Repository::class);
        $mock->shouldReceive('get')
            ->with('weather')
            ->once()
            ->andReturn(null);

        $weather = new Weather($mock);
        $this->assertTrue($weather->isSunnyTomorrow());
    }
}
