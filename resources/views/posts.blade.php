@extends('layouts.master')

@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h3>Liste des Articles</h3>

</div>
<div class="uper">

@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}  
  </div><br />
@endif
    
<div class=" mb-3 d-flex justify-content-end"><a href="{{route('posts.create')}}" class="btn btn-primary">Ajouter un nouvel article</a></div>
<table class="table">
    <thead class="thead-dark">
      
      <tr>
        <th scope="col">id</th>
        <th scope="col">categorie_id</th>
        <th scope="col">title</th>
        <th scope="col">slug</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">modifier </th>
        <th scope="col">supprimer</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($Posts as $Post)
      <tr>
        <th scope="row">{{$Post->id}}</th>
        <td>{{$Post->categorie->name}}</td>
        <td>{{$Post->title}}</td>
        <td>{{$Post->slug}}</td>
        <td>{{$Post->description}}</td>
        <td><img src="storage/images/{{$Post->featured_image}}" style="width: 80%"></td>
        <td>
          <a href="{{route('posts.edit',$Post->id)}}" class="btn btn-info">Modifier</a>
        </td>
        <td>
          <form action="{{ route('posts.destroy', $Post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Supprimer</button>
          </form>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>



@endsection