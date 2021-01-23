<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\LoginValidation;
use App\Http\Requests\Api\v1\RegisterValidation;
use App\Http\Resources\v1\User\UserResource;
use App\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    use ThrottlesLogins;
    public function login(LoginValidation $loginValidation){


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($loginValidation)) {
            $this->fireLockoutEvent($loginValidation);

            return $this->sendLockoutResponse($loginValidation);
        }

        if (!filter_var($loginValidation->get($this->username()), FILTER_VALIDATE_EMAIL)){
            $loginValidation['mobile']=$loginValidation->get('email');
            unset($loginValidation['email']);
        }
        if (auth()->attempt($loginValidation->validated())) {
            $token=auth()->user()->createToken('Api token for android');
            $this->clearLoginAttempts($loginValidation);

            if (auth()->user()->type == 1 )
                auth()->user()->logType = 1;
            elseif ( count (auth()->user()->company()->get() ) >0 )
                auth()->user()->logType = 2;
            else auth()->user()->logType = 0;
            return new UserResource(auth()->user(),$token);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($loginValidation);
        return $this->sendFailedLoginResponse($loginValidation);

    }

    public function username(){
        return 'mobile';
    }

    public function register(RegisterValidation $registerValidation){
        do {
            $api_token = Str::random(191);
        } while (User::where('api_token',$api_token)->exists());



        $user =User::create([
            'name' => $registerValidation['name'],
            'mobile' => $registerValidation['mobile'],
            'password' => bcrypt($registerValidation['password']),
            'api_token'=>$api_token,
        ]);

        $token= $user->createToken('Api token for android');

        return new UserResource($user,$token);


    }

    public function show(){
        return auth()->user();
    }
}
