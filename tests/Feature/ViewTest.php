<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $this->get('/hello')
            ->assertSeeText('Hello alfian');
        
        $this->get('/hello-again')
            ->assertSeeText('Hello again mr alfian');
    }

    public function testViewNested()
    {
        $this->get('/hello-world')
            ->assertSeeText("Good morning");
    }

    // testing without routes
    public function testViewWithoutRoute()
    {
        $this->view('hello', ['nama' => 'alfian'])
                ->assertSeeText('Hello alfian');
    }
}
