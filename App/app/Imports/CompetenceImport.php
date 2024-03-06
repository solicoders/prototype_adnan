<?php

namespace App\Imports;

use App\Models\Competence\Competence;
use Maatwebsite\Excel\Concerns\ToModel;

class CompetenceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Competence([

                'title' => $row[1],
                'description' => $row[2], 
                'module_id' => $row[3],  
        ]);
    }
}
