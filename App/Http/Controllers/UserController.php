<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /* 
    public function index()
    {
        $users = User::all();

        return view('twitter.index',['users' => $users]);
    } */

    public function mypost()
    {
        $users = User::all();

        return view('myDatabase.mypost',['users' => $users]);
    }
}
