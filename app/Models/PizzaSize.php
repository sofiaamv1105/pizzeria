<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PizzaSize extends Model
{
    use HasFactory;

    protected $table = 'pizza_size';
    protected $primaryKey = 'pizza_size_id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = ['pizza_id', 'size', 'pizza_size_price'];

    public function pizza(): BelongsTo
    {
        return $this->belongsTo(Pizza::class);
    }
}
