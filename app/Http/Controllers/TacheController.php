<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TacheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $taches = Tache::orderBy('id', 'desc')->get();
        return view('index', compact('taches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create', ['statuses' => Tache::getStatuses()]);
    }

    /**ÒÒ
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:50|min:5',
            'description' => 'required|string|max:500|min:20',
            'statuses' => Rule::in(Tache::getStatuses())
        ]);

        Tache::create($validated);
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tache = Tache::findOrFail($id);

        return view('edit', ['statuses' => Tache::getStatuses(), 'tache' => $tache]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:50|min:5',
            'description' => 'required|string|max:500|min:20',
            'statuses' => Rule::in(Tache::getStatuses())
        ]);

        $tache->title = $request->title;
        $tache->description = $request->description;
        $tache->status = $request->status;
        $tache->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return redirect()->route('index');
    }
}
