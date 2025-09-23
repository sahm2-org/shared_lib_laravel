<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property mixed                                                                                       $id                           7 occurrences
 * @property string|null                                                                                 $allowed_payment_methods      7 occurrences
 * @property int|null                                                                                    $coupon_work_on_offer         7 occurrences
 * @property \Illuminate\Support\Carbon|null                                                             $created_at                   7 occurrences
 * @property \Illuminate\Support\Carbon|null                                                             $deleted_at                   3 occurrences
 * @property string|null                                                                                 $delivery_value               7 occurrences
 * @property int|null                                                                                    $discount_from_app            6 occurrences
 * @property string|null                                                                                 $discount_from_driver         6 occurrences
 * @property string|null                                                                                 $discount_from_store          6 occurrences
 * @property string|null                                                                                 $discounts                    2 occurrences
 * @property string|null                                                                                 $display_order                7 occurrences
 * @property string|null                                                                                 $image                        7 occurrences
 * @property string|null                                                                                 $minimum_order_amount         6 occurrences
 * @property string|null                                                                                 $name_ar                      7 occurrences
 * @property string|null                                                                                 $name_en                      7 occurrences
 * @property int|null                                                                                    $show                         7 occurrences
 * @property string|null                                                                                 $type_of_discount_to_offer    7 occurrences
 * @property \Illuminate\Support\Carbon|null                                                             $updated_at                   7 occurrences
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DeliveryOfferDriver> $deliveryOffersDriver
 * @property int|null                                                                                    $delivery_offers_driver_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DeliveryOfferStore>  $deliveryOffersStore
 * @property int|null                                                                                    $delivery_offers_store_count
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOffer onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereAllowedPaymentMethods($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereCouponWorkOnOffer($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDeliveryValue($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDiscountFromApp($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDiscountFromDriver($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDiscountFromStore($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDiscounts($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereDisplayOrder($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereImage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereMinimumOrderAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereShow($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereTypeOfDiscountToOffer($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DeliveryOffer     whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOffer withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeliveryOffer withoutTrashed()
 *
 * @mixin \Eloquent
 */
class DeliveryOffer extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    use Translatable;
    protected $guarded      = [];
    protected $table        = 'delivery_offers';
    protected $translatable = ['name'] ;

    public function deliveryOffersStore(): HasMany
    {
        return $this->hasMany(DeliveryOfferStore::class);
    }

    public function deliveryOffersDriver(): HasMany
    {
        return $this->hasMany(DeliveryOfferDriver::class);
    }

    public function setImageAttribute($value): void
    {
        $this->attributes['image'] = storeImage($value, 'delivery_offers', 'offers');
    }
}
