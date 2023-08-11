<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("hello response");
    }

    public function header(Request $request): Response
    {
        $body = [
            'firstName' => 'al',
            'lastName' => 'fian'
        ];
        return response($body, 200)
            ->header('content-type', 'application/json')
            ->withHeaders([
            'Author' => 'alfian',
                'App' => 'belajar laravel'
            ]);
    }

    public function responseView(Request $request): Response
    {
        return response()
            ->view('hello', ['name' => 'alfian']);
    }

    public function responseHeader(Request $request): Response
    {
        return response()
            ->view('hello', ['name' => 'alfian']);
    }


    public function responseJson(Request $request): JsonResponse
    {
        $body = [
            'firstName' => 'al',
            'lastName' => 'fian'
        ];
        return response()
            ->json($body);
    }
}
