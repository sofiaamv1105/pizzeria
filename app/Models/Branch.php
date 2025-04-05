<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';    
    protected $fillable = ['branch_name', 'branch_address'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
