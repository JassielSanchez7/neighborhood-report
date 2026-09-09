<?php

namespace App\Exports;

use App\Models\Incidence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class IncidencesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(
        protected $startDate = null,
        protected $endDate = null,
        protected $status = null,
    ) 
    {}



    public function collection()
    {
        return Incidence::query()
            ->when($this->startDate, fn($q) =>
                $q->whereDate('created_at', '>=', $this->startDate))
            ->when($this->endDate, fn($q) =>
                $q->whereDate('created_at', '<=', $this->endDate))
            ->when($this->status, fn($q) =>
                $q->where('status', $this->status))
            ->get([
                'id',
                'description',
                'location',
                'status',
                'occurred_at',
                'created_at',
            ]);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Descripción',
            'Ubicación',
            'Estado',
            'Fecha de Ocurrencia',
            'Fecha de Registro',
        ];
    }

}
