@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="black-text text-darken-1 center">Crew Members</h4>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    
                    <table class="responsive-table col s12 m12 l12 xl12">
  <thead class="grey-text text-darken-1">
    <tr>

      <th scope="col">Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Ship</th>
      <th scope="col">Rank</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>

      <td>{{$user->name}} {{$user->surname}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->ship()->first()->name}}</td>
      <td>{{$user->role()->first()->name}}</td>
      <td>

        <a href="{{route('admin.users.edit', $user)}}"class="btn btn-small btn-floating waves=effect waves-light teal lighten-2"><i class="material-icons">list</i></a>
        
        <form action="{{route('admin.users.destroy', $user)}}" method="POST" class="float-left">
            @csrf
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('admin.users.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div>
@endsection
