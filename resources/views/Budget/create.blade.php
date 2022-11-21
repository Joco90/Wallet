
@extends('Layout.App')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Budget > <a class="link-secondary" href="{{route('liste-budget')}}">Liste</a></span>

        </h6>
    </div>
    @include('layout.partials.alert')
    <div class="container">
        <div class="card">

            <div class="card-header text-center">
                <h2>{{$titre}}</h2>
            </div>
            <form class="container" action="{{route('store-budget')}}" method="post" enctype="multipart/form-data">
                @include('Budget.form')
                <div class="button p-2">
                <button type="submit" class="btn btn-secondary">Enregistrer</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
                </div>

            </form>
        </div>
    </div>

@endsection
