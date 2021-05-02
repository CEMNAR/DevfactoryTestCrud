@extends('layouts')
@section('dashboard-title')
    Créer une tache pour le projet {{ $project->name }}
@endsection
@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Créer une tâche</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Toutes les tâches
            </a>
        </div>
        <div class="clearfix"></div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card card-body bg-light p-4">
        <form action="{{ route('tache.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
            </div>
            <input name="project_id" type="hidden" value="{{ Request::get('project_id') }}">
            <div class="mb-3">
                <label for="description" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Annuler</a>

            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistrer</button>
        </form>
    </div>

@endsection
