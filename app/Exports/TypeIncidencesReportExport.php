<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TypeIncidencesReportExport implements FromView
{
    public function __construct(
        protected $typeIncidences
    ) {}

    public function view(): View
    {
        return view('exports.typeincidences-report', [
            'typeincidences' => $this->typeIncidences
        ]);
    }
}
