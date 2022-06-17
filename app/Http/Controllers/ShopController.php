<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClosestShopsRequest;
use App\Http\Requests\ShopRequest;
use App\Models\Retailer;
use App\Models\Shop;
use App\Models\Voivodeship;
use App\Services\DestroyService;
use Carbon\Exceptions\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ShopController extends Controller
{
    public function index()
    {
        return Inertia::render('Shops/Index', [
            'shops' => Shop::withTrashed()->paginate(20)
        ]);
    }

    public function create()
    {
        return Inertia::render('Shops/Create', [
            'retailers' => Retailer::all(),
            'voivodeships' => Voivodeship::select('id', 'name')->get(),
            'fsrs' => DB::table('users')->select('id', 'name', 'surname')->get(),
            'promoters' => DB::table('users')->select('id', 'name', 'surname')->get(),
        ]);
    }

    public function store(ShopRequest $request)
    {
        $shop = Shop::create($request->validated());
        return redirect()->back();
    }

    public function show(Shop $shop)
    {
        return Inertia::render('Shops/Show', [
            'voivodeships' => DB::table('voivodeships')->select('id', 'name')->get(),
            'shop' => $shop
        ]);
    }

    public function edit($id)
    {
        return Redirect::route('shops.show', $id);
    }

    public function update(ShopRequest $request, Shop $Shop)
    {
        $Shop->update($request->validated());
        return redirect::route('shops.show', $Shop->id);
    }

    public function destroy(Shop $Shop, DestroyService $destroy)
    {
        $destroy->DestroyOrRestore($Shop);
        return redirect()->back();
    }

    public function getClosestShops(ClosestShopsRequest $request)
    {
        return Shop::getClosestShops($request->validated())->get();
    }
}
