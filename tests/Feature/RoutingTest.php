<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testBasicRouting()
    {
        $this->get('/profile')
            ->assertStatus(200)
            ->assertSeeText("Halo bang!");
    }

    public function testRedirect()
    {
        $this->get('/web')
            ->assertRedirect('/profile');
    }

    public function testFallback()
    {
        $this->get('/404')
            ->assertSeeText("page not found");

        $this->get('/ngarang')
            ->assertSeeText("page not found");
    }


}
