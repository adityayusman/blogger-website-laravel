<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
        'ordering'
    ];

    /**
     * Get the user associated with the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_category', 'id');
    }
}
