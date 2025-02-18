<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        Fortify::loginView(Function(){
            return view('auth.login');
        });
        Fortify::registerView(Function(){
            return view('auth.register');
        }); 
        
        Fortify::requestPasswordResetLinkView(function(){
            return view('auth.forgot-password');
        });
        Fortify::resetPasswordView(function($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

        Fortify::verifyEmailView(function() {
            return view('auth.verify-email');
        });

        Fortify::confirmPasswordView(function() {
            return view('auth.confirm-password');
        });

        Fortify::twoFactorChallengeView(function() {
            return view('auth.two-factor-challenge');
        });
    }
}
