@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
         


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  
                  <a href="{{route('admin.users.index') }}" class="white-text" >
                <div class=" center mx-20 card-panel pink lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7" >
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Crew members</h6>
                        </div>
                       
                    </div>
                </div>
            </a>

             <a href="{{route('admin.notifications.create') }}" class="white-text">
                <div class="center mx-20 card-panel teal lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Notifications</h6>
                        </div>
                       
                    </div>
                </div>
            </a>

            <a href="{{route('admin.ships.index') }}" class="white-text">
                <div class="center mx-20 card-panel green lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Ships</h6>
                        </div>
                       
                    </div>
                </div>
            </a>

            <a href="{{route('admin.roles.index') }}" class="white-text">
                <div class="center mx-20 card-panel orange lighten-1 col s8 offset-s2 m4 offset-m2 l4 offset-l2 xl2 offset-xl1 ml-14">
                    <div class="row">
                        <div class="col s7 xl7">
                            <i class="material-icons medium white-text pt-5">person</i>
                            <h6 class="no-padding txt-md">Ranks</h6>
                        </div>
                       
                    </div>
                </div>
            </a>
       

                 
                </div>
            
            </div>
        </div>
    </div>
</div>
@endsection
