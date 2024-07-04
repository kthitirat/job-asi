<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(ProfessorSeeder::class);
        $this->call(SubjectSeeder::class);
//        $this->call(RoleSeeder::class);
//        $this->call(UserSeeder::class);
//        $this->call(AnnouncementTypeSeeder::class);
//        $this->call(AnnouncementCategorySeeder::class);
//        $this->call(AnnouncementSeeder::class);
//        $this->call(ApplicantSeeder::class);

    }
}
