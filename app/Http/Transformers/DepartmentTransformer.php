<?php

namespace App\Http\Transformers;


use App\Models\Department;
use App\Models\Subject;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class DepartmentTransformer extends TransformerAbstract
{

    public function transform(Department $department): array
    {
        $data = [
            'id' => $department->id,
            'name' => $department->name,
        ];
        return $data;
    }


}
