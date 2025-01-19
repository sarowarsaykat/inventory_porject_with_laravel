<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'purchase_date',
        'total_quantity',
        'total_amount',
        'created_by',
        'updated_by',
    ];

     /**
     * Relationship: Supplier
     */
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    /**
     * Relationship: Details
     */
    public function details()
    {
        return $this->hasMany(PurchaseDetails::class, 'purchase_master_id');
    }
}
