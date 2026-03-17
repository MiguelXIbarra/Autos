<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'address' => 'required',
            'email' => 'required|email'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->status = 1;
        $user->save();

        return redirect()->route('users.index')
            ->with('message', 'El usuario se ha guardado correctamente');
    }
}
