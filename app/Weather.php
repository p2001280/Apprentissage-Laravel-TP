<?php

namespace App;

use Illuminate\Contracts\Cache\Repository as Cache;

class Weather
{
    protected $cache;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    public function isSunnyTomorrow(): bool
    {
        $weather = $this->cache->get('weather');

        // Logique simple pour l'exemple
        if ($weather === null) {
            return true;
        }

        return $weather === 'sunny';
    }
}
