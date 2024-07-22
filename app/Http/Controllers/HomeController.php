<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard for normal users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        return view('_users.home');
    } 
  
    /**
     * Show the application dashboard for admin users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('_admins.home');
    }
  
    /**
     * Show the application dashboard for ketua users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ketuaHome(): View
    {
        return view('_ketuas.home');
    }

    /**
     * Show the application dashboard for member users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function memberHome(): View
    {
        return view('_members.home');
    }
}
