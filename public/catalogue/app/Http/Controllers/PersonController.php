<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function getAllPeople()
    {
        $people = Person::paginate(50);
        return view('personnesListe', ["people" => $people]);
    }

    public function getPersonDetails($idPerson)
    {
        $person = Person::find($idPerson);
        return view('personneDetails', ["person" => $person]);
    }
}