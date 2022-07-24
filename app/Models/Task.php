<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
    ];

    public function retailers()
    {
        return $this->belongsToMany(Retailer::class)->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany(Users::class)->withTimestamps();
    }
    public function shops()
    {
        return $this->belongsToMany(Shops::class)->withTimestamps();
    }
}
