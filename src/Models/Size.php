<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Traits\Translatable;

/**
 * 
 *
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\SizeFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Size raw($value = null)
 * @mixin \Eloquent
 */
class Size extends BaseModel
{
    use HasFactory;
    use Translatable;

    public $timestamps      = false;
    protected $translatable = ['title'];
}
