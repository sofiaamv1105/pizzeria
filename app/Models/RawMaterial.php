<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RawMaterial extends Model
{
    use HasFactory;

    protected $table = 'raw_materials';
    protected $primaryKey = 'raw_material_id';
    public $timestamps = false;
    protected $keyType = 'int';
    protected $fillable = ['raw_material_name', 'unit', 'current_stock', 'created_at', 'updated_at'];

    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class, 'pizza_raw_material')->withPivot('quantity')->withTimestamps();
    }
}
