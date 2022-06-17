<?php

namespace App\Models;

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
        'user'
    ];

    public function shop(){
        return $this->hasOne(Shop::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function retailerPricings(){
        return $this->hasMany(RetailerPricing::class);
    }
}
