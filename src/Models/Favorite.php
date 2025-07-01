<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property string|null $store_id 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Favorite whereUserId($value)
 * @mixin \Eloquent
 */
class Favorite extends BaseModel
{
    use HasFactory;

    public $timestamps      = false;

    public function store(): mixed
    {
        return $this->belongsTo(Store::class);
    }

    public function user(): mixed
    {
        return $this->belongsTo(User::class);
    }
}
