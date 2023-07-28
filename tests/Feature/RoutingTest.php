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

    // test route param
    public function testRouteParam()
    {
        $this->get('/products/1')
            ->assertSeeText('Products : 1');

        $this->get('/products/2')
            ->assertSeeText('Products : 2');

        $this->get('/products/1/items/XXX')
            ->assertSeeText('Products : 1, items : XXX');

        
        $this->get('/products/2/items/YYY')
            ->assertSeeText('Products : 2, items : YYY');

    }

    public function testParamRegex()
    {
        $this->get('/categories/100')
            ->assertSeeText('categories : 100');

        $this->get('/categories/alfian')
            ->assertSeeText('page not found');
    }

    public function testOptParam()
    {
        $this->get('/users/123')
            ->assertSeeText('users : 123');

        $this->get('/users/')
            ->assertSeeText('users : 404');
    }


    public function testConflictRouting()
    {
        $this->get('/conflict/eko')
            ->assertSeeText('conflict : eko');


        $this->get('/conflict/al')
            ->assertSeeText('conflict alfian');
    }

    public function testNamedRoute()
    {
        $this->get('/produk/10')
            ->assertSeeText('products/10');

        $this->get('/produk-redirect/123')
            ->assertSeeText('products/123');
    }

}
