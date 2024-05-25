<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'products';

    protected $fillable = [
        'nama',
        'harga',
        'status',
        'image',
    ];

    public static $storeRules = [
        'nama' => 'required|string|max:255',
        'harga' => 'required|string|min:4|max:255',
        'image' => 'required|image|mimes:jpg,png,jpeg,webp',
    ];

    public static $updateRules = [
        'nama' => 'required|string|max:255',
        'harga' => 'required|string|min:4|max:255',
        'image' => 'image|mimes:jpg,png,jpeg,webp',
    ];

    public function salesOrders()
    {
        return $this->hasMany(SalesOrder::class);
    }
}
