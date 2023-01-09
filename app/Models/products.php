<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable =[
        'productname',
        'productcode',
        'productprice',
        'expirydate',
        'quantity',
        'sellingprice',
        'measurement',
        'category'

    ];
}
