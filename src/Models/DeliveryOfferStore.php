<?php

namespace Saham\SharedLibs\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\UTCDateTime;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;
use MongoDB\Laravel\Relations\BelongsTo;
/**
 * @property mixed $id 127 occurrences
 * @property string|null $active 127 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 127 occurrences
 * @property string|null $date_range 127 occurrences
 * @property \Illuminate\Support\Carbon|null $deleted_at 12 occurrences
 * @property string|null $delivery_offer_id 127 occurrences
 * @property string|null $promo_date_range 16 occurrences
 * @property string|null $store_id 127 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 127 occurrences
 * @property-read \Saham\SharedLibs\Models\DeliveryOffer|null $deliveryOffer
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore newQuery()
 * @method static Builder<static>|DeliveryOfferStore onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereActive($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereDateRange($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereDeliveryOfferId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore wherePromoDateRange($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOfferStore whereUpdatedAt($value)
 * @method static Builder<static>|DeliveryOfferStore withTrashed()
 * @method static Builder<static>|DeliveryOfferStore withoutTrashed()
 * @mixin \Eloquent
 */
class DeliveryOfferStore Extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    protected $guarded = [];
    protected $table = 'delivery_offers_stores';

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function deliveryOffer(): BelongsTo
    {
        return $this->belongsTo(DeliveryOffer::class, 'delivery_offer_id');
    }

}
