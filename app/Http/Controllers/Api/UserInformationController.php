<?php

namespace App\Http\Controllers\Api;

use App\Domains\User\Models\User;
use App\Domains\User\Services\UserService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserInformationResource;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        return response()->json(new UserInformationResource($user->load('profile')));
    }
}
