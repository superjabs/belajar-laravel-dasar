<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputTest extends TestCase
{
    // public function testInput()
    // {
    //     $this->get('/input/hello?name=alfian',)
    //         ->assertSeeText('Hello alfian');

    //     $this->post('/input/hello', [
    //         'name' => 'alfian'
    //     ])->assertSeeText('Hello alfian');
    // }

    // public function testNestedInput()
    // {
    //     $this->post('/input/hello/first', [
    //         'name' =>
    //         [
    //             'first' => 'al',
    //             'last' => 'fian'
    //         ]
    //     ])->assertSeeText('Hello al');
    // }

    // public function testHelloInput()
    // {
    //     $this->post('/input/hello/input', [
    //         'name' =>
    //         [
    //             'first' => 'al',
    //             'last' => 'fian'
    //         ]
    //     ])->assertSeeText('name')->assertSeeText('first')->assertSeeText('last')
    //         ->assertSeeText('al')->assertSeeText('fian');
    // }

    // public function testArrayInput()
    // {
    //     $this->post('/input/hello/array', [
    //         'products' => [
    //             [
    //                 'name' => 'keyboard',
    //                 'price' => 500000
    //             ],
    //             [
    //                 'name' => 'mouse',
    //                 'price' => 350000
    //             ]
    //         ]
    //     ])->assertSeeText('keyboard')->assertSeeText('mouse');
    // }

    // public function testInputQuery(){
    //     $this->post('/input/query', [
    //         'name' => 'alfian'
    //     ])->assertSeeText('alfian');
    // }

    // public function testInputType(){
    //     $this->post('/input/type', [
    //         'name' => 'alfian',
    //         'married' => 'false',
    //         'birth_date' => '2001-07-01'
    //     ])->assertSeeText('alfian')->assertSeeText('false')->assertSeeText('2001-07-01');
    // }

    public function testFilterOnly()
    {
        $this->post('/input/type/only', [
            'name' => [
                'first' => 'al',
                'last' => 'fian',
                'role'  => 'president'
            ]
        ])->assertSeeText('al')->assertSeeText('fian')
        ->assertDontSeeText('president');
    }

    public function testFilterExcept()
    {
        $this->post('/input/type/except', [
            'name' => 'alfian',
            'password' => 'rahasia',
            'admin' => 'true'
        ])->assertSeeText('alfian')->assertSeeText('rahasia')
        ->assertDontSeeText('admin');
    }

    public function testFilterMerge()
    {
        $this->post('/input/type/merge', [
            'name' => 'alfian',
            'password' => 'rahasia',
            'admin' => 'true'
        ])->assertSeeText('alfian')->assertSeeText('rahasia')
        ->assertSeeText('false');
    }

}
