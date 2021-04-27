<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use Illuminate\Http\Request;

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
        $statuses = [
        [
            'label' => 'Todo',
            'value' => 'Todo'
        ],
        [
            'label' => 'Done',
            'value' => 'Done'
        ],
        ];

        return view('create', compact('statuses'));
    }

    /**ÒÒ
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $tache = new Tache();
        $tache->title = $request->title;
        $tache->description = $request->description;
        $tache->status = $request->status;
        $tache->save();
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
        $statuses = [
            [
                'label' => 'Todo',
                'value' => 'Todo'
            ],
            [
                'label' => 'Done',
                'value' => 'Done'
            ],
        ];

        return view('edit', compact('statuses', 'tache'));
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
            'title' => 'required'
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
