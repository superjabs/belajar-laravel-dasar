<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookieTest extends TestCase
{
    public function testCookie()
    {
        $this->get('/cookie/set')
            ->assertSeeText('Hello Cookie')
            ->assertCookie('User-Id', 'alfian')
            ->assertCookie('Is-Member', 'true');
    }

    public function testGetCookie()
    {
        $this->withCookie('User-Id', 'alfian')
            ->withCookie('Is-Member', 'true')
            ->get('/cookie/get')
            ->assertJson([
                'userId' => 'alfian',
                'isMember' => 'true'
            ]);
    }

}
