@extends('layouts')
@section('dashboard-title')
    Mes projets
@endsection
@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Mes Projets</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('project.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Créer un projet
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
                <div class="card border border-dark mb-3 p-3 m-4" style="max-width: 18rem;">
                    <h5 class="card-header rounded-pill " style="border-bottom: none">{{ $project->name }}</h5>
                    <span class="badge rounded-pill bg-warning mt-3">
                    {{ $project->created_at->diffForHumans() }}
                    </span>
                    <div class="card-body">
                        <div class="card-text">
                            <div style="min-height: 200px">
                                {{ $project->description }}
                                <br>
                            </div>
                            <div class="float-end">
                                <a href="{{ route('project.show', $project->id) }}"
                                   class="btn btn-success">
                                    <i class="fa fa-folder-open"></i>
                                </a>
                                <a href="{{ route('project.edit', $project->id) }}"
                                   class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('project.destroy', $project->id) }}" style="display: inline"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @if(count($projects) === 0)
        <div class="alert alert-danger p-2">
            <p>Pas de project créé, cliquer ici pour créer un projet</p>
            <br>
            <br>
            <a href="{{ route('project.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Créer un projet
            </a>
        </div>
    @endif

@endsection
