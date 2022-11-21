
@extends('Layout.App')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Utilisateur > <a class="link-secondary" href="{{route('user')}}">Liste</a></span>

        </h6>
    </div>
    @include('layout.partials.alert')
    <div class="container">
        <div class="card text-center">

            <div class="card-header">
                <h2>{{$titre}}</h2>
            </div>
            <form class="container" action="{{route('store-user')}}" method="post" enctype="multipart/form-data">
                     @include('Utilisateur.form')
                    <button type="submit" class="btn btn-secondary btn-lg">Enregistrer</button>
                    <button type="reset" class="btn btn-danger btn-lg">Annuler</button>
                    <hr class="mb-4">
            </form>
        </div>
    </div>

@endsection
