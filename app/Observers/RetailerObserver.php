<?php

namespace App\Observers;

use App\Models\Retailer;
use Illuminate\Support\Facades\Session;

class RetailerObserver
{
    /**
     * Handle the Retailer "created" event.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return void
     */
    public function created(Retailer $retailer)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Retailer ' . $retailer->name . ' has been created']);
    }

    /**
     * Handle the Retailer "updated" event.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return void
     */
    public function updated(Retailer $retailer)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Retailer ' . $retailer->name . ' has been updated']);
    }

    /**
     * Handle the Retailer "deleted" event.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return void
     */
    public function deleted(Retailer $retailer)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Retailer ' . $retailer->name . ' has been deleted']);
    }

    /**
     * Handle the Retailer "restored" event.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return void
     */
    public function restored(Retailer $retailer)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Retailer ' . $retailer->name . ' has been restored']);
    }

    /**
     * Handle the Retailer "force deleted" event.
     *
     * @param  \App\Models\Retailer  $retailer
     * @return void
     */
    public function forceDeleted(Retailer $retailer)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Retailer ' . $retailer->name . ' has been removed']);
    }
}
