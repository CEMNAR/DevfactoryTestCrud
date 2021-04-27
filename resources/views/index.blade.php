@extends('layouts')

@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Mes tâches</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('tache.create') }}" class="btn btn-info">
                <i class="fa fa-plus-circle"></i> Créer une tâche
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($taches as $tache)
                <div class="card border border-dark mb-3 p-3 m-4" style="max-width: 18rem;">
                    <h5 class="card-header rounded-pill " style="border-bottom: none">
                        @if($tache->status === "Todo")
                            {{ $tache->title }}
                        @else
                            <strike>{{ $tache->title }}</strike>
                        @endif
                    </h5>
                    <span class="badge rounded-pill bg-warning mt-3">
                    {{ $tache->created_at->diffForHumans() }}
                </span>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="float-start" style="min-height: 200px">
                                @if($tache->status === "Todo")
                                    {{ $tache->description }}
                                @else
                                    <strike>{{ $tache->description }}</strike>
                                @endif
                                <br>

                                @if($tache->status === "Todo")
                                    <span class="badge rounded-pill bg-primary">To Do</span>
                                @else
                                    <span class="badge rounded-pill bg-success">Done</span>
                                @endif

                            </div>
                            <div class="float-end">
                                <a href="{{ route('tache.edit', $tache->id) }}"
                                   class="btn btn-success">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('tache.destroy', $tache->id) }}" style="display: inline"
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

    @if(count($taches) === 0)
    <div class="alert alert-danger p-2">
        <p>Pas de ticket créer, cliquer ici pour créer une tâche</p>
        <br>
        <br>
        <a href="{{ route('tache.create') }}" class="btn btn-info">
            <i class="fa fa-plus-circle"></i> Créer une tâche
        </a>
    </div>
    @endif

@endsection
