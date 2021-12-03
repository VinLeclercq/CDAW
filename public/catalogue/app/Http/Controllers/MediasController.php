<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Media;
use App\Models\Person;
use App\Models\Playlist;

class MediasController extends Controller
{

    public function getAllMedias(Request $request)
    {
        $medias = Media::paginate(20);
        return view('mediasListe', ["medias" => $medias]);
    }

    public function getMediaDetails($mediaID)
    {
        $media = Media::find($mediaID);
        return view('mediaDetails', ["media" => $media]);
    }

    public function formCreateMedia()
    {
        $categories = Category::all();
        return view('mediaNouveau', ["categories" => $categories]);
    }

    public function createMedia(Request $request)
    {
        $name = $request->input("name");
        $type = $request->input("type");
        $duration = $request->input("duration");
        $release = $request->input("release");
        $synopsis  = $request->input("synopsis");
        $status = $request->input("status");
        $categories_id = $request->input("categories");

        $data = [
            "name" => $name,
            "duration_time" => $duration,
            "release_date" => $release,
            "description" => $synopsis,
            "type" => $type,
            "status" => $status,
        ];

        $media = Media::create($data);

        if($categories_id != NULL)
        {
            foreach($categories_id as $c_id)
            {
                $c = Category::find($c_id);
                $media->categories()->attach($c);
            }
        }
        
        return redirect('/medias');
    }

    public function formModifyMedia($mediaId)
    {
        $categories = Category::all();
        $media = Media::find($mediaId);
        return view('mediaModifier', ["categories" => $categories, "media" => $media]);
    }

    public function modifyMedia(Request $request, $mediaId)
    {
        $media = Media::find($mediaId);
        $media->categories()->detach();

        $name = $request->input("name");
        $type = $request->input("type");
        $duration = $request->input("duration");
        $release = $request->input("release");
        $synopsis  = $request->input("synopsis");
        $status = $request->input("status");
        $categories_id = $request->input("categories");

        $data = [
            "name" => $name,
            "duration_time" => $duration,
            "release_date" => $release,
            "description" => $synopsis,
            "type" => $type,
            "status" => $status,
        ];

        Media::find($mediaId)->update($data);

        foreach($categories_id as $c_id)
        {
            $c = Category::find($c_id);
            $media->categories()->attach($c);
        }
        
        return redirect('/medias');
    }

    public function deleteMedia($mediaId)
    {
        $media = Media::find($mediaId);
        $media->delete();
        return redirect('/medias');
    }

}
