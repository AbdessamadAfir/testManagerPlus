@extends('layouts.master')

@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h3>Ajout d'un nouvel Article</h3>
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

    
<form style="width: 65%;" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    
    @csrf

    <div class="form-group">
      <label for="formGroupExampleInput">categorie_id</label>
      <select class="form-control" name="categorie_id" id="">
          <option value=""></option>
          @foreach ($categories as $categorie)
          <option value="{{$categorie->id}}">{{$categorie->name}}</option>  
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="formGroupExampleInput2">title</label>
      <input type="text" class="form-control"  placeholder="title" name="title">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">slug</label>
        <input type="text" class="form-control"  placeholder="slug" name="slug">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">description</label>
        <input type="text" class="form-control"  placeholder="description" name="description">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">image</label>
        <input type="file" class="form-control"  placeholder="image" name="featured_image" required="" multiple>
      </div>
      <button type="submit" class="btn btn-primary">Enregistrie</button>
      <a href="{{route('posts.index')}}" class="btn btn-danger">Annuler</a>
  </form>





@endsection