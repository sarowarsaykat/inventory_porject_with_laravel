<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_master_id',
        'product_id',
        'unit_id',
        'purchase_price',
        'quantity',
        'total',
    ];

     /**
     * Relationship: PurchaseMaster
     */
    public function master()
    {
        return $this->belongsTo(PurchaseMaster::class, 'purchase_master_id');
    }

    /**
     * Relationship: Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relationship: Unit
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
