<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property mixed $id 62 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 62 occurrences
 * @property string|null $key 62 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 62 occurrences
 * @property string|null $value 62 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting whereKey($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Setting whereValue($value)
 * @mixin \Eloquent
 */
class Setting extends BaseModel
{
    use HasFactory;

    protected static function boot(): void
    {
        parent::boot();
    }

    public static function findByKey($key): mixed
    {
        return self::where('key', $key)->first();
    }
}
