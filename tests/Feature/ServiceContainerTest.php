<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloService;
use App\Services\HelloServiceIndonesia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceContainerTest extends TestCase
{
    // // make(), no param
    // public function testDependency()
    // {
    //     $foo1 = $this->app->make(Foo::class);
    //     $foo2 = $this->app->make(Foo::class);

    //     self::assertEquals('Foo', $foo1->foo());
    //     self::assertEquals('Foo', $foo2->foo());
    //     self::assertNotSame($foo1, $foo2);
    // }

    // // bind() with param & different object instace value
    // public function testBind()
    // {
    //     // wrong way!!
    //     // $person = $this->app->make(Person::class);
    //     // self::assertNotNull($person);

    //     // right way
    //     $this->app->bind(Person::class, function($app){
    //         return new Person('al', 'fian');
    //     });

    //     $person1 = $this->app->make(Person::class);
    //     $person2 = $this->app->make(Person::class);


    //     self::assertEquals('al', $person1->firstName);
    //     self::assertEquals('al', $person2->firstName);
    //     self::assertNotSame($person1, $person2);
    // }

    // // singleton same like bind but the instace is a same object
    // public function testSingleton()
    // {
    //     $this->app->singleton(Person::class, function($app){
    //         return new Person('al', 'fian');
    //     });

    //     $person1 = $this->app->make(Person::class);
    //     $person2 = $this->app->make(Person::class);
    //     self::assertEquals('al', $person1->firstName);
    //     self::assertEquals('al', $person2->firstName);
    //     self::assertSame($person1, $person2);
    // }

    // // instace same like bind but use instace for param instead clousre func
    // public function testInstace()
    // {

    //     $person = new Person('al', 'fian');
    //     $this->app->instance(Person::class, $person);

    //     $person1 = $this->app->make(Person::class);
    //     $person2 = $this->app->make(Person::class);


    //     self::assertEquals('al', $person1->firstName);
    //     self::assertEquals('al', $person2->firstName);
    //     self::assertSame($person1, $person2);
    // }

    // // dependency injection with two singleton  
    // public function testDependencyInjection()
    // {

    //     $this->app->singleton(Foo::class, function($app){
    //         return new Foo();
    //     });

    //     $this->app->singleton(Bar::class, function($app){
    //         $foo = $app->make(Foo::class);
    //         return new Bar($foo);
    //     });

    //     $foo = $this->app->make(Foo::class);
    //     $bar1 = $this->app->make(Bar::class);
    //     $bar2 = $this->app->make(Bar::class);

    //     self::assertSame($foo, $bar1->foo);

    //     self::assertSame($bar1, $bar2);
    // }


    // test interface
    public function testInterfaceToClass()
    {

        // 1. singleton with interface and class
        // $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        // 2. singleton with interface and closure function for complex class parent constructor
        $this->app->singleton(HelloService::class, function($app){
            return new HelloServiceIndonesia();
        });


        $helloService = $this->app->make(HelloService::class);
        self::assertEquals('Halo alfian', $helloService->hello('alfian'));
    }

}
