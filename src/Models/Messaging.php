<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Messaging onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Messaging     raw($value = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Messaging withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Messaging withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Messaging extends BaseModel
{
    use SoftDeletes ;

    protected $fillable = [
        'data', 'from', 'to', 'status', 'cc', 'view', 'message', 'subject', 'title', 'response', 'exception',
    ];
}
