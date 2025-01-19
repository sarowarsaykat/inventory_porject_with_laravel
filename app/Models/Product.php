<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Manufacturer;
use App\Models\Unit;
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subcategory_id',
        'category_id',
        'manufacturer_id',
        'unit_id',
        'purchase_price',
        'sale_price',
        'stock',
        'is_active',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcat()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
