@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($notifications as $notification)
            <div class="card" style="opacity:0.8;">
                <b><div class="card-header black-text text-darken-1">{{$notification->created_at}}</div></b>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                
                    
                    <div >
                    <form action={{route('markAsRead', $notification->id)}} method="POST">
                      @csrf
                      {{method_field('POST')}}
                    <div class="card-box">
                    
                    <b><p class="mbr-text mbr-fonts-style align-center mbr-light display-7 black-text text-darken-1">{{$notification->content}}</p></b>
                 

                </div>
               <!--      <button type="submit" class="btn waves-effect waves-light mt-15 col s6 offset-s3 m4 offset-m4 l4 offset-l4 xl4-offset-xl4">Mark as read</button>
 -->
                   @if (is_null($notification->user()->where('user_id', Auth::user()->id)->first()->pivot->read_at))
                        <button type="submit" class="btn-floating btn-small waves=effect waves-light red float-left">
                            <i class="large material-icons">done</i>
                        </button>
                    
                    @else
                        <button type="submit" class="btn-floating btn-small waves=effect waves-light teal float-left">
                            <i class="large material-icons">done</i>
                        </button>
                        @endif
                    <br><br><br>
                    </form>
                    </div>
                    
                
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
