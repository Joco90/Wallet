
@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$titre.' '}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="{{route('ajoute-revenu')}}" class="btn btn-sm btn-outline-secondary">
        Ajouter
    </a>
    </div>

</div>
@include('Layout.Partials.alert')
<div class="card">
    <div class="table-responsive">
        <table class="table table-sm">
          <thead class="table-info">
            <tr>
              <th scope="col">Revenu</th>
              <th scope="col">Montant</th>
              <th scope="col">Saisie le</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($revenus as $revenu )
              <tr>
                  <td>{{$revenu->libelle}}</td>
                  <td>{{$revenu->montant}}</td>
                  <td>{{$revenu->created_at}}</td>
                  <td>
                      <div class="btn-group me-2">
                          <a href="{{'/edit-budget/'.$revenu->id}}" class="btn btn-sm btn-outline-success">Modifier</a>
                          <a href="{{'/delete-budget/'.$revenu->id}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                      </div>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

@endsection
