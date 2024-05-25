<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'purchase_orders';

    protected $fillable = [
        'contact_id',
        'product_id',
        'user_id',
        'sales_id',
        'no_po',
        'date',
        'qty',
        'total',
        'status',
    ];

    public static $rules = [
        'contact_id' => 'required',
        'product_id' => 'required',
        'user_id' => 'required',
        'sales_id' => 'required',
        'qty' => 'required|integer',
        'total' => 'required|string|min:4|max:255',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sales()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function receipt()
    {
        return $this->hasOne(Receipt::class);
    }
}
