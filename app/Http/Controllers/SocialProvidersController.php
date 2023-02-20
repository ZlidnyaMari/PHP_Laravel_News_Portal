<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\Contracts\Social;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse as SymfonyRedirectResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class SocialProvidersController extends Controller

{
    public function redirect(string $driver): SymfonyRedirectResponse | RedirectResponse //получает токен от соцсети
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback(string $driver, Social $social): Redirector | Application | RedirectResponse  // получает данные от соц сети
    {
        return redirect($social->loginAndGetRedirectUrl(
            Socialite::driver($driver)->user())
        );


    }
}
