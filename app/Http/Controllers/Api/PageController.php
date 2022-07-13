<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // creo la function index e all'interno prendo l'elenco dei post e restituisco il json

    public function index(){

        $posts = Post::all();

        return response()->json(compact('posts'));
    }
}
