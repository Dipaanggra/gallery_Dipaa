<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
	//
	public function create(int $album_id)
	{
		return view('photos.create', compact('album_id'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required',
			'photo' => 'required|image|max:1999',
			'description' => 'required'
		]);

		// Get filename with extension
		$filenameWithExt = $request->file('photo')->getClientOriginalName();

		// Get just filename
		$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

		// Get just extension
		$extension = $request->file('photo')->getClientOriginalExtension();

		// Filename to store
		$fileNameToStore = preg_replace('/[^A-Za-z0-9_\-]/', '', $filename) . '_' . time() . '.' . $extension;

		// Upload image
		$path = $request->file('photo')->storeAs('albums/' . $request->input('album_id'), $fileNameToStore, 'public');
		// dd($path);
		// Create photo
		$photo = new Photo;
		$photo->title = $request->input('title');
		$photo->description = $request->input('description');
		$photo->album_id = $request->input('album_id');
		$photo->photo = $fileNameToStore;
		$photo->size = $request->file('photo')->getSize();
		$photo->save();

		return redirect('/albums/' . $request->input('album_id'))->with('success', 'Photo created');
	}

	public function show(Photo $photo)
	{
		$user = Auth::user();
		if (Auth::check()) {
			$liked = $user->likes->contains('photo_id', $photo->id);
		} else {
			$liked = false;
		}
		if ($liked) {
			$action = route('like.destroy', $photo->likes->where('user_id', $user->id)->first());
		} else {
			$action = route('like.store');
		}
		$photo = Photo::findOrFail($photo->id);
		$like_count = $photo->likes->count();
		return view('photos.show', compact('photo', 'liked', 'action', 'like_count'));
	}

	public function destroy($id)
	{
		$photo = Photo::findOrFail($id);
		$photo->delete();
		return redirect()->route('photos.index')->with('success', 'Photo deleted');
	}

	public function index()
	{
		$photos = Photo::all();
		return view('photos.index', compact('photos'));
	}

	public function edit($id)
	{
		$photo = Photo::findOrFail($id);
		return view('photos.edit', compact('photo'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required',
			'description' => 'required'
		]);

		$photo = Photo::findOrFail($id);
		$photo->title = $request->title;
		$photo->description = $request->description;
		if ($request->hasFile('photo')) {
			// Delete old photo
			Storage::delete('public/albums/' . $photo->album_id . '/' . $photo->photo);

			// Get filename with extension
			$filenameWithExt = $request->file('photo')->getClientOriginalName();
			// Get just filename
			$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			// Get just extension
			$extension = $request->file('photo')->getClientOriginalExtension();
			// Filename to store
			$fileNameToStore = preg_replace('/[^A-Za-z0-9_\-]/', '', $filename) . '_' . time() . '.' . $extension;
			// Upload image
			$path = $request->file('photo')->storeAs('albums/' . $request->input('album_id'), $fileNameToStore, 'public');
			$photo->photo = $fileNameToStore;
		}
		$photo->save();

		return redirect()->route('photos.index')->with('success', 'Photo updated');
	}
}
