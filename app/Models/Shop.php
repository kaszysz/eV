<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'city_id',
        'retailer_id',
        'street',
        'fsr_id',
        'promoter_id',
        'priority',
        'geo_latitude',
        'geo_longitude'
    ];

    protected $with = [
        'city',
        'retailer',
        'fsr',
        'promoter'
    ];

    public function city(){
        return $this->belongsTo(City::class,'city_id','id');
    }

    public function retailer(){
        return $this->belongsTo(Retailer::class,'retailer_id', 'id');
    }

    public function fsr(){
        return $this->belongsTo(User::class, 'fsr_id', 'id');
    }

    public function promoter(){
        return $this->belongsTo(User::class, 'promoter_id', 'id');
    }

    public function scopeGetClosestShops($query, $request)
    {
        $latitude = $request['latitude'];
        $longitude = $request['longitude'];

        return $query->select(DB::raw("*, ( 6371 * acos( cos( radians('$latitude') )
        * cos( radians( geo_latitude ) )
        * cos( radians( geo_longitude ) - radians('$longitude') )
        + sin( radians('$latitude') )
        * sin( radians( geo_latitude ) ) ) ) AS distance"))->havingRaw('distance < 2')->orderBy('distance')->with('retailer')->with('city');
    }
}
