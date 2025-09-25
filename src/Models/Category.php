<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed                                                                         $id           5 occurrences
 * @property string|null                                                                   $color_code   5 occurrences
 * @property \Illuminate\Support\Carbon|null                                               $created_at   5 occurrences
 * @property string|null                                                                   $icon         5 occurrences
 * @property string|null                                                                   $iconURL      5 occurrences
 * @property string|null                                                                   $sorting      5 occurrences
 * @property string|null                                                                   $title_ar     5 occurrences
 * @property string|null                                                                   $title_en     5 occurrences
 * @property string|null                                                                   $type         5 occurrences
 * @property \Illuminate\Support\Carbon|null                                               $updated_at   5 occurrences
 * @property string|null                                                                   $visibility   5 occurrences
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Store> $stores
 * @property int|null                                                                      $stores_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\CategoryFactory   factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereColorCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereIcon($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereIconURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereSorting($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Category     whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Category extends BaseModel
{
    use HasFactory;
    use Translatable;
    use SoftDeletes ;

    protected $fillable = [
        'title_ar', 'title_en', 'icon', 'avatar',  'iconURL', 'avatarURL', 'color_code', 'sorting', 'visibility',

    ];

    protected $translatable = ['title'];

    public function stores(): HasMany
    {
        return $this->hasMany(Store::class, 'id', 'category_id');
    }
}
