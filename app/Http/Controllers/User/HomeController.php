<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        

        $users = DB::table('book_user')
            ->join('book', 'book_user.book_id', '=', 'book.id')
            ->join('users', 'book_user.user_id', '=', 'users.id')
            ->select('book_user.*', 'book.title','book.price', 'users.name')
            ->where('book_user.user_id',$user_id)
            ->get();

        $payments = $users;
        return view('user.home')->with('payments',$payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $roles = Role::all();

        // return view('admin.users.edit')->with([
        //     'user'=> $user,
        //     'roles'=> $roles,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // $user->roles()->sync($request->roles);
        
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->save();


        // return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // $user->roles()->detach();
        // $user->delete(); 

        // return redirect()->route('admin.users.index');
    }
}
