<?php

namespace App\Observers;

use App\Models\ReportMerch;
use Illuminate\Support\Facades\Session;

class ReportMerchObserver
{
    public function created(ReportMerch $reportMerch)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Report Merch: ' . $reportMerch->id . ' has been created']);
    }

    public function updated(ReportMerch $reportMerch)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Report Merch: ' . $reportMerch->id . ' has been updated']);
    }

    public function deleted(ReportMerch $reportMerch)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Report Merch: ' . $reportMerch->id . ' has been deleted']);
    }

    public function restored(ReportMerch $reportMerch)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Report Merch: ' . $reportMerch->id . ' has been restored']);
    }

    public function forceDeleted(ReportMerch $reportMerch)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Report Merch: ' . $reportMerch->id . ' has been removed']);
    }
}
