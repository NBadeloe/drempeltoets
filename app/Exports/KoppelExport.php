<?php

namespace App\Exports;

use App\Koppel;
use Maatwebsite\Excel\Concerns\FromCollection;

class KoppelExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Koppel::all();
    }
}
