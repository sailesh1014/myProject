<?php
declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('dashboard.index');
    }
}
