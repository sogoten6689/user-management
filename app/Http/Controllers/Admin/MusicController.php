<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Imports\MusicsImport;
use Maatwebsite\Excel\Facades\Excel;

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

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function importView()
    // {
    //     return view('admin.musics.create');
    //     //
    // }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new MusicsImport, $request->file('file'));

        return redirect()->route('admin.musics.index')->with('success', 'Music data imported successfully.');
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
        $user = Auth::user();

        // $request->validate([
        //     'name' => 'required',
        // ]);

        // $music = new Music();
        // $music->name = $request->name;

        $validatedData = $request->validate([
            'song_name' => 'required|string',
            'author' => 'nullable|string',
            'first_sentence' => 'nullable|string',
            'link_pdf' => 'nullable|string',
            'link_content' => 'nullable|string',
            'category' => 'nullable|string',
            'book' => 'nullable|string',
            'notes' => 'nullable|string',
            'public' => 'required|boolean',
        ]);

        $validatedData['link_pdf'] = array_map('trim', explode(',', $request->input('link_pdf', '')));
        $validatedData['link_content'] = array_map('trim', explode(',', $request->input('link_content', '')));
        $validatedData['created_by'] = $user->id;

        // dd($validatedData);
        $music = Music::create($validatedData);

        if ($music->save()) {
            flash()->addSuccess('Tạo Bài hát Thành Công!');
            return redirect()->route('admin.musics.index');
        }

        return redirect()->back()->with('success', 'File uploaded fail!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Music $music)
    {
        return view('admin.musics.show', compact('music'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        return view('admin.musics.edit', compact('music'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        //

        $validatedData = $request->validate([
            'song_name' => 'required|string',
            'author' => 'nullable|string',
            'first_sentence' => 'nullable|string',
            'link_pdf' => 'nullable|string',
            'link_content' => 'nullable|string',
            'category' => 'nullable|string',
            'book' => 'nullable|string',
            'notes' => 'nullable|string',
            'public' => 'required|boolean|in:0,1',
        ]);

        $validatedData['link_pdf'] = array_map('trim', explode(',', $request->input('link_pdf', '')));
        $validatedData['link_content'] = array_map('trim', explode(',', $request->input('link_content', '')));


        $music->update($validatedData);

        return redirect()->back()->with('success', 'File uploaded successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {

        if ($music->created_by == Auth::user()->id || Auth::user()->hasRole(1)) {
            $music->delete();
            return redirect()->back()->with('success', 'File deleted successfully');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to delete this file');
        }
    }
}
