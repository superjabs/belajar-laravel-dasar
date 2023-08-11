<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseTest extends TestCase
{
    
    public function testResponse()
    {
        $this->get('/response/hello')
            ->assertStatus(200)
            ->assertSeeText('hello response');
    }

    public function testHeader()
    {
        $this->get('response/header')
            ->assertSeeText('al')->assertSeeText('fian')
            ->assertStatus(200)
            ->assertHeader('Author', 'alfian')
            ->assertHeader('App', 'belajar laravel');
    }
    public function testView()
    {
        $this->get('/response/type/view')
            ->assertSeeText("Hello alfian");
    }

    public function testJson()
    {
        $this->get('/response/type/json')
            ->assertJson([
                "firstName" => 'al',
                "lastName" => "fian"
            ]);
    }

}
