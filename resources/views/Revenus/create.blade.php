@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$titre}}</h1>
</div>
{{-- @include('layout.partials.alert') --}}

<div class="row g-5">
    @include('Revenus.wallet')
    <div class="col-md-6 col-lg-6">
        <div id="alert" role="alert"> </div>

        <h4 class="mb-3">Saisie de revenus</h4>
        <form enctype="multipart/form-data" class="needs-validation" id="formRevenu">
            @csrf
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row g-3">
                <div class="col-sm-8" id="blockBudget">
                    <label for="budget" class="form-label">Budget</label>
                    <select class="form-select" id="budget" name="budget_id">
                        <option value="">Sélection...</option>
                        @foreach ($budgets as $budget)
                        <option value="{{$budget->id}}">{{$budget->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4" id="blockdate">
                    <label for="date_revenu" class="form-label">Date</label>
                    <input type="date" class="form-control" id="date_revenu" name="date_revenu">

                </div>
            </div>
            <div class="row g-3 m-2">
                <div class="col-sm-6" id="blocklibelle">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="libelle" id="description">
                </div>
                <div class="col-sm-4" id="blockmontant">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" id="montant" name="montant">
                </div>
                <div class="col-sm-2">
                    <input type="hidden" class="form-control" name="user_id" value="{{Auth::id()}}" id="user_id">
                </div>
            </div>


            <button class="w-100 btn btn-success btn-lg" id="revenuSubmit" type="submit">Sauvegarder</button>

            <hr class="my-4">

            {{-- <button class="w-100 btn btn-success btn-lg" type="submit">Sauvegarder</button> --}}
        </form>
    </div>
</div>
@endsection



