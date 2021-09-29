<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{



    public function index()
    {
        $populerActors = Http::get('https://api.themoviedb.org/3/person/popular?api_key=f958e6097122210494dc1b4b7c9f0076')
            ->json()['results'];





        return view('actors.index', compact('populerActors'));
    }


}
