<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $id
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Scene onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Scene     raw($value = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Scene withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Scene withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Scene extends BaseModel
{
    use SoftDeletes ;

    protected $fillable = [
        'pitch', 'yaw', 'hfov', 'name', 'compass',
    ];
}
