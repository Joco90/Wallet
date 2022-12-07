@php
    Use App\Models\Revenu;
    Use App\Models\Depense;
@endphp
@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$titre}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>

</div>
@if($budgets->count()==0)

    <div class="alert alert-warning m-3" role="alert">
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center alert-danger">
            <h1 class="display-4 fw-normal">Vos budgets</h1>
            <p class="fs-5 text-muted">Vous n'avez aucun budget, cliquez <a href="{{route('create-budget')}}">ici</a> pour enregistrer un budget.</p>
        </div>
    </div>
@else

<main>
    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        @foreach ($budgets as $budget)
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal"><strong>{{$budget->libelle}}</strong></h4>
                    </div>
                        @php
                            $mtD=Depense::where('etat',1)->where('user_id',Auth::id())
                            ->where('budget_id',$budget->id)
                            ->sum('montant');
                            $mtR=Revenu::where('etat',1)->where('user_id',Auth::id())
                            ->where('budget_id',$budget->id)
                            ->sum('montant');
                        @endphp
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">{{$mtD}}<small class="text-muted fw-light">/{{$mtR}}</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                        <li>Revenus:</li>
                        <li>Dépenses:</li>
                        <li>Prevision</li>
                        <li>Plus de Détails</li>
                        </ul>
                        <a href="{{'/ajouter-depenses/'.$budget->id}}" class="w-100 btn btn-lg btn-outline-primary">Saisie de dépenses</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</main>
@endif

@endsection
