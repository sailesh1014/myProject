<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller {

    public function index(): RedirectResponse|View
    {
        if(Auth::check()){
            return  redirect(get_user_home_page());
        }
        return view('front.index');
    }

    public function home(): View
    {
        return view('front.home');
    }


    public function emailVerified(): view
    {
        return view('auth.email-verified');
    }

}
