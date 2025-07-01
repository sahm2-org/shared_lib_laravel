<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * 
 *
 * @property mixed $id 17 occurrences
 * @property string|null $amount 17 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 17 occurrences
 * @property string|null $payment_id 17 occurrences
 * @property string|null $ref_id 17 occurrences
 * @property string|null $type 17 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 17 occurrences
 * @property string|null $user_id 17 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction wherePaymentId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Transaction whereUserId($value)
 * @mixin \Eloquent
 */
class Transaction extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'ref' => 'string',
    ];
}
