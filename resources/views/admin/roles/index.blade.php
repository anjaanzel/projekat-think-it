@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="black-text text-darken-1 center">Ranks</h4>
    
    <div class="row justify-content-center" >
  
        <div class="card col s4 m4 l xl4">
            <div class="card-content">
                <div class="row">
            
                    <br>
                    <table class="responsive-table col s8 m8 l8 xl8">
                        <thead class="grey-text text-darken-2">
                            <tr>

                                <th class="center">Name</th>
                                <th class="center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dept-table">
                            
                            @if($roles->count())
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="center">{{$role->name}}</td>
                                        <td class="center">
                                            <div class="row mb-0">
                                              <div class="col">
              
                                                    <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">

                                                    <form action="{{route('admin.roles.destroy',$role->id)}}" method="POST">
                    
                                                        @method('DELETE')

                                                        @csrf()
                                                        <button type="submit" class="btn btn-floating btn-small waves=effect waves-light red"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                              
                                <tr>
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">There are no roles.</h6></td>
                                </tr>
                            @endif

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- Card END -->
    </div>
</div>


<div class="fixed-action-btn">
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('admin.roles.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection