<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Payment;
use App\Book;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $trendigBook = Payment::select('book_id',DB::raw('COUNT(id) as cnt', 'book_id'))
        ->where('created_at', '>=', Carbon::today())
        ->groupBy('book_id')->orderBy('cnt', 'DESC')->first();

        $payments = DB::table('book_user')
            ->join('book', 'book_user.book_id', '=', 'book.id')
            ->join('users', 'book_user.user_id', '=', 'users.id')
            ->select('book_user.*', 'book.title','book.price', 'users.name')
            ->where('book_user.created_at', '>=', Carbon::today()->startOfMonth()->subMonth(2))
            ->get();

            
        //$payments = $users->where('created_at', '>=', Carbon::today()->startOfMonth()->subMonth(2))->get();
        
        $books = Book::all();
       // $posts = Post::whereDate('created_at', Carbon::today())->get();
       return view('admin.home')->with('payments',$payments);
       
    }

    public function userList(){

        $payments = DB::table('users')          
            ->join('book_user', 'book_user.user_id', '=', 'users.id')
            ->join('book', 'book.id', '=', 'book_user.book_id')
            ->select('users.name as name', DB::raw('SUM(book_user.quantity * book.price) as total_payment'))
            ->groupBy('users.id')
            ->get();

        return view('admin.user-list')->with('payments',$payments);
    }
}
