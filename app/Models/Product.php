<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'compare_at_price',
        'stock_quantity',
        'sku',
        'barcode',
        'is_active',
        'is_featured',
        'category_id',
        'brand_id',
        'images',
        'specifications',
        'weight',
        'dimensions',
        'warranty_period',
        'warranty_terms',
        'rating',
        'review_count'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        'compare_at_price' => 'decimal:2',
        'stock_quantity' => 'integer',
        'images' => 'array',
        'specifications' => 'array',
        'rating' => 'decimal:2',
        'review_count' => 'integer'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Accessors
    public function getDiscountPercentageAttribute()
    {
        if ($this->compare_at_price && $this->compare_at_price > $this->price) {
            return round((($this->compare_at_price - $this->price) / $this->compare_at_price) * 100);
        }
        return 0;
    }

    public function getInStockAttribute()
    {
        return $this->stock_quantity > 0;
    }

    public function getStockStatusAttribute()
    {
        if ($this->stock_quantity <= 0) {
            return 'Out of Stock';
        } elseif ($this->stock_quantity < 10) {
            return 'Low Stock';
        } else {
            return 'In Stock';
        }
    }

    public function getFormattedPriceAttribute()
    {
        return 'KES ' . number_format($this->price, 2);
    }

    public function getFormattedComparePriceAttribute()
    {
        return $this->compare_at_price ? 'KES ' . number_format($this->compare_at_price, 2) : null;
    }

    public function getMainImageAttribute()
    {
        $images = $this->images ?? [];
        return $images[0] ?? 'https://via.placeholder.com/300x300?text=No+Image';
    }

    public function getThumbnailImageAttribute()
    {
        $images = $this->images ?? [];
        return $images[0] ?? 'https://via.placeholder.com/150x150?text=No+Image';
    }

    // Methods
    public function decreaseStock($quantity)
    {
        $this->stock_quantity -= $quantity;
        return $this->save();
    }

    public function increaseStock($quantity)
    {
        $this->stock_quantity += $quantity;
        return $this->save();
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOnSale($query)
    {
        return $query->whereNotNull('compare_at_price')
                    ->whereColumn('compare_at_price', '>', 'price');
    }

    public function scopeInCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%")
                    ->orWhere('sku', 'like', "%{$searchTerm}%");
    }
}