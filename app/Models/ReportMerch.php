<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportMerch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'shop_id',
        'user_id',
        'geo_latitude',
        'geo_longitude'
    ];

    protected $with = [
        'shop',
        'user',
        'retailerPricings'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function retailerPricings()
    {
        return $this->belongsToMany(RetailerPricing::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function scopeGetAllCreatedAtBetween($query, $dateArray)
    {
        return $query->whereBetween('created_at', $dateArray);
    }
}
