<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Interaction raw($value = null)
 * @mixin \Eloquent
 */
class Interaction extends BaseModel
{
    use HasFactory;
}
