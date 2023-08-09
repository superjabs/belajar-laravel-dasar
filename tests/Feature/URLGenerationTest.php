<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLGenerationTest extends TestCase
{
    public function testCurrentUrl()
    {
        $this->get('/url/current')
            ->assertSeeText('/url/current');
    }

    // optional
    // public function testFullUrl()
    // {
    //     $this->get('/url/current?name=alfian')
    //         ->assertSeeText('/url/current?name=alfian');
    // }

    public function testNamed()
    {
        $this->get('/url/named')
            ->assertSeeText('/redirect/name/alfian');
    }

    public function testAction()
    {
        $this->get('/url/action')
            ->assertSeeText('/from');
    }

}
