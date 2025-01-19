<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'sale_date',
        'total_quantity',
        'total_amount',
        'payment_method',
        'payment',
        'created_by',
        'updated_by',
    ];

    /**
     * Relationship with SalesDetail
     */
    public function salesDetails()
    {
        return $this->hasMany(SalesDetail::class);
    }

    /**
     * Relationship with Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}