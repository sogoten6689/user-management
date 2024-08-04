<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(Gate::denies('music_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $musics = Music::latest()->paginate(15);
        return view('admin.musics.index', compact('musics'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.musics.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mp3file' => 'required|mimetypes:audio/mp3|max:10000', // max 10MB
        ]);


        $filePath = $request->file('mp3file')->store('public');

        if ($request->file('mp3file')) {
            $filePath = $request->file('mp3file')->store('public');

            $mp3Upload = new Music();
            $mp3Upload->music_path = $filePath;
            $mp3Upload->save();

            return redirect()->back()->with('success', 'File uploaded successfully');
        }

        return redirect()->back()->with('error', 'Failed to upload file');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.musics.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.musics.edit');
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
