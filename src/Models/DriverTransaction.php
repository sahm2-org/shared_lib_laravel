<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $amount 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $driver_id 1000 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $payment_id 1000 occurrences
 * @property string|null $reason 996 occurrences
 * @property string|null $ref_id 1000 occurrences
 * @property string|null $reward_id 508 occurrences
 * @property string|null $store_id 1000 occurrences
 * @property string|null $tag_id 983 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Order|null $order
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Saham\SharedLibs\Models\Reward|null $reward
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction wherePaymentId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereReason($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereRewardId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereTagId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriverTransaction extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'ref' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class);
    }
}
