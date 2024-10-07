<?php

namespace App\Http\Controllers\User;

use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    public function index(User $user)
    {
        return view('user.dashboard.index', ['user' => $user]);
    }
}
