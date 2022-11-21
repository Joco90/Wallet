
@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$titre}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="{{route('create-budget')}}" class="btn btn-sm btn-outline-secondary">
        Nouveau
    </a>
    </div>

</div>
@include('Layout.Partials.alert')
<div class="card">
    <div class="table-responsive">
        <table class="table table-sm">
          <thead class="table-info">
            <tr>
              <th scope="col">Libelle</th>
              <th scope="col">Date début</th>
              <th scope="col">Date Fin</th>
              <th scope="col">Etat</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($budgets as $budget )
              <tr>
                  <td>{{$budget->libelle}}</td>
                  <td>{{$budget->dateDeb}}</td>
                  <td>{{$budget->dateFin}}</td>
                  <td>{{$budget->etat}}</td>
                  <td>
                      <div class="btn-group me-2">
                          <a href="{{'/edit-budget/'.$budget->id}}" class="btn btn-sm btn-outline-success">Modifier</a>
                          <a href="{{'/delete-budget/'.$budget->id}}" class="btn btn-sm btn-outline-danger">Supprimer</a>
                      </div>
                  </td>
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>

@endsection
