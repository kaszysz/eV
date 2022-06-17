<?php

namespace App\Observers;

use App\Models\Component;
use Illuminate\Support\Facades\Session;

class ComponentObserver
{
    /**
     * Handle the Component "created" event.
     *
     * @param  \App\Models\Component  $component
     * @return void
     */
    public function created(Component $component)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Component ' . $component->name . ' has been created']);
    }

    /**
     * Handle the Component "updated" event.
     *
     * @param  \App\Models\Component  $component
     * @return void
     */
    public function updated(Component $component)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Component ' . $component->name . ' has been updated']);
    }

    /**
     * Handle the Component "deleted" event.
     *
     * @param  \App\Models\Component  $component
     * @return void
     */
    public function deleted(Component $component)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Component ' . $component->name . ' has been deleted']);
    }

    /**
     * Handle the Component "restored" event.
     *
     * @param  \App\Models\Component  $component
     * @return void
     */
    public function restored(Component $component)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Component ' . $component->name . ' has been restored']);
    }

    /**
     * Handle the Component "force deleted" event.
     *
     * @param  \App\Models\Component  $component
     * @return void
     */
    public function forceDeleted(Component $component)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Component ' . $component->name . ' has been removed']);
    }
}
