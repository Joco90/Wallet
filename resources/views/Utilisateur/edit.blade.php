@extends('Layout.App')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Utilisateur > <a class="link-secondary" href="{{route('user')}}">Liste</a></span>

        </h6>
        <h1 class="h2">{{$titre}}</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form action="{{route('update-user')}}" method="POST" enctype="multipart/form-data">
        @include('Utilisateur.form')
        <button type="submit" class="btn btn-secondary btn-lg">Enregistrer</button>
        <a href="{{route('user')}}" class="btn btn-danger btn-lg">Retour</a>
        <hr class="mb-4">
    </form>
@endsection
