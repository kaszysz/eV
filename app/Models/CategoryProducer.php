<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProducer extends Model
{
    use HasFactory;

    protected $table = 'category_producer';
    public $timestamps = false;
}
