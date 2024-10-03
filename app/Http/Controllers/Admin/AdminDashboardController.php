<?php

namespace App\Http\Controllers\Admin;

use App\Domains\User\Models\User;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function index(User $user)
    {
        return view('admin.dashboard.index');
    }
}
