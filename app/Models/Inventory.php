<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'inventory';

    protected $fillable = [
        'product_id',
        'qty_tersedia',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
