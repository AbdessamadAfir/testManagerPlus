@extends('layouts.master')

@section('content')

<div class="my-3 shadow p-3 mb-5 bg-white rounded">
    <h3>Modifier une atégorie</h3>
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

    
<form style="width: 65%;" method="post" action="{{Route('categories.update',$categorie->id)}}" enctype="multipart/form-data">

    <div class="form-group">
        @csrf
        @method('PATCH')
      <label for="formGroupExampleInput2">name</label>
      <input type="text" class="form-control"  placeholder="name" name="name" value="{{$categorie->name}}">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">description</label>
        <input type="text" class="form-control"  placeholder="description" name="description" value="{{$categorie->description}}">
      </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">slug</label>
        <input type="text" class="form-control"  placeholder="slug" name="slug" value="{{$categorie->slug}}">
      </div>
      

      <button type="submit" class="btn btn-primary">Modifier</button>
      <a href="{{route('categories.index')}}" class="btn btn-danger">Annuler</a>
  </form>





@endsection