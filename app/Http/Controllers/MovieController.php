<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class MovieController extends Controller
{

    public function index()
    {
        $populerMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=f958e6097122210494dc1b4b7c9f0076')
                        ->json()['results'];
        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=f958e6097122210494dc1b4b7c9f0076&language=en-US')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($genre){
            return [$genre['id']=>$genre['name']];
        });

        $nowPlayingMovies = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=f958e6097122210494dc1b4b7c9f0076&language=en-US&page=1')
            ->json()['results'];


        return view('index',[
            'populerMovies'=> $populerMovies,
            'genres'=> $genres,
            'nowPlayingMovies'=>$nowPlayingMovies

        ]);

    }




    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/'.$id.'?api_key=f958e6097122210494dc1b4b7c9f0076&language=en-US&append_to_response=credits%2Cvideos%2Cimages')
            ->json();


        return view('show',[
            'movie'=>$movie
        ]);
    }





}
