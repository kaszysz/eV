<?php

namespace App\Observers;

use App\Models\Voivodeship;
use Illuminate\Support\Facades\Session;

class VoivodeshipObserver
{
    /**
     * Handle the voivodeship "created" event.
     *
     * @param  \App\Models\Voivodeship  $voivodeship
     * @return void
     */
    public function created(Voivodeship $voivodeship)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Voivodeship ' . $voivodeship->name . ' has been created']);
    }

    /**
     * Handle the voivodeship "updated" event.
     *
     * @param  \App\Models\voivodeship  $voivodeship
     * @return void
     */
    public function updated(Voivodeship $voivodeship)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Voivodeship ' . $voivodeship->name . ' has been updated']);
    }

    /**
     * Handle the voivodeship "deleted" event.
     *
     * @param  \App\Models\voivodeship  $voivodeship
     * @return void
     */
    public function deleted(Voivodeship $voivodeship)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Voivodeship ' . $voivodeship->name . ' has been deleted']);
    }

    /**
     * Handle the voivodeship "restored" event.
     *
     * @param  \App\Models\voivodeship  $voivodeship
     * @return void
     */
    public function restored(Voivodeship $voivodeship)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Voivodeship ' . $voivodeship->name . ' has been restored']);
    }

    /**
     * Handle the voivodeship "force deleted" event.
     *
     * @param  \App\Models\voivodeship  $voivodeship
     * @return void
     */
    public function forceDeleted(Voivodeship $voivodeship)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Voivodeship ' . $voivodeship->name . ' has been removed']);
    }
}
