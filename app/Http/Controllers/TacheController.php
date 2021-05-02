<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TacheController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = Project::findOrFail(request()->input('project_id'));
        return view('tache.create', ['statuses' => Tache::getStatuses(), 'project' => $project]);
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
            'statuses' => Rule::in(Tache::getStatuses()),
            'project_id' => 'required|exists:projects,id'
        ]);
        Tache::create($validated);
        return redirect('project/'.$request->input('project_id'));
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
        $project = $tache->project;

        return view('tache.edit', ['statuses' => Tache::getStatuses(), 'tache' => $tache, 'project' => $project]);
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
        return redirect('project/'.$request->input('project_id'));
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
        $project_id = $tache->project->id;
        $tache->delete();
        return redirect('project/'.$project_id);
    }
}
