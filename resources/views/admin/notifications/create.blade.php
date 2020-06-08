@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="black-text text-darken-1 center">New notification</h4>
    <div class="row justify-content-center">
        <div class="col-md-8">
              <br>   
            <div class="card">

       

                <div class="card-body">
                  <form action={{route('admin.notifications.store')}} method="POST" enctype="multipart/form-data">
                    @csrf
                   {{method_field('POST')}} 
                      
                    <div class="form-group">
                          <label for="content">Enter notification content here</label>
                          <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                        </div>


                    <!-- <label for="role_id" class="control-label mb-1">Ranks</label>
                        <div class="input-group col-lg-12">
                          <select multiple="multiple" name="role_id" id="role_id" class="form-control">
                            <option value="">Please Select</option>
                            @foreach ($roles as $role)
                              <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                          </select>
                        </div> -->

                  <div class="form-group">
                      <label for="roles">Select recipient ranks</label>
                      <select multiple class="form-control" id="roles" name="roles[]">
                        
                         @foreach($roles as $role)
                         <option value="{{$role->id}}">
                            {{$role->name}}
                        </option>
                      @endforeach 
                        
                      </select>
                    </div>
                  <!-- <div class="input-field col s12 m12 l12 xl8 offset-xl2">     
                    <div class="form-check form-check-inline" name="roles" id="roles">
                      @foreach($roles as $role)
                            <input class="form-check-input" type="checkbox" id="cb" name="cb" value="$role">
                            <label class="form-check-label" for="cb">{{$role->name}}</label>
                      @endforeach
                    </div>
                  </div> -->
                    

                    <!-- <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                            <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                    </div> -->
                  

                      <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Send</button>


                  </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
