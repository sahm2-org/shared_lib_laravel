<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $price 1000 occurrences
 * @property string|null $title 1000 occurrences
 * @property string|null $title_ar 1000 occurrences
 * @property string|null $title_en 1000 occurrences
 * @property string|null $variation_id 1000 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption wherePrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereTitle($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereTitleAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereTitleEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereVariationId($value)
 * @property string|null $max 1 occurrences
 * @property string|null $min 1 occurrences
 * @property string|null $options 1 occurrences
 * @property string|null $type 1 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereMax($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereMin($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereOptions($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VariationOption whereType($value)
 * @mixin \Eloquent
 */
class VariationOption extends BaseModel
{
    use HasFactory;
    use Translatable;

    public $timestamps      = false;
    protected $translatable = ['title'];
}
