<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LINEAuthenticatedController extends Controller
{
    /**
     * @return RedirectResponse LINE ログイン画面
     */
    public function create(): RedirectResponse
    {
        // LINEログイン画面表示
        return Socialite::driver('line')->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        //TODO:解析中
        logger($request);
        return redirect()->route('line.login');
    }
}
