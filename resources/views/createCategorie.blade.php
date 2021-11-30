@extends('layouts.master')

@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h3>ajout d'un nouvel Categorie</h3>
</div>

<div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

<div class="uper">

    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div><br />
    @endif

    
<form style="width: 65%;" method="POST" action="{{route('categories.store')}}">
    
    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput2">name</label>
      <input type="text" class="form-control"  placeholder="title" name="name">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">description</label>
        <input type="text" class="form-control"  placeholder="description" name="description">
      </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">slug</label>
        <input type="text" class="form-control"  placeholder="slug" name="slug">
    </div>
     
      
      <button type="submit" class="btn btn-primary">Enregistrie</button>
      <a href="{{route('categories.index')}}" class="btn btn-danger">Annuler</a>
</form>





@endsection