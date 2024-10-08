<?php

namespace App\Domains\Profile\Repositories;

use App\Domains\Profile\Models\Profile;
use App\Domains\User\Models\User;
use App\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Hash;

class ProfileRepository extends BaseRepository
{
    public function model()
    {
        return Profile::class;
    }

    public function findProfileByUserId($id)
    {
        return Profile::with('user')->where('user_id', $id)->first();
    }

    public function updatePassword($dataDto)
    {
        $user = User::find($dataDto['user_id']);
        $user->update([
            'password' => Hash::make($dataDto['new_password'])
        ]);
        return $user;
    }
}
