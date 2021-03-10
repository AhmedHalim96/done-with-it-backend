<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Photo
 *
 * @property int $id
 * @property string $url
 * @property int $listing_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereListingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Photo whereUrl($value)
 * @mixin \Eloquent
 */
class Photo extends Model
{
    use HasFactory;
    protected $fillable = ["url", "listing_id"];
}
