<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'total_price',
        'status'
    ];
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function items() {
    return $this->hasMany(OrderItem::class);
}
}
