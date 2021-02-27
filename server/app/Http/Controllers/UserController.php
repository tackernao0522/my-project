<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PostApp;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        $postApps = $user->postApps->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'postApps' => $postApps,
        ]);
    }

    public function likes(String $name)
    {
        $user = User::where('name', $name)->first();

        $postApps = $user->likes->sortByDesc('created_at');
        // dd($postApps);

        return view('users.likes', [
            'user' => $user,
            'postApps' => $postApps,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
