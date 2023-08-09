<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    public function testCreateSession()
    {
        $this->get('/session/create')
            ->assertSeeText('OK')
            ->assertSessionHas('userId', 'alfian')
            ->assertSessionHas('isMember', true);
    }

    public function testGetSession()
    {
        $this->withSession([
            'userId' => 'alfian',
            'isMember' => 'true'
        ])->get('/session/get')
        ->assertSeeText('alfian')->assertSeeText('true');
    }
}
