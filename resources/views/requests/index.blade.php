@extends('layouts.app')

@section('title', 'Forum')

@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <table class="table table-default">
          
          <thead>
              
              <th scope="col">Prescription required</th>
              <th scope="col">Message</th>
              <th scope="col">Created At</th>
          </thead>
          <tbody>
            @foreach ($requests as $requestPrescription)
            @if ($requestPrescription->hasResponded != 1)
                <tr class="table-active">
                  
                  <td><a href="{{route('requests.show', ['id' => $requestPrescription->id])}}">{{$requestPrescription->title}}</a></td>
                  <td>{{ substr($requestPrescription->body, 0, 50) }}...</td>
                  <td>{{$requestPrescription->created_at->format('m/d/Y')}}</td>
                </tr>
              @endif
            @endforeach
            <tbody>
          
          </table>
          
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{route('requests.create')}}">
              <button type="button" class="btn btn-primary">Create a new request</button>
            </a> 
          
        </li>
      </ul>
      <div class="text-center">
        
      </div>
</div>


    
@endsection

        

