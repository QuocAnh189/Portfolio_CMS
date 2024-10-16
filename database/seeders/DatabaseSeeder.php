<?php

namespace Database\Seeders;

use App\Domains\Profile\Models\Profile;
use App\Domains\User\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('12345678'),
        ]);

        Profile::create([
            'user_id' => $user->id,
        ]);

        $this->call(CategoriesSeed::class);
        $this->call(MajorsSeed::class);
        $this->call(RoleSoftwaresSeed::class);
        $this->call(TechnologiesSeed::class);
    }
}
