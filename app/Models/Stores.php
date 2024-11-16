<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stores extends Model
{
    protected $table = "stores";

    protected $guarded = ['Product Image','Product Name','Product Price','Product Quantity','Product Description',];
}
