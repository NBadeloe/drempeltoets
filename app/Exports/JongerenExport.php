<?php

namespace App\Exports;

use App\Jongeren;
use Maatwebsite\Excel\Concerns\FromCollection;

class JongerenExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jongeren::all();
    }
}
