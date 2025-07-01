<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property int|null $__v 4 occurrences
 * @property mixed $id 4 occurrences
 * @property int|null $adult_max 4 occurrences
 * @property int|null $adult_min 4 occurrences
 * @property int|null $adult_price 4 occurrences
 * @property int|null $child_max 4 occurrences
 * @property int|null $child_min 4 occurrences
 * @property int|null $child_price 4 occurrences
 * @property string|null $imgs 4 occurrences
 * @property int|null $number 4 occurrences
 * @property string|null $store_id 4 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Slot> $slots
 * @property-read int|null $slots_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereAdultMax($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereAdultMin($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereAdultPrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereChildMax($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereChildMin($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereChildPrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereImgs($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereNumber($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Unit whereV($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Unit withoutTrashed()
 * @mixin \Eloquent
 */
class Unit extends BaseModel
{
    use Translatable;
    use SoftDeletes ;

    protected $fillable = [
        'number', 'adult_min', 'adult_max', 'child_min', 'child_max', 'adult_price', 'child_price', 'imgs', 'store_id',
    ];

    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class);
    }
}
