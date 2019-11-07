<?php

namespace App\Exports;

use App\Jeux;
use Maatwebsite\Excel\Concerns\FromCollection;

class JeuxExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jeux::all();
    }
}
