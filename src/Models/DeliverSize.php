<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property mixed $id 4 occurrences
 * @property string|null $label 4 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverSize whereLabel($value)
 * @mixin \Eloquent
 */
class DeliverSize extends BaseModel
{
    use HasFactory;
}
