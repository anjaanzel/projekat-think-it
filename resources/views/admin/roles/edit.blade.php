@extends('layouts.app')
@section('content')
    <div class="container">
        <br><br>
        <div class="row" style="width:800px;">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15"  >
                <h4 class="center grey-text text-darken-2 card-title">Edit role {{$role->name}}</h4>
                <div class="card-content" style="width: 32%; margin: 0 auto;">
                    <div class="row">
                       
                        <form action="{{route('admin.roles.update', $role)}}" method="POST">
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="name" id="name" class="validate" value="{{ $role->name }}">
                                <label for="name">Name</label>

                                
                                <span class="{{$errors->has('name') ? 'helper-text red-text' : '' }}">{{$errors->first('name')}}</span>
                            </div>
                            <br>
                            
                            @method('PUT')                
                            @csrf()
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Store</button>
                        </form>
                    </div>
                </div>
                
                <div class="card-action">
                    <a href="{{route('admin.roles.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection