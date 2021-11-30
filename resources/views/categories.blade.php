@extends('layouts.master')


@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h4>Liste des Catégoriers</h4>

</div>
    
<div class=" mb-3 d-flex justify-content-end"><a href="{{route('categories.create')}}" class="btn btn-primary">Ajouter une nouvelle catégorie</a></div>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">description</th>
        <th scope="col">slug</th>
        <th scope="col">modifier</th>
        <th scope="col">supprimer</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($categories as $categorie)
      <tr>
        <th scope="row">{{$categorie->id}}</th>
        <td>{{$categorie->name}}</td>
        <td>{{$categorie->description}}</td>
        <td>{{$categorie->slug}}</td>
        <td>
          <a href="{{route('categories.edit',$categorie->id)}}" class="btn btn-info">Modifier</a>
        </td>
        <td>
          <form action="{{ route('categories.destroy', $categorie->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
  
  



@endsection