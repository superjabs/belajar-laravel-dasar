<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileStorageTest extends TestCase
{
    public function testFileStorage()
    {
        $filesystem = Storage::disk('local');
        $filesystem->put('file.txt', 'alfian tampan');

        self::assertEquals('alfian tampan', $filesystem->get('file.txt'));
    }

    public function testLinkStorage()
    {
        $filesystem = Storage::disk('public');
        $filesystem->put('file.txt', 'alfian tampan');

        self::assertEquals('alfian tampan', $filesystem->get('file.txt'));
    }
}
