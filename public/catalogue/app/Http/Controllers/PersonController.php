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

    public function formAddPerson()
    {
        return view('personneNouveau');
    }

    public function addPerson(Request $request)
    {
        $data = [
            "name" => $request->input("name"),
        ];
        Person::create($data);
        return redirect("/medias");
    }

    public function formModifyPerson($personId)
    {
        $person = Person::find($personId);
        return view('personneModifier', ["person" => $person]);
    }

    public function modifyPerson(Request $request, $personId)
    {
        $person = Person::find($personId);

        $data = [
            "name" => $request->input("name"),
        ];

        $person->update($data);

        return redirect("/medias");
    }

    public function deletePerson($personId)
    {
        $person = Person::find($personId);
        $person->delete();
        return redirect("/medias");
    }
}