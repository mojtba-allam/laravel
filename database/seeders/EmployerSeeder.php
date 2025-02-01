<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmployerSeeder extends Seeder
{
    public function run()
    {
        // Ensure that a user exists before creating employers
        $user = User::first() ?? User::factory()->create();

        Employer::factory()->count(10)->create([
            'user_id' => $user->id, // Ensure user_id is set
        ]);
    }
}
