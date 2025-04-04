<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExtraIngredient extends Model
{
    use HasFactory;

    protected $table = 'extra_ingredients';    
    protected $primaryKey = 'extra_ingredient_id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = ['extra_ingredient_name', 'extra_ingredient_price'];
}
