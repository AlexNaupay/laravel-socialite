<?php


namespace App\Http\Controllers\Auth;


use App\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

use Exception;

use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle(){
        Log::debug('Redirect To ... ');
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     */
    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->user();

        $create['name'] = $user->getName();
        $create['email'] = $user->getEmail();
        $create['google_id'] = $user->getId();
        $create['password'] = bcrypt('alexh');

        $userModel = new User;
        $createdUser = $userModel->addNew($create);

        Auth::loginUsingId($createdUser->id);

        return redirect()->route('home');
    }

}