<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NeighborsReportExport implements FromView
{
    public function __construct(
        protected $neighbors
    ) {}

    public function view(): View
    {
        return view('exports.neighbors-report', [
            'neighbors' => $this->neighbors
        ]);
    }
}