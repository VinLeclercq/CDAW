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
        $films = film::with('category')->get();

        return view('medias', ["films" => $films]);
    }

    public function getOneFilm()
    {
        $film = film::where('id', 1)->with('category')->get();

        return view('medias', ["films" => $film]);
    }

    public function formCreateFilm()
    {
        $categories = Category::all();
        return view('nouveauMedia', ["categories" => $categories]);
    }

    public function createFilm(Request $request)
    {
        var_dump($request);

        $name = $request->input("name");
        $director = $request->input("director");
        $category_id = $request->input("category");

        $data = [
            "name" => $name,
            "director" => $director,
            "category_id" => $category_id,
        ];


        Film::create($data);

        return redirect('/films');

    }

}
