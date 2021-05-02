@extends('layouts')
@section('dashboard-title')
    Editer le projet {{ $project->name }}
@endsection
@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Edit <span class="badge bg-info">{{ $project->name }}</span></h4>
        </div>
        <div class="float-end">
            <a href="{{ route('index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Tous les projets
            </a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="card card-body bg-light p-4">
        <form action="{{ route('project.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="5">{{ $project->description }}</textarea>
            </div>
            <a href="{{ route('project.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Annuler</a>

            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistrer</button>
        </form>
    </div>

@endsection
