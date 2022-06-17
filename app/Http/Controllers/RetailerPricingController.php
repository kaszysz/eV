<?php

namespace App\Http\Controllers;

use App\Http\Requests\RetailerPricingRequest;
use App\Http\Requests\RetailerPricingUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\RetailerPricing;
use App\Services\DestroyService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class RetailerPricingController extends Controller
{
    public function index()
    {
        return Inertia::render('Retailers/Pricings/Index', [
            'retailersPricings' => RetailerPricing::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Retailers/Pricings/Create', [
            'retailers' => DB::table('retailers')->select('id', 'name')->get(),
            'categories' => Category::all()
        ]);
    }

    public function store(RetailerPricingRequest $request)
    {
        RetailerPricing::create($request->validated());
        return redirect()->back();
    }

    public function show(RetailerPricing $retailerPricing)
    {
        return Inertia::render('Retailers/Pricings/Show', [
            'retailerPricing' => $retailerPricing,
            'retailers' => Retailer::all(),
            'products' => Product::all(),
            'categories' => Category::all()
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('retailer-pricings.show', $id);
    }

    public function update(RetailerPricingRequest $request, RetailerPricing $retailerPricing)
    {
        $retailerPricing->update($request->validated());
        return redirect()->back()->with('retailerPricing', $retailerPricing);
    }

    public function destroy(RetailerPricing $retailerPricing, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($retailerPricing);
        return redirect()->back();
    }

    public function getRetailerPricingsByIndexAndRetailerId(Request $request)
    {
        if (strlen($request->retailer_index) < 4) {
            return null;
        }
        return RetailerPricing::getRetailerPricingsLike($request->retailer_index, $request->retailer_id)->get();
    }

    public function updateWithoutRedirect(RetailerPricingUpdateRequest $request, RetailerPricing $retailerPricing)
    {
        $retailerPricing->update($request->validated());
        return response()->json([
            'alert' => ['title' => 'Updated', 'msg' => 'Retailer: ' . $retailerPricing->retailer->name . ' Index: ' . $retailerPricing->retailer_index . ' has been updated']
        ]);
    }
}
