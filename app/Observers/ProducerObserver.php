<?php

namespace App\Observers;

use App\Models\Producer;
use Illuminate\Support\Facades\Session;

class ProducerObserver
{

    public function created(Producer $producer)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Producer ' . $producer->name . ' has been created']);
    }


    public function updated(Producer $producer)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Producer ' . $producer->name . ' has been updated']);
    }


    public function deleted(Producer $producer)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Producer ' . $producer->name . ' has been deleted']);
    }


    public function restored(Producer $producer)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Producer ' . $producer->name . ' has been restored']);
    }


    public function forceDeleted(Producer $producer)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Producer ' . $producer->name . ' has been removed']);
    }
}
