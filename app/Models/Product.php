<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_number',
        'category_id',
        'producer_id',
        'name',
        'size_id',
        'matrix_id',
        'resolution_id',
        'refresh_rate_id',
        'processor_id',
        'ram_id',
        'disc_id',
        'graphic_card_id',
        'os_id',
    ];

    protected $with = [
        'category',
        'producer',
        'size',
        'matrix',
        'refresh_rate',
        'processor',
        'ram',
        'disc',
        'graphic_card',
        'os'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }

    public function size()
    {
        return $this->belongsTo(Component::class);
    }

    public function matrix()
    {
        return $this->belongsTo(Component::class);
    }

    public function refresh_rate()
    {
        return $this->belongsTo(Component::class);
    }

    public function processor()
    {
        return $this->belongsTo(Component::class);
    }

    public function ram()
    {
        return $this->belongsTo(Component::class);
    }

    public function disc()
    {
        return $this->belongsTo(Component::class);
    }

    public function graphic_card()
    {
        return $this->belongsTo(Component::class);
    }

    public function os()
    {
        return $this->belongsTo(Component::class);
    }
}
