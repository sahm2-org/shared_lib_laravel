<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property mixed $id 2 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 2 occurrences
 * @property int|null $initial_value 2 occurrences
 * @property string|null $key 2 occurrences
 * @property string|null $notes 2 occurrences
 * @property int|null $step 2 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 2 occurrences
 * @property int|null $value 2 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\CounterFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereInitialValue($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereKey($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereNotes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereStep($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Counter whereValue($value)
 * @mixin \Eloquent
 */
class Counter extends BaseModel
{
    use HasFactory;
}
