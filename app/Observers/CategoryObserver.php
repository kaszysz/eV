<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        Session::flash('alert', ['title' => 'Created', 'msg' => 'Category ' . $category->name . ' has been created']);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        Session::flash('alert', ['title' => 'Updated', 'msg' => 'Category ' . $category->name . ' has been updated']);
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        Session::flash('alert', ['title' => 'Deleted', 'msg' => 'Category ' . $category->name . ' has been deleted']);
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        Session::flash('alert', ['title' => 'Restored', 'msg' => 'Category ' . $category->name . ' has been restored']);
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
