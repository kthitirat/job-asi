<?php

namespace App\Actions;

use App\Models\Announcement;
use App\Models\Article;
use App\Models\User;
use App\Models\Role;
use DOMDocument;
use Illuminate\Support\Str;

class RegisterUserAction
{
    protected User $user;

    public function execute(User $user, array $data): User
    {
        $userRole = Role::where('name','user')->first();
        $this->user = $user;
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = bcrypt($data['password']);
        $this->user->role_id = $userRole->id;
        $this->user->save();
        return $this->user->fresh();
    }


}
