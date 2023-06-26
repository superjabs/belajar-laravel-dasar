<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class EnvironmentTest extends TestCase
{
    public function testEnvironment(){
        if(App::environment("testing")){
            echo "LOGIC IN TESTING" . PHP_EOL;
            self::assertTrue(true);
        }
    }
}
