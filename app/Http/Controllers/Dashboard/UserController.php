<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Transformers\UserTransformer;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::paginate(30);
        $userData = fractal($users, new UserTransformer())->toArray();
        return Inertia::render('Dashboard/User/Index')->with([
            'users' => $userData
        ]);
    }

    public function edit(User $user)
    {
        $userData = fractal($user, new UserTransformer())->toArray();
        return Inertia::render('Dashboard/User/Edit')->with([
            'user' => $userData
        ]);
    }

    public function destroy(User $user)
    {     
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'user deleted');
    }
        
}
