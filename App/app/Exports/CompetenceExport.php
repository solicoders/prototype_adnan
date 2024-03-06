<?php

namespace App\Exports;

use App\Models\Competence\Competence;
use Maatwebsite\Excel\Concerns\FromCollection;

class CompetenceExport implements FromCollection
{

    public function collection()
    {
        return Competence::all();
    }
}
