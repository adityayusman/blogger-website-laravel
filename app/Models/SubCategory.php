<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'subcategory_name',
        'slug',
        'parent_category',
        'ordering'
    ];

    /**
     * Get the user that owns the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentcategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_category', 'id');
    }

    /**
     * Get all of the comments for the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
