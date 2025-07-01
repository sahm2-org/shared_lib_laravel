<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * 
 *
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $rating 1000 occurrences
 * @property string|null $store_id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $user_id 852 occurrences
 * @property-read \Saham\SharedLibs\Models\Order|null $order
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereRating($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Rating whereUserId($value)
 * @mixin \Eloquent
 */
class Rating extends BaseModel
{
    use HasFactory;

    protected $table              = 'ratings';
    protected $fillable           = ['order_id', 'related_id', 'related_type', 'store_id', 'user_id', 'rating', 'description',];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
