<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Socilite Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth/{provider}/redirect', function ($provider) {
 
    return Socialite::driver($provider)->redirect();
});
 
Route::get('/auth/{provider}/callback', function ($provider) {
   
    try {
        $socialiteUser = Socialite::driver($provider)->user();
    } catch (\Throwable $th) {
        return redirect()->route('login');
    }

 
    $user = User::where([
        'provider' => $provider,
        'provider_id' => $socialiteUser->getId()
    ])->first();

    if (!$user) {

        $validator = Validator::make(
            ['email' => $socialiteUser->getEmail()],
            ['email' => ['unique:users,email']],
            ['email.unique' => 'Couldn\'t log in.  Maybe You used a different login method?']
        );

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator);
        }

        User::insert([
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'email_verified_at' => now(),
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
        ]);

        
        $user = User::updateOrCreate(
            [
                'provider_id' => $socialiteUser->getId(),
            ], [
            'name' => $socialiteUser->getName(),
            'email' => $socialiteUser->getEmail(),
            'email_verified_at' => now(),
            'provider' => $provider,
            'provider_id' => $socialiteUser->getId(),
        ]);

    }
 


    Auth::login($user);

    return redirect('/');
});
