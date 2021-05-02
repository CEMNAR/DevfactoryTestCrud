@extends('layouts')
@section('dashboard-title')
    Créer un projet
@endsection
@section('main-content')
    <div>
        <div class="float-start">
            <h4 class="pb-3">Créer un projet</h4>
        </div>
        <div class="float-end">
            <a href="{{ route('project.index') }}" class="btn btn-info">
                <i class="fa fa-arrow-left"></i> Tous les projets
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
        <form action="{{ route('project.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="5"></textarea>
            </div>

            <a href="{{ route('project.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i> Annuler</a>

            <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Enregistrer</button>
        </form>
    </div>

@endsection
