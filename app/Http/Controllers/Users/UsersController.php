<?php

namespace App\Http\Controllers\Users;

use App\Users\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', ['users' => $users]);
    }
}
