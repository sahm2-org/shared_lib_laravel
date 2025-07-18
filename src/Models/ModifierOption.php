<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|ModifierOption raw($value = null)
 * @mixin \Eloquent
 */
class ModifierOption extends BaseModel
{
    use HasFactory;
    use Translatable;

    public $timestamps      = false;
    protected $translatable = ['title'];
}
