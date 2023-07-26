<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {

        // manual
        $config = $this->app->make("config");
        $person3 = $config->get("contoh.author.first");
        // helper function
        $person1 = config("contoh.author.first");
        // facade
        $person2 = Config::get("contoh.author.first");

        self::assertEquals($person1, $person3);

    }

    public function testFacadeMock()
    {
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn("Alfian tampan");

        $firstName = Config::get("contoh.author.first");

        self::assertEquals("Alfian tampan", $firstName);
    }

}
