<?php

namespace App\Models;

use App\Models\Scopes\CheapScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'category_id',
        'tag_id',
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Adds a global scope to the model which will affect every query for this model that is created using the Product::query() method. This does not affect the DB::table() method
    protected static function booted()
    {
        static::addGlobalScope(new CheapScope);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeExpensive($query)
    {
        return $query->where('price', '>=', 100);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    /**
     * Get the product's formatted price.
     *
     * @param  string  $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return '$' . number_format($value, 2);
    }

}
