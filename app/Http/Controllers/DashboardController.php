<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function viewDash(){

        $users = User::all();
        return view('dashboard', compact('users'));
        

    }

    public function viewWelcome(){
        $users = User::all();
        return view('welcome', compact('users'));
    }
}
