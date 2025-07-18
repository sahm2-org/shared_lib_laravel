<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property mixed $id 64 occurrences
 * @property string|null $avatar 64 occurrences
 * @property string|null $avatarURL 64 occurrences
 * @property string|null $changes 56 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 64 occurrences
 * @property string|null $desc_ar 64 occurrences
 * @property string|null $desc_en 64 occurrences
 * @property string|null $display_order 10 occurrences
 * @property string|null $images 60 occurrences
 * @property string|null $max_allowed_size 64 occurrences
 * @property string|null $menu_id 64 occurrences
 * @property string|null $min_allowed_size 64 occurrences
 * @property string|null $price 64 occurrences
 * @property string|null $sizes 64 occurrences
 * @property string|null $status 64 occurrences
 * @property string|null $thumb 59 occurrences
 * @property string|null $thumbURL 5 occurrences
 * @property string|null $title_ar 64 occurrences
 * @property string|null $title_en 64 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 64 occurrences
 * @property-read \Saham\SharedLibs\Models\Menu|null $menu
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\ProductVariation> $variations
 * @property-read int|null $variations_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct availableOnly()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereAvatar($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereAvatarURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereChanges($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereDescAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereDescEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereDisplayOrder($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereImages($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereMaxAllowedSize($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereMenuId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereMinAllowedSize($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct wherePrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereSizes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereThumb($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereThumbURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|FeastProduct whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Driver> $ratings
 * @property-read int|null $ratings_count
 * @mixin \Eloquent
 */
class FeastProduct extends Product
{
    use HasFactory;

    protected $extra_fields = ['max_allowed_size', 'min_allowed_size'];

    public function variations(): mixed
    {
        return $this->hasMany(ProductVariation::class, 'feast_product_id', '_id');
    }
}
