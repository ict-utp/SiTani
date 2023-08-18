<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'quantity',
        'period',
        'address',
        'description',
        'product_categories_id',
        'product_type_id',
        'owner_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function owner()
    {
        return $this->belongsToMany(Owner::class);
    }

    public function productType()
    {
        return $this->belongsToMany(ProductType::class);
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategories::class);
    }
}
