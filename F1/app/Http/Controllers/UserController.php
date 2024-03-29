<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show(User $id)
    {
        $posts = Post::where('user_id', Auth::user()->id)->get();
        if ($user = Auth::user()) {
            return view('users.show', compact('user', 'posts'));
        } else {
            return redirect(route('home'));
        }
    }

    public function edit($id)
    {
        // User can only edit its own profile
        if ($id != auth()->id()){
            abort(403);
        }
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
