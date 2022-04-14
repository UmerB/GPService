@extends('layouts.app')

@section('title', 'Request')

@section('content')
<div class = "container">
    <div class="row justify-content-center">
      <div class="col-md-8">
      
        <div class="card">
    <ul>
        <div class = "card-header"><strong>{{$requestPrescription->title}}</strong></div>
          <div class="card-body">
            <p >{{$requestPrescription->body}}</p>
            <p>Condition: <b>{{$requestPrescription->user->condition}}</b></p>
            <cite title="Source Title">Posted by: {{$requestPrescription->user->name}} on {{$requestPrescription->created_at->format('m/d/Y')}}</cite>
            @if($requestPrescription->user_id == Auth::id())
                <div class="d-flex">
                  <a href="/requests/{{$requestPrescription->id}}/edit">
                    <button type="button" class="btn btn-warning btn-sm">Edit Request</button>
                  </a> 
            @endif
            @if($requestPrescription->user_id == Auth::id() /*||Auth::user()->is_admin== 1*/)
                  <form method="POST"
                  action="{{route('requests.destroy', ['id' => $requestPrescription->id])}}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete Request</button>
                  </form>
                </div>
          </div>
        @endif
      </div>
      </div>
    </ul>
  </div>
  
    <ul>
        <h4>Response:</h4>
        @foreach($responses as $response)
        <div class="card">
        <div class = "card-header"><strong>{{$response->user->name}}</strong></div>
          <div class="card-body">
           
              <figure>
                    <p class="mb-0">{{$response->body}}</p>
                    <cite title="Source Title">{{$response->user->name}} on {{$response->created_at->format('m/d/Y')}}</cite>
                  
                  <div class="d-flex">       
                    @if($response->user_id == Auth::id())
                      
                        <a href="/responses/{{$response->id}}/edit">
                        <button type="button" class="btn btn-warning btn-sm">Edit Response</button>
                        </a>
                    @endif
                    @if($response->user_id == Auth::id() /*|| Auth::user()->is_admin== 1*/)
                        <form method="POST"
                            action="{{route('responses.destroy', ['id' => $response->id])}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete Response</button>
                        </form>
                    @endif
                  </div>
                
            
          </figure>
          </div>
        
        </div>
        @endforeach
    
        
    </ul>
    <ul>
            <form method = "POST" action="{{ route('responses.store', ['request_id' => $requestPrescription->id]) }}">
            @csrf
            <div class="form-group">
            <p>Response: <input type="text" name="body"></p>
            <input type="submit" value ="Send response">
            </form>
            </div>
            @if(Auth::user()->is_admin == 1)
            <form method = "POST" action="{{ route('emails.store', ['request_id' => $requestPrescription->id]) }}">
              @csrf
              <div class="form-group">
              <input type="submit" value ="Send prescription">
              </form>
            @endif
           
            
    </ul>
    
    
    <a href="{{route('requests.index')}}">
        <button type="button" class="btn btn-primary">Back</button>
      </a> 
      
  
</div>
</div>
@endsection
