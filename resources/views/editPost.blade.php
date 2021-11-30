@extends('layouts.master')

@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h3>Modifier un Article</h3>
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

    
<form style="width: 65%;" method="post" action="{{Route('posts.update',$Post->id)}}" enctype="multipart/form-data">

    <div class="form-group">
        @csrf
        @method('PATCH')
      <label for="formGroupExampleInput">categories</label>
      <select class="form-control" name="categorie_id" id="">
          <option value=""></option>
          @foreach ($categories as $categorie)
          @if ($Post->categorie->id == $categorie->id)
          <option  value="{{$categorie->id}}" selected>{{$categorie->name}}</option>
          @else
            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
          @endif  
          @endforeach
      </select>
    </div>
    <div class="form-group">
       
      <label for="formGroupExampleInput2">title</label>
      <input type="text" class="form-control"  placeholder="title" name="title" value="{{$Post->title}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">slug</label>
        <input type="text" class="form-control"  placeholder="slug" name="slug" value="{{$Post->slug}}">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">description</label>
        <input type="text" class="form-control"  placeholder="description" name="description" value="{{$Post->description}}">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">image</label>
        <input type="file" class="form-control"  placeholder="image" name="featured_image" value="{{$Post->featured_image}}" multiple>
      </div>
      <button type="submit" class="btn btn-primary">Modifier</button>
      <a href="{{route('posts.index')}}" class="btn btn-danger">Annuler</a>
  </form>





@endsection