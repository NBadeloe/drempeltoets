<?php

namespace App\Exports;

use App\Activiteiten;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActiviteitenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Activiteiten::all();
    }
}
