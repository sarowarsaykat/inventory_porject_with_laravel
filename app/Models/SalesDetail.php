<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_master_id',
        'product_id',
        'purchase_price',
        'sale_price',
        'quantity',
        'total',
        'unit',
        'stock',
    ];

    /**
     * Relationship with SalesMaster
     */
    public function salesMaster()
    {
        return $this->belongsTo(SalesMaster::class);
    }

    /**
     * Relationship with Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);  // SaleDetail belongs to one Unit
    }
}
