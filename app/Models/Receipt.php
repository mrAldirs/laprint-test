<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'receipts';

    protected $fillable = [
        'contact_id',
        'product_id',
        'user_id',
        'purchase_id',
        'no_penerimaan',
        'tanggal_diterima',
        'qty',
        'total',
        'status',
    ];

    public static $rules = [
        'contact_id' => 'required',
        'product_id' => 'required',
        'user_id' => 'required',
        'purchase_id' => 'required',
        'tanggal_diterima' => 'required|date',
        'qty' => 'required|integer',
        'total' => 'required',
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

    public function purchase()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_id');
    }
}
