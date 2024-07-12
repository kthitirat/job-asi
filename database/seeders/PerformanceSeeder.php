<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Performance;
use App\Models\User;

class PerformanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach ($users as $user) {
            Performance::factory()->create([
                'user_id' => $user->id,
            ]);
        }

        //Performance::factory()->count(10)->create();
    }
}
