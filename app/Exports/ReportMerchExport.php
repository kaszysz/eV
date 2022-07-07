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
    $tmpArray = array();
    foreach ($reportMerch->RetailerPricings as $retailerPricing) {
      array_push(
        $tmpArray,
        [
          $reportMerch->id,
          $reportMerch->user->name . ' ' . $reportMerch->user->surname,
          $reportMerch->shop->retailer->name,
          $reportMerch->shop->city->name,
          $reportMerch->shop->street,
          $retailerPricing?->product->producer->name ?? 'Empty',
          $retailerPricing?->product->size->name ?? 'Empty',
          $retailerPricing?->product->matrix->name ?? 'Empty',
          $retailerPricing?->product->refresh_rate->name ?? 'Empty',
          $retailerPricing?->product->processor->name ?? 'Empty',
          $retailerPricing?->product->ram->name ?? 'Empty',
          $retailerPricing?->product->disc->name ?? 'Empty',
          $retailerPricing?->product->graphic_card->name ?? 'Empty',
          $retailerPricing?->product->os->name ?? 'Empty',
          $retailerPricing?->price ?? 'Empty',
          $retailerPricing?->sale ?? 'Empty',
          $retailerPricing?->bonus ?? 'Empty',
          $retailerPricing?->bonus_value ?? 'Empty',
          $reportMerch->created_at
        ]
      );
    }
    return $tmpArray;
  }

  public function headings(): array
  {
    return [
      '#', 'User', 'Retailer', 'City', 'Street', 'Producer', 'Size', 'Matrix', 'Refresh Rate', 'Processor', 'Ram', 'Disc', 'Graphic Card', 'OS', 'Price', 'Sale', 'Bonus', 'Bonus Value'
    ];
  }
}
