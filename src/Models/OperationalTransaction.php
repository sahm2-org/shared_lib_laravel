<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property mixed $id 4 occurrences
 * @property float|null $amount 4 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 4 occurrences
 * @property string|null $operational_id 4 occurrences
 * @property string|null $order_id 4 occurrences
 * @property string|null $payment_id 4 occurrences
 * @property string|null $reason 4 occurrences
 * @property string|null $ref_id 4 occurrences
 * @property string|null $store_id 4 occurrences
 * @property string|null $tag_id 4 occurrences
 * @property string|null $type 4 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 4 occurrences
 * @property-read \Saham\SharedLibs\Models\Operational|null $operational
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereOperationalId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction wherePaymentId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereReason($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereTagId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|OperationalTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OperationalTransaction extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'ref' => 'string',
    ];

    public function operational(): BelongsTo
    {
        return $this->belongsTo(Operational::class);
    }
}
