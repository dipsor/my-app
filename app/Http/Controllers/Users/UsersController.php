<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show($id)
    {
        return view('users.show', ['id' => $id]);
    }
}
