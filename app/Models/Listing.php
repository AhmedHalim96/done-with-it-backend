<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Listing
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $photos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing wherePhotos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $photo
 * @method static \Illuminate\Database\Eloquent\Builder|Listing wherePhoto($value)
 * @property int $category_id
 * @method static \Illuminate\Database\Eloquent\Builder|Listing whereCategoryId($value)
 * @property int $price
 * @property-read \App\Models\Category $category
 * @property-read int|null $photos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Listing wherePrice($value)
 */
class Listing extends Model
{
    use HasFactory;
    protected $fillable = ["title", "price", "description", "category_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
