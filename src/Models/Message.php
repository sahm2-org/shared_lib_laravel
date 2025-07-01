<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property string|null $attachment 190 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $driver_id 1000 occurrences
 * @property string|null $message 835 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $sender 999 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Order|null $order
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereAttachment($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereMessage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereSender($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Message whereUserId($value)
 * @mixin \Eloquent
 */
class Message extends BaseModel
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
