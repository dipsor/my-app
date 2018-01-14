<?php

namespace App\Http\Controllers\Admin\Users;

use App\Users\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }
}
