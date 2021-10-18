<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name','old_price','price','image'
    ];


    /**
     * Get the user that owns the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    

    public function product_details()
    {
        return $this->hasMany(ProductDetails::class,'product_id','id');
    }

    
}
