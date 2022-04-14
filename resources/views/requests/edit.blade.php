@extends('layouts.app')



@section('content')
<div class = "container">
    <div class="row justify-content-center">
      <div class="col-md-8">
    <form method="POST" action ="{{route('requests.update',['id' => $request->id])}}">
        @csrf 
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-10">
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="form-label mt-4">Title</label>
            <input type="text" class="form-control" name = "title" value="{{$request->title}}">
            
        </div>
        <div class="form-group">
            <label for="body" class="form-label mt-4">Body</label>
            <input type="text" class="form-control" name="body" value="{{$request->body}}">
        </div>
        <div class = "btn btn-primary">
            <input type="submit" value="Submit">
        </div>
        
        <a href="{{route('requests.index')}}">
            <button type="button" class="btn btn-warning">Cancel</button>
          </a> 
    </form>
      </div>
    </div>
</div>
@endsection
