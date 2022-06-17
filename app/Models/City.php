<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'voivodeship_id',
        'name'
    ];

    protected $with = [
        'voivodeship'
    ];

    function voivodeship(){
        return $this->hasOne(Voivodeship::class, 'id', 'voivodeship_id');
    }
}
