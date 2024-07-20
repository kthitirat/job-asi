<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Actions\Dashboard\SaveUserAction;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Transformers\UserTransformer;
use Inertia\Inertia;
use App\Http\Requests\Dashboard\CreateOrUpdateUserRequest;

class UserController extends Controller
{
    public function index() 
    {
        $users = User::orderBy('created_at', 'desc')->paginate(30);
        $userData = fractal($users, new UserTransformer())->toArray();
        return Inertia::render('Dashboard/User/Index')->with([
            'users' => $userData
        ]);
    }

    public function edit(User $user)
    {
        $userData = fractal($user, new UserTransformer())->toArray();
        $roles = Role::all()->toArray();

        return Inertia::render('Dashboard/User/Edit')->with([
            'user' => $userData,
            'roles' =>  $roles,
        ]);
    }

    public function update(CreateOrUpdateUserRequest $request, User $user, SaveUserAction $action)
    {
        $action->execute($user, $request->validated());
        return redirect()->route('dashboard.users.index')->with(['success' => "User was successfully updated"]);
    }

  
    public function destroy(User $user)
    {     
        $user->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'user deleted');
    }
        
}
