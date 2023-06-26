<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig(){
     $first_name = config("contoh.author.first_name");
     $last_name = config("contoh.author.last_name");
     $email = config("contoh.email");
     $web = config("contoh.web");

    self::assertEquals("al", $first_name);
    self::assertEquals("fian", $last_name);
    self::assertEquals("gusjabungaf@gmail.com", $email);
    self::assertEquals("alfiansy.dev", $web);

    }
}
