<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use App\Providers\RouteServiceProvider;

use Auth;



class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('show', 'resend');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

   // public function verify(Request $request)
   //  {
   //      if (! $this->guard()->onceUsingId($request->route('id'))) {
   //          throw new AuthorizationException;
   //      }

   //      $user = $this->guard()->user();
   //      if ($user->hasVerifiedEmail()) {
   //          return redirect($this->redirectPath());
   //      }

   //      if ($user->markEmailAsVerified()) {
   //          event(new Verified($user));
   //      }

   //      return redirect($this->redirectPath())->with('verified', true);;
   //  }

   //   protected function guard()
   //  {
   //      return Auth::guard();
   //  }
}