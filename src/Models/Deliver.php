<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use Saham\SharedLibs\Traits\HasNotes;

/**
 * @property mixed $id 8 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 8 occurrences
 * @property \Illuminate\Support\Carbon|null $delivered_at 8 occurrences
 * @property string|null $driver_id 8 occurrences
 * @property string|null $from_latitude 8 occurrences
 * @property string|null $from_longitude 8 occurrences
 * @property string|null $item_id 8 occurrences
 * @property string|null $notes 8 occurrences
 * @property int|null $price 8 occurrences
 * @property string|null $ref_id 8 occurrences
 * @property string|null $size_id 8 occurrences
 * @property string|null $status 8 occurrences
 * @property string|null $to_latitude 8 occurrences
 * @property string|null $to_longitude 8 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 8 occurrences
 * @property string|null $user_id 8 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\DeliverItem|null $item
 * @property-read \Saham\SharedLibs\Models\DeliverSize|null $size
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereDeliveredAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereFromLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereFromLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereItemId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereNotes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver wherePrice($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereSizeId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereToLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereToLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Deliver whereUserId($value)
 * @mixin \Eloquent
 */
class Deliver extends BaseModel
{
    use HasFactory;
    use HasNotes ;

    protected $casts = [
        'delivered_at' => 'datetime',
    ];
    protected $dates = ['delivered_at'];

    public function item(): BelongsTo
    {
        return $this->belongsTo(DeliverItem::class, 'item_id');
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(DeliverSize::class, 'size_id');
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
