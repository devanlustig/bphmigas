<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('admin')->only('index'); */
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexxx()
    {
        return view('home');
    }

    public function index()
    {
        $role = Auth::user()->hak_akses;
        if($role == "admin"){
            return redirect()->to('admin');
        } else if($role == "user"){
            return redirect()->to('user');
        } else {
            return redirect()->to('logout');
        }
    }
}
