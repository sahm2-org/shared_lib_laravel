<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property mixed $id 4 occurrences
 * @property string|null $name_ar 4 occurrences
 * @property string|null $name_en 4 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliverItem whereNameEn($value)
 * @mixin \Eloquent
 */
class DeliverItem extends BaseModel
{
    use HasFactory;
    use Translatable;

    protected $translatable = ['name'];
}
