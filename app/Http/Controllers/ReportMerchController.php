<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportMerchRequest;
use App\Models\ReportMerch;
use App\Models\Shop;
use App\Services\DestroyService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ReportMerchController extends Controller
{
    public function index()
    {
        return Inertia::render('Reports/Merch/Index', [
            'reportMerches' => ReportMerch::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Reports/Merch/Create', [
            'shops' => Shop::all()
        ]);
    }

    public function store(ReportMerchRequest $request)
    {
        $reportMerch = ReportMerch::create($request->validated());
        $reportMerch->retailerPricings()->sync($request->retailer_pricings);
        return redirect()->back();
    }

    public function show(ReportMerch $ReportMerch)
    {
        return Inertia::render('Reports/Merch/Show');
    }

    public function edit($id)
    {
        return Redirect::route('reports.merch.show', $id);
    }

    public function update(ReportMerchRequest $request, ReportMerch $ReportMerch)
    {
        $ReportMerch->update($request->validated());
        return redirect::route('Reports/Merch.show', $ReportMerch->id);
    }

    public function destroy(ReportMerch $ReportMerch, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($ReportMerch);
        return redirect()->back();
    }
}
