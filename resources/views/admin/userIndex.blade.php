@extends('layouts.app')

@section('title', 'Forum')

@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <table class="table table-default">
          
          <thead>
              <th scope="col">Name</th>
              <th scope="col">Condition</th>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr class="table-default">
                  <td><a href="{{route('admin.show', ['id' => $user->id])}}">{{$user->name}}</a></td>
                  <td>{{$user->condition}}</td>
                </tr>
            
            @endforeach
            <tbody>
          
          </table>
          
        </li>

      </ul>
    
</div>


    
@endsection