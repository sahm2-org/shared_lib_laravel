<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property int|null $code 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $phone 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode verify($phone, $code)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode whereCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode wherePhone($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|VerifyCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VerifyCode extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function scopeVerify($query, $phone, $code): void
    {
        $query->where('phone', $phone)->where('code', $code);
    }
}
