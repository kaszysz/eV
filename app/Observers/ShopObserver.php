<?php

namespace App\Observers;

use App\Models\Shop;
use Illuminate\Support\Facades\Session;

class ShopObserver
{
    /**
     * Handle the Shop "created" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function created(Shop $shop)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Shop ' . $shop->name . ' has been created']);
    }

    /**
     * Handle the Shop "updated" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function updated(Shop $shop)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Shop ' . $shop->name . ' has been updated']);
    }

    /**
     * Handle the Shop "deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function deleted(Shop $shop)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Shop ' . $shop->name . ' has been deleted']);
    }

    /**
     * Handle the Shop "restored" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function restored(Shop $shop)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Shop ' . $shop->name . ' has been restored']);
    }

    /**
     * Handle the Shop "force deleted" event.
     *
     * @param  \App\Models\Shop  $shop
     * @return void
     */
    public function forceDeleted(Shop $shop)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Shop ' . $shop->name . ' has been removed']);
    }
}
