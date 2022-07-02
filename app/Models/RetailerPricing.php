<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RetailerPricing extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'retailer_pricings';

    protected $fillable = [
        'retailer_id',
        'retailer_index',
        'product_id',
        'price',
        'sale',
        'bonus',
        'bonus_value'
    ];

    protected $with = [
        'retailer',
        'product'
    ];

    public function retailer()
    {
        return $this->belongsTo(Retailer::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeGetRetailerPricingsLike($query, $retailer_index, $retailer_id)
    {
        return $query->where('retailer_index', 'like', '%' . $retailer_index . '%')->where('retailer_id', $retailer_id);
    }
    public function getProductAttribute()
    {
        if (!$this->relationLoaded('product')) $this->load('product');

        return $this->getRelation('product') ?: $this->defaultBasket();
    }

}
