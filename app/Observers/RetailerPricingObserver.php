<?php

namespace App\Observers;

use App\Models\RetailerPricing;
use Illuminate\Support\Facades\Session;

class RetailerPricingObserver
{
    public function created(RetailerPricing $retailerPricing)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . 'has been created']);
    }

    public function updated(RetailerPricing $retailerPricing)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . ' has been updated']);
    }

    public function deleted(RetailerPricing $retailerPricing)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . ' has been deleted']);
    }

    public function restored(RetailerPricing $retailerPricing)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . ' has been restored']);
    }

    public function forceDeleted(RetailerPricing $retailerPricing)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . ' has been removed']);
    }
}
