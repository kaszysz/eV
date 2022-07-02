<?php

namespace App\Http\Controllers;

use App\Exports\ReportMerchExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportMerchExportController extends Controller
{
    public function export(Request $request)
    {
        $datesArray = array(
            Carbon::parse($request->dateStart),
            Carbon::parse($request->dateEnd)->addHours(24)
        );
        return Excel::download(new ReportMerchExport($datesArray), 'file.xlsx');
    }
}
