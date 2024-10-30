<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Photo;
use Illuminate\Http\Request;

class Photo360Controller extends Controller
{

    public function image360($id)
    {
       return view('web-page.Photo360');
    }

    public function image360_1($id)
    {
        $photo = Photo::find($id);
        $images = Image::where('photo_id', $id)->get();

        if ($photo->image360_count == 1) {
            return view('web-page.Photo360', compact('photo', 'images'));
        } elseif ($photo->image360_count == 0) {
            abort(404);
        } else {
            return view('web-page.MultiplePhoto360', compact('photo', 'images'));
        }
    }
    public function photo()
    {
        $search = request()->input('search');
        $photosQuery = Photo::query();
        $photos = $photosQuery->get();

        if ($search) {
            $photos = $photosQuery->where('photo_name', 'LIKE', '%' . $search . '%')->get();
        }

        return view('web-page.photos', compact('photos'));
    }
}
