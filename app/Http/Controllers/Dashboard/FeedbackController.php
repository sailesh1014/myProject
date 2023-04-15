<?php
declare(strict_types = 1);
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
         $feedbacks = DB::table('feedback')->join('users', 'users.id', 'feedback.user_id')
              ->get()->groupBy('user_name');
          return view('dashboard.feedbacks.show', compact('feedbacks'));
    }

    public function destroy($id)
    {

    }
}
