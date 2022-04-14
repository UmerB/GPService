@extends('layouts.app')

@section('title', 'Request')

@section('content')
<div class = "container">
    <div class="row justify-content-center">
      <div class="col-md-8">
      
        <div class="card">
    
        <div class = "card-header"><strong>{{$user->name}}</strong></div>
          <div class="card-body">
            <p >Conditions: {{$user->condition}}</p>

            <ul>
                <form method="POST" action ="{{route('users.update',['id' => $user->id])}}">
                    @csrf 
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-sm-10">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="condition" class="form-label mt-4">Update condition:</label>
                        <input type="text" class="form-control" name = "condition" value="{{$request->user}}">
                        
                    </div>
                    <div class = "btn btn-primary">
                        <input type="submit" value="Submit">
                    </div>
                </form>

                <div class = "btn btn-primary">
                    {!! Form::open(['route' => 'users.update', $user->id]]) !!}
                    {!! Form::label('condition', "Update conditions: ") !!}
                    {!! Form::text('condition') !!}
                    {!! Form::submit('Submit') !!}
                    {!! Form::close() !!}
                </div>
                
            </ul>
            
                </div>
          </div>
      </div>
      </div>
  </div>
  
    <a href="{{route('admin.userIndex')}}">
        <button type="button" class="btn btn-primary">Back</button>
      </a> 
      
  
</div>
</div>
@endsection
