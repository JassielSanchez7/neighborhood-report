<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RatingsReportExport implements FromView
{
    public function __construct(
        protected $ratings
    ) {}

    public function view(): View
    {
        return view('exports.ratings-report', [
            'ratings' => $this->ratings
        ]);
    }
}