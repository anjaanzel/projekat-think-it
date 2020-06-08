@extends('layouts.app')
@section('content')
<div class="container">
    <h4 class="grey-text text-darken-2">Ships</h4>
    
    <div class="row">
  
        <div class="card col s12 m12 l12 xl12">
            <div class="card-content">
                <div class="row">
            
                    <br>
                    <table class="responsive-table col s12 m12 l12 xl12">
                        <thead class="grey-text text-darken-2">
                            <tr>
                                <th class="center" style="width:15%;"></th>
                                <th class="center">Name</th>
                                <th class="center">Serial number</th>
                                <th class="center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="dept-table">
                            
                            @if($ships->count())
                                @foreach($ships as $ship)
                                    <tr>
                                        <td style="width:15%;" class="center">
                                        <img class="img-fluid" src="{{asset('img/ships/'.$ship->image)}}">
                                    </td>
                                        <td width="23%" class="center">{{$ship->name}}</td>
                                        <td class="center" width="62%" >{{$ship->serial_no}}</td>
                                        <td class="center" width="15%">
                                            <div class="row mb-0">
                                              <div class="col">
              
                                                    <a href="{{route('admin.ships.edit',$ship->id)}}" class="btn btn-floating btn-small waves=effect waves-light orange"><i class="material-icons">mode_edit</i></a>
                                                </div>
                                                <div class="col">

                                                    <form action="{{route('admin.ships.destroy',$ship->id)}}" method="POST">
                    
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
                                    <td colspan="5"><h6 class="grey-text text-darken-2 center">There are no ships.</h6></td>
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
    <a class="btn-floating btn-large waves=effect waves-light red" href="{{route('admin.ships.create')}}">
        <i class="large material-icons">add</i>
    </a>
</div> 
@endsection