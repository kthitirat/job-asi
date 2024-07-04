<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Professor;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Professor::factory()->create([
            'prefix' => 'ดร.',
            'first_name' => 'มรุต',
            'last_name' => 'กลัดเจริญ',
            'department_id' => Department::first()->id ?? Department::factory()
        ]);
        Professor::factory()->count(10)->create();
        $professors = Professor::all();
        foreach ($professors as $professor) {
            $professor->addMedia(storage_path('seed/mock_professor_image.jpeg'))->preservingOriginal()
                ->toMediaCollection(Professor::MEDIA_COLLECTION_IMAGE);
        }
    }
}
