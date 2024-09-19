<?php

namespace App\Http\Controllers\Test_API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
       $client = new Client([
           'base_uri' => 'https://jsonplaceholder.typicode.com/posts',
           'timeout' => 2.0,
           'verify' => false,
       ]);
       $response = $client->request('GET', 'posts/1');

       $posts = json_decode($response->getBody(), true);
       dd($posts);
    }

}
