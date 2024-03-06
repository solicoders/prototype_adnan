<?php

namespace App\Exports;

use App\Models\Module\Module;
use Maatwebsite\Excel\Concerns\FromCollection;

class ModuleExport implements FromCollection
{
   
    public function collection()
    {
        return Module::all();
    }
}
