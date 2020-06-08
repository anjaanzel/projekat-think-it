@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-xl s4 m4 offset-m4 l6 offset-l4 xl8 offset-xl6 card-mt-15" >
            
                <h4 class="center grey-text text-darken-2 card-title">Edit {{$user->name}} {{$user->surname}}</h4>
                <div class="card-content" style="width: 32%; margin: 0 auto;">
                    <div class="row">
                       
                        <form action="{{route('admin.users.update', $user)}}" method="POST">
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="name" id="name" class="validate" value="{{$user->name}}">
                                <label for="name">Name</label>

                                
                                <span class="{{$errors->has('name') ? 'helper-text red-text' : '' }}">{{$errors->first('name')}}</span>
                            </div>

                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="surname" id="surname" class="validate" value="{{ $user->surname }}">
                                <label for="surname">Surname</label>

                                
                                <span class="{{$errors->has('surname') ? 'helper-text red-text' : '' }}">{{$errors->first('surname')}}</span>
                            </div>

                            <div class="input-field no-margin">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" value="{{$user->email}}">
                                <label for="email">E-mail</label>
                                <span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <br>
                            <div class="input-field no-margin">

                                <select class="selectpicker form-control" name="role" id="role">
                                    <option value="" disabled>Crew member's rank</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{old('role') ? 'selected' : ''}} {{ $user->role==$role ? 'selected' : '' }} >{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <!-- <label for="role">Rank</label>  -->
                            </div>
                          <br>  
                          <div class="input-field no-margin">

                                <select class="selectpicker form-control" name="ship" id="ship">
                                    <option value="" disabled>Crew member's ship</option>
                                    @foreach($ships as $ship)
                                        <option value="{{$ship->id}}" {{old('ship') ? 'selected' : ''}} {{ $user->ship==$ship ? 'selected' : '' }}>{{$ship->name}}</option>
                                    @endforeach
                                </select>
                                <!-- <label for="role">Rank</label>  -->
                            </div>
                            <!-- <div class="input-field no-margin">

                                <select class="selectpicker form-control" name="ship" id="ship">
                                    <option value="$user->ship_id">{{$user->ship->name}}</option>
                                    @foreach($ships as $ship)
                                        <option value="{{$ship->id}}">{{$ship->name}}</option>
                                    @endforeach
                                </select>
                                <label for="ship">Ship</label>
                            </div> -->
                            <br>
                            <br>  <br><br><br> 
                            @method('PUT')                     
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Store</button>
                        </form>
                    </div>
                </div>
                

                <div class="card-action">
                    <a href="{{route('admin.users.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection