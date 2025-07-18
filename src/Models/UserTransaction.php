<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $amount 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $order_id 999 occurrences
 * @property string|null $payment_id 1000 occurrences
 * @property string|null $reason 992 occurrences
 * @property string|null $ref_id 1000 occurrences
 * @property string|null $reward_id 841 occurrences
 * @property string|null $store_id 997 occurrences
 * @property string|null $tag_id 968 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTransaction onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction wherePaymentId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereReason($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereRewardId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereTagId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserTransaction whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTransaction withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|UserTransaction withoutTrashed()
 * @mixin \Eloquent
 */
class UserTransaction extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;

    protected $casts = [
        'ref' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
