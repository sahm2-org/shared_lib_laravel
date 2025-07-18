<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property-read \Saham\SharedLibs\Models\DeliveryOffer|null $deliveryOffer
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read mixed $id
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOfferDriver onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferDriver raw($value = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOfferDriver withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOfferDriver withoutTrashed()
 * @mixin \Eloquent
 */
class DeliveryOfferDriver extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    protected $guarded = [];
    protected $table = 'delivery_offer_drivers';

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function deliveryOffer(): BelongsTo
    {
        return $this->belongsTo(DeliveryOffer::class, 'delivery_offer_id');
    }


}
