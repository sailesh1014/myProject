<?php
declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\GenreService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller {

    public function index(): View
    {
        return view('front.index');
    }

    public function emailVerified(): view
    {
        return view('auth.email-verified');
    }

}
