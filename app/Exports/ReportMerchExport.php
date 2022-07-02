<?php

namespace App\Exports;

use App\Models\ReportMerch;
use App\Services\DisplayName;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReportMerchExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{

    use Exportable;

    function __construct($datesArray)
    {
        $this->datesArray = $datesArray;
        $this->displayName = new DisplayName();
    }

    public function collection()
    {
        return ReportMerch::getAllCreatedAtBetween($this->datesArray)->get();
    }


    public function map($reportMerch): array
    {
        return [
            $reportMerch->id,
            $reportMerch->user->name . ' ' . $reportMerch->user->surname,
            $reportMerch->shop->retailer->name,
            $reportMerch->shop->city->name,
            $reportMerch->shop->street,
            $reportMerch->retailerPricing?->product->producer->name,
            $reportMerch->created_at
        ];
    }

    public function headings(): array
    {
        return [
            '#', 'user name', 'street', 'created at'
        ];
    }
}
