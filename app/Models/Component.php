<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name'
    ];

    protected $with = [
        'category'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
