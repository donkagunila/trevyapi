<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

use App\Http\Resources\AlbumResource as AlbumResource;

class AlbumController extends Controller
{
    public function getAlbums()
    {
    	$albums = Album::get();
    	return AlbumResource::collection($albums);
    }

    public function store(Request $request)
    {
    	 $request->validate([
            'title' => 'required',
        ]);

    	$album = Album::create($request->all());

    	 return response()->json([
            'message' => 'Great success! New album created',
            'album' => $album
        ]);
    }
}
