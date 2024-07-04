<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()->create([
            'name' => 'คณะวิทยาการจัดการ'
        ]);
        Department::factory()->create([
            'name' => 'คณะครุศาสตร์'
        ]);
        Department::factory()->create([
            'name' => 'คณะมนุษยศาสตร์และสังคมศาสตร์'
        ]);
        Department::factory()->create([
            'name' => 'คณะวิทยาศาสตร์และเทคโนโลยี'
        ]);
        //Department::factory()->count(20)->create();
    }
}
