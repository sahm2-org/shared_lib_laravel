<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property mixed $id 12 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 12 occurrences
 * @property string|null $from 12 occurrences
 * @property string|null $status 12 occurrences
 * @property string|null $to 12 occurrences
 * @property string|null $unit_id 12 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 12 occurrences
 * @property-read \Saham\SharedLibs\Models\Unit|null $unit
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slot onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereFrom($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereTo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereUnitId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Slot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slot withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slot withoutTrashed()
 * @mixin \Eloquent
 */
class Slot extends BaseModel
{
    use SoftDeletes ;

    protected $fillable = [
        'unit_id', 'from', 'to', 'status',
    ];

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
}
