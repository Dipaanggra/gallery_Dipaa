<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
	public function index()
	{
		$albums = Album::all();
		return view('albums.index', compact('albums'));
	}

	public function create()
	{
		return view('albums.create');
	}

	public function show(Album $album)
	{
		$album = Album::findOrFail($album->id);
		return view('albums.show', compact('album'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'cover_image' => 'required|image|max:1999',
			'description' => 'required',
		]);

		// Get filename with extension
		$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

		// Get just filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get just extension
		$extension = $request->file('cover_image')->getClientOriginalExtension();

		// Filename to store
		$fileNameToStore = preg_replace('/[^A-Za-z0-9_\-]/', '', $filename) . '_' . time() . '.' . $extension;

		// Upload image to 'public/images'
		$path = $request->file('cover_image')->storeAs('images', $fileNameToStore, 'public');

		// Create album
		$album = new Album;
		$album->name = $request->input('name');
		$album->description = $request->input('description');
		$album->cover_image = $fileNameToStore;
		$album->save();

		return redirect('/albums')->with('success', 'Album created');
	}

	public function destroy($id)
	{
		$album = Album::findOrFail($id);
		$album->delete();
		return redirect('/albums')->with('success', 'Album deleted');
	}

	public function edit(Album $album)
	{
		$album = Album::findOrFail($album->id);
		return view('albums.edit', compact('album'));
	}

	public function update(Request $request, Album $album)
	{
		$request->validate([
			'name' => 'required',
			'description' => 'required',
		]);

		$album = Album::findOrFail($album->id);
		$album->name = $request->input('name');
		$album->description = $request->input('description');
		if ($request->hasFile('cover_image')) {
			// Get filename with extension
			$filenameWithExt = $request->file('cover_image')->getClientOriginalName();

			// Get just filename
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

			// Get just extension
			$extension = $request->file('cover_image')->getClientOriginalExtension();

			// Filename to store
			$fileNameToStore = preg_replace('/[^A-Za-z0-9_\-]/', '', $filename) . '_' . time() . '.' . $extension;

			// Upload image to 'public/images'
			$path = $request->file('cover_image')->storeAs('images', $fileNameToStore, 'public');

			$album->cover_image = $fileNameToStore;
		}
		$album->save();
		return redirect('/albums')->with('success', 'Album updated');
	}

}
