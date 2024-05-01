<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(String $id)
    {

    }

    public function update(Request $request, String $id)
    {

    }
}
