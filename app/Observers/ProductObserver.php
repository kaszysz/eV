<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductObserver
{

    public function created(Product $product)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Product ' . $product->name . ' has been created']);
    }


    public function updated(Product $product)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Product ' . $product->name . ' has been updated']);
    }


    public function deleted(Product $product)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Product ' . $product->name . ' has been deleted']);
    }


    public function restored(Product $product)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Product ' . $product->name . ' has been restored']);
    }


    public function forceDeleted(Product $product)
    {
        Session::flash('alert', ['title' => 'Removed', 'msg' => 'Product ' . $product->name . ' has been removed']);
    }
}
