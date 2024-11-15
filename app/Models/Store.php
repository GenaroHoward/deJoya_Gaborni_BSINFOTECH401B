<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    protected $fillable = ['Product Name','Product Price','Product Quantity','Product Description',];
}
