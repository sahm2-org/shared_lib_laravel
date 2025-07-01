<?php

namespace Saham\SharedLibs\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use Saham\SharedLibs\Traits\Translatable;


/**
 * 
 *
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone newQuery()
 * @method static Builder<static>|Zone onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Zone raw($value = null)
 * @method static Builder<static>|Zone withTrashed()
 * @method static Builder<static>|Zone withoutTrashed()
 * @mixin \Eloquent
 */
class Zone   extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    use Translatable;
    protected $guarded = [];
    protected $table = 'zones';
    protected $translatable = ['name'] ;


}
