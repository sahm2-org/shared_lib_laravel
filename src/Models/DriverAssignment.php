<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $driver_id 1000 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $status 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Order|null $order
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverAssignment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriverAssignment extends BaseModel
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
