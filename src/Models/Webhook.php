<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webhook onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Webhook     raw($value = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webhook withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Webhook withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Webhook extends BaseModel
{
    use SoftDeletes ;

    protected $table    = 'webhook_calls';
    protected $fillable = [
        'name', 'url', 'headers', 'payload', 'exception',
    ];
}
