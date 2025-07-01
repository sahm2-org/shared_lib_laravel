<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property mixed $id 2 occurrences
 * @property float|null $amount 2 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 2 occurrences
 * @property string|null $operational_id 2 occurrences
 * @property string|null $status 2 occurrences
 * @property string|null $type 2 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 2 occurrences
 * @property-read \Saham\SharedLibs\Models\Operational|null $operational
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereOperationalId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalPayout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OperationalPayout extends BaseModel
{
    use HasFactory;

    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class);
    }
}
