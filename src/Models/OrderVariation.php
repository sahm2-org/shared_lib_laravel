<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property-read mixed $id
 * @property-read \Saham\SharedLibs\Models\ProductVariation|null $productVariation
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OrderVariation raw($value = null)
 * @mixin \Eloquent
 */
class OrderVariation extends BaseModel
{
    use HasFactory;

    protected $with    = ['productVariation'];
    public $timestamps = false;

    public function productVariation(): BelongsTo
    {
        return $this->belongsTo(ProductVariation::class, 'variation_id');
    }
}
