
@extends('Layout.App')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$titre}}</h1>
    <div class="btn-toolbar mb-2 mb-md-0">

    <a href="{{route('create-user')}}" class="btn btn-sm btn-outline-secondary">
        Nouveau
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nom</th>
        <th scope="col">Prenoms</th>
        <th scope="col">Téléphone</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )


        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->firstnames}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telephone}}</td>
            <td>
                <div class="btn-group me-2">
                    <a href="" class="btn btn-sm btn-outline-secondary">Détail</a>
                    <a href="{{'/edit-user/'.$user->id}}" class="btn btn-sm btn-outline-success">Modifier</a>
                    <a href="" class="btn btn-sm btn-outline-info">Reset mot de passe</a>
                    <a href="" class="btn btn-sm btn-outline-danger">Supprimer</a>
                </div>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
