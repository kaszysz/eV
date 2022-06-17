<?php

namespace App\Observers;

use App\Models\City;
use Illuminate\Support\Facades\Session;

class CityObserver
{
    /**
     * Handle the City "created" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function created(City $city)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'City ' . $city->name . ' has been created']);
    }

    /**
     * Handle the City "updated" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function updated(City $city)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'City ' . $city->name . ' has been updated']);
    }

    /**
     * Handle the City "deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function deleted(City $city)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'City ' . $city->name . ' has been deleted']);
    }

    /**
     * Handle the City "restored" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function restored(City $city)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'City ' . $city->name . ' has been restored']);
    }

    /**
     * Handle the City "force deleted" event.
     *
     * @param  \App\Models\City  $city
     * @return void
     */
    public function forceDeleted(City $city)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'City ' . $city->name . ' has been removed']);
    }
}
