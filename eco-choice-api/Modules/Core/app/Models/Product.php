<?php

namespace Modules\Core\App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'name',
        'description',
        'price',
    ];
}
