<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'order_id',
        'product_id',
        'name',
        'price',
        'quantity'
    ];
    
    public function order()
    {
        
        return $this->belongsTo(Order::class);
    }
}
