@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col-xl s4 m4 offset-m4 l6 offset-l4 xl8 offset-xl6 card-mt-15">
            
                <h4 class="center grey-text text-darken-2 card-title">Add a new crew member</h4>
                <div class="card-content" style="width: 32%; margin: 0 auto;">
                    <div class="row">
                       
                        <form action="{{route('admin.users.store')}}" method="POST">
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="name" id="name" class="validate" value="{{ Request::old('name') ? : '' }}">
                                <label for="name">Name</label>

                                
                                <span class="{{$errors->has('name') ? 'helper-text red-text' : '' }}">{{$errors->first('name')}}</span>
                            </div>

                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="surname" id="surname" class="validate" value="{{ Request::old('surname') ? : '' }}">
                                <label for="surname">Surname</label>

                                
                                <span class="{{$errors->has('surname') ? 'helper-text red-text' : '' }}">{{$errors->first('surname')}}</span>
                            </div>

                            <div class="input-field no-margin">
                                <i class="material-icons prefix">email</i>
                                <input type="email" name="email" id="email" value="{{Request::old('email') ? : ''}}">
                                <label for="email">E-mail</label>
                                <span class="{{$errors->has('email') ? 'helper-text red-text' : ''}}">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                            <br>
                            <div class="input-field no-margin">

                                <select class="selectpicker form-control" name="role" id="role">
                                    <option value="#">Crew member's rank</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <!-- <label for="role">Rank</label>  -->
                            </div>
                          <br>  
                            <div class="input-field no-margin">

                                <select class="selectpicker form-control" name="ship" id="ship">
                                    <option value="#">Crew member's ship</option>
                                    @foreach($ships as $ship)
                                        <option value="{{$ship->id}}">{{$ship->name}}</option>
                                    @endforeach
                                </select>
                               <!--  <label for="ship">Ship</label> -->
                            </div>
                            <br>
                            <br>  <br><br><br>                      
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Add</button>
                        </form>
                    </div>
                </div>
                
                <script>
            $('#image').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>

                <div class="card-action">
                    <a href="{{route('admin.users.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection