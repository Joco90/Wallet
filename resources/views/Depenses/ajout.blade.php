@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" id="budgetAdd">
    <h1 class="h2">{{$titre}}</h1>
</div>
@include('layout.partials.alert')
<div class="row g-5">
    <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your wallet</span>
            <span class="badge bg-primary rounded-pill">3</span>
        </h4>
        <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Product name</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Second product</h6>
                    <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
                <h6 class="my-0">Third item</h6>
                <small class="text-muted">Brief description</small>
            </div>
            <span class="text-muted">$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
            </li>
        </ul>

    </div>
    <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Saisie des dépenses</h4>
        <form method="post" action="{{route('ajout-depense')}}" enctype="multipart/form-data" class="needs-validation">
            @csrf
            <div class="row g-3">
            <div class="col-sm-6">
                <label for="budget" class="form-label">Budget</label>
                <select class="form-select" id="budget" name="budget_id">
                    <option value="{{$budget->id}}" selected>{{$budget->libelle}}</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
            <div class="col-sm-6">
                <label for="categorie" class="form-label">Type de dépense</label>
                <select class="form-select {{$errors->has('categorie_id') ? ' is-invalid' : '' }}" id="categorie" name="categorie_id">
                    <option value="">sélection...</option>
                    @foreach ($categories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                    @endforeach
                </select>
                @if ($errors->has('categorie_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('categorie_id') }}</strong>
                    </span>
                @endif

            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control {{$errors->has('libelle') ? ' is-invalid' : '' }}" name="libelle" id="description">
                @if ($errors->has('libelle'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('libelle') }}</strong>
                    </span>
                @endif
            </div>

            <div class="col-sm-6">

                <label for="montant" class="form-label">Montant de la dépense</label>
                <input type="number" class="form-control {{ $errors->has('montant') ? ' is-invalid' : '' }}" id="montant" name="montant">
                <small class="text-muted">Entrez le montant de la dépense</small>
                @if ($errors->has('montant'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('montant') }}</strong>
                    </span>
                @endif
            </div>

            <button class="w-100 btn btn-success btn-lg" type="submit">Sauvegarder</button>

            <hr class="my-4">

            {{-- <button class="w-100 btn btn-success btn-lg" type="submit">Sauvegarder</button> --}}
        </form>
    </div>
</div>
@endsection



