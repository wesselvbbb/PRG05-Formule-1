<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show(User $user)
    {

        if ($user = Auth::user()) {
            return view('users.show', compact('user'));
        } else {
            return redirect(route('home'));
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('id', 'user'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user->update($request->all());
        $user->save();

        return redirect(route('user.show', $user->id));
    }
}
