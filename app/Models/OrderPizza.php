<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderPizza extends Model
{
    use HasFactory;

    protected $table = 'order_pizza';   
    protected $primaryKey = 'order_pizza_id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = ['order_id', 'pizza_size_id', 'order_pizza_quantity'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function pizzaSize(): BelongsTo
    {
        return $this->belongsTo(PizzaSize::class);
    }
}
