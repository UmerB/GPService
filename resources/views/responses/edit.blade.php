@extends('layouts.app')

@section('title', 'Edit your reply')

@section('content')
<div class = "container">
    <div class="row justify-content-center">
      <div class="col-md-8">
    <form method="POST" action ="{{route('responses.update',['id' => $response->id])}}">
        @csrf 
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-10">
            </div>
        </div>
        <div class="form-group">
            <label for="body" class="form-label mt-4">Response</label>
            <input type="text" class="form-control" name="body" value="{{$response->body}}">
        </div>
        <div class = "btn btn-primary">
            <input type="submit" value="Submit">
        </div>
        <a href="{{ route('requests.show',['id' => $response->RequestPrescription_id])}}">
          <button type = "button" class = "btn btn-warning">Cancel</button>
        </a>
        
    </form>
      </div>
    </div>
</div>
@endsection