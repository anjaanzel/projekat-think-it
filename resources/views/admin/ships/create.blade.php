@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card col s12 m8 offset-m2 l8 offset-l2 xl8 offset-xl2 card-mt-15">
                <h4 class="center grey-text text-darken-2 card-title">Add a new ship</h4>
                <div class="card-content" style="width: 50%; margin: 0 auto;">
                    <div class="row">
                       
                        <form action="{{route('admin.ships.store')}}" method="POST" enctype="multipart/form-data">
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="name" id="name" class="validate" value="{{ Request::old('name') ? : '' }}">
                                <label for="name">Name</label>

                                
                                <span class="{{$errors->has('name') ? 'helper-text red-text' : '' }}">{{$errors->first('name')}}</span>
                            </div>
                            <br>
                            <div class="input-field no-margin">
                            <i class="material-icons prefix">account_balance</i>
                     
                                <input type="text" name="serial_no" id="serial_no" class="validate" maxlength="8" value="{{ Request::old('serial_no') ? : '' }}">
                                <label for="serial_no">Serial number</label>

                                
                                <span class="{{$errors->has('serial_no') ? 'helper-text red-text' : '' }}">{{$errors->first('serial_no')}}</span>
                            </div>
                            <br><br>
            
                            
                              <div class="file-field input-field">
                                <div class="btn btn-primary btn-sm float-left">
                                  <span>Choose file</span>
                                  <input type="file" id="image" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text" placeholder="Upload your file" value="{{old('image') ? : '' }}">
                                  <span class="{{$errors->has('image') ? 'helper-text red-text' : ''}}">{{$errors->has('image') ? $errors->first('image') : ''}}</span>
                                </div>
                              </div>
                              <br><br>

                                                        
                            @csrf()
                            <br><br>
                            <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Add</button>
                        </form>
                    </div>
                </div>
                
                <script>
            $('#image').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.image').html(fileName);
            })
        </script>

                <div class="card-action">
                    <a href="{{route('admin.ships.index')}}">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection