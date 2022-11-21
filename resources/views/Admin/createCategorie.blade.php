
@extends('Layout.App')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Catégorie de dépense > <a class="link-secondary" href="{{route('liste-categorie')}}">Liste</a></span>

        </h6>
    </div>
    @include('layout.partials.alert')
    <div class="container">
        <div class="card">

            <div class="card-header text-center">
                <h2>{{$titre}}</h2>
            </div>
            <form class="container" action="{{route('store-categorie')}}" method="post" enctype="multipart/form-data">
                    <hr>
                    @csrf
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <label for="libelle">Description</label>
                        <input type="text" class="form-control {{ $errors->has('libelle') ? ' is-invalid' : '' }}" id="libelle" name="libelle" value="{{old('libelle')}}">

                        @if ($errors->has('libelle'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('libelle') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>

                <div class="float-left">
                        <button type="submit" class="btn btn-secondary">Enregistrer</button>
                    <button type="reset" class="btn btn-danger">Annuler</button>
                </div>

                <hr class="mb-4">
            </form>
        </div>
    </div>

@endsection
