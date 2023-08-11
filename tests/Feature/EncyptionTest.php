<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

class EncyptionTest extends TestCase
{

    public function testEncryption()
    {
        $encyrpt = Crypt::encrypt('alfian');
        var_dump($encyrpt);

        $decrypt = Crypt::decrypt($encyrpt);

        self::assertEquals('alfian', $decrypt);
    }

}
