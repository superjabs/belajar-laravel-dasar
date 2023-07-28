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
    //     $this->post('input/hello/input', [
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
    //     $this->post('input/hello/array', [
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

    public function testInputQuery(){
        $this->post('input/hello/query', [
            'name' => 'alfian'
        ])->assertSeeText('alfian');
    }

}
