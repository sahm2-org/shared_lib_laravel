<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property mixed $id 19 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 6 occurrences
 * @property string|null $iconURL 5 occurrences
 * @property string|null $name_ar 19 occurrences
 * @property string|null $name_en 19 occurrences
 * @property string|null $sorting 13 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 13 occurrences
 * @property string|null $visibility 13 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\CuisineFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereIconURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereSorting($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Cuisine whereVisibility($value)
 * @mixin \Eloquent
 */
class Cuisine extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name_ar', 'name_en', 'sorting', 'visibility',
    ];

    protected $translatable = ['name'];
}
