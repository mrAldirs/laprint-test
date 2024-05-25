<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'contacts';

    protected $fillable = [
        'nama',
        'type',
        'alamat',
        'telpon',
        'image',
    ];

    public static $storeRules = [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|min:4|max:255',
        'image' => 'required|image|mimes:jpg,png,jpeg,webp',
    ];

    public static $updateRules = [
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|min:4|max:255',
        'image' => 'image|mimes:jpg,png,jpeg,webp',
    ];

    public function salesOrders()
    {
        return $this->hasMany(SalesOrder::class);
    }
}
