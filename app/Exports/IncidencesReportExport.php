<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncidencesReportExport implements FromView
{
    public function __construct(
        protected $incidences,
        protected array $filters
    ) {}

    public function view(): View
    {
        return view('exports.incidences-report', [
            'incidences' => $this->incidences,
            'filters' => $this->filters,
        ]);
    }
}