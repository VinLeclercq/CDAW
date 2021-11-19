<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\film;

class listeMediasController extends Controller
{
    public function getListeMedias()
    {
        return view('listeMedias');
    }

    public function getListeMediasWithParameters($type, $annee)
    {
        echo $type.$annee;
        return view('listeMedias', ['type' => $type, 'annee' => $annee]);
    }

    public function getCategories()
    {
        $categories = Category::all();
        return view('listeCategories', ["categories" => $categories]);
    }

    public function getAllFilms()
    {
        $film = film::with('category')->get();
        $data = ["film" => $film];

        return $data;
    }

}
