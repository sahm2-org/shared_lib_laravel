<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\HasNotes;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\OrderDetail> $details
 * @property-read int|null $details_count
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read mixed $id
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Saham\SharedLibs\Models\Slot|null $slot
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\Unit|null $unit
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PreOrder raw($value = null)
 * @mixin \Eloquent
 */
class PreOrder extends BaseModel
{
    use HasNotes ;

    protected $guarded    = [];
    protected $attributes = [
        'status'    => 'pending',
        'cash_paid' => false,
    ];

    protected $casts = [
        'ref_id' => 'string',
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

    public function details(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }
}
