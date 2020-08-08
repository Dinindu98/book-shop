<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Payment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

       // $posts = Post::whereDate('created_at', Carbon::today())->get();
        return view('admin.home')->with('payments',$payments);
    }
}
