<?php

namespace Saham\SharedLibs\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\UTCDateTime;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed                           $id                             79 occurrences
 * @property float|null                      $amount                         79 occurrences
 * @property string|null                     $code                           79 occurrences
 * @property string|null                     $coupon_allowed_payment_methods 51 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at                     79 occurrences
 * @property \Illuminate\Support\Carbon|null $deleted_at                     19 occurrences
 * @property string|null                     $discount_from_app              31 occurrences
 * @property string|null                     $discount_from_store            31 occurrences
 * @property string|null                     $display_public                 57 occurrences
 * @property string|null                     $global_limit                   79 occurrences
 * @property int|null                        $global_use                     67 occurrences
 * @property string|null                     $latitude                       79 occurrences
 * @property string|null                     $limit_per_user                 79 occurrences
 * @property string|null                     $longitude                      79 occurrences
 * @property float|null                      $minimum_amount                 79 occurrences
 * @property string|null                     $name                           79 occurrences
 * @property bool|null                       $package_order                  36 occurrences
 * @property string|null                     $partner_ids                    79 occurrences
 * @property string|null                     $promo_date_range               79 occurrences
 * @property float|null                      $radius                         79 occurrences
 * @property string|null                     $send_code                      6 occurrences
 * @property string|null                     $show_first                     43 occurrences
 * @property string|null                     $type_discount                  79 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at                     79 occurrences
 * @property string|null                     $used_by                        58 occurrences
 * @property string|null                     $user_type                      31 occurrences
 * @property string|null                     $users_date_range               73 occurrences
 * @property string|null                     $users_id                       79 occurrences
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\CouponFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   newQuery()
 * @method static Builder<static>|Coupon                             onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereCouponAllowedPaymentMethods($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereDiscountFromApp($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereDiscountFromStore($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereDisplayPublic($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereGlobalLimit($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereGlobalUse($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereLimitPerUser($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereMinimumAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   wherePackageOrder($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   wherePartnerIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   wherePromoDateRange($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereRadius($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereSendCode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereShowFirst($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereTypeDiscount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereUsedBy($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereUserType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereUsersDateRange($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Coupon   whereUsersId($value)
 * @method static Builder<static>|Coupon                             withTrashed()
 * @method static Builder<static>|Coupon                             withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Coupon extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'amount'         => 'double',
        'value'          => 'double',
        'minimum_amount' => 'double',
        'radius'         => 'double',
        'deleted_at'     => 'datetime',
        'valid_from'     => 'datetime',
        'valid_to'       => 'datetime',
        'is_loyalty_coupon' => 'boolean',
        'is_general_loyalty_coupon' => 'boolean',
        'points_redeemed' => 'integer',
    ];

    protected $fillable = [
        'name',
        'partner_ids',
        'user_type',
        'discount_from_store',
        'discount_from_app',
        'show_first',
        'package_order',
        'coupon_allowed_payment_methods',
        'type_discount',
        'amount',
        'code',
        'minimum_amount',
        'users_id',
        'users_date_range',
        'promo_date_range',
        'limit_per_user',
        'global_limit',
        'radius',
        'latitude',
        'longitude',
        'send_code',
        'display_public',
        // Loyalty system fields
        'is_loyalty_coupon',
        'is_general_loyalty_coupon',
        'points_redeemed',
        'valid_from',
        'valid_to',
        'status',
        'store_id',
        'partner_id',
    ];
    protected $dates = ['deleted_at'];

    protected static function booted(): void
    {
        static::addGlobalScope('delete', static function (Builder $builder): void {
            $builder->where('deleted_at', null);
        });
    }

    public static function findByCode($code): ?self
    {
        return self::where('code', $code)->first();
    }

    public function isValid(): bool
    {
        return $this->global_limit === null || $this->global_limit === -1 || $this->global_limit > $this->global_use;
    }

    public function isInDateRange(): bool
    {
        $now = new DateTime();

        // Check new format first (valid_from / valid_to) - used by loyalty system
        if ($this->valid_from || $this->valid_to) {
            try {
                // Check start date (valid_from)
                if ($this->valid_from) {
                    $validFrom = $this->valid_from instanceof \Carbon\Carbon
                        ? $this->valid_from->toDateTime()
                        : (is_string($this->valid_from) ? new DateTime($this->valid_from) : $this->valid_from);

                    if ($validFrom > $now) {
                        return false; // Not started yet
                    }
                }

                // Check end date (valid_to)
                if ($this->valid_to) {
                    $validTo = $this->valid_to instanceof \Carbon\Carbon
                        ? $this->valid_to->toDateTime()
                        : (is_string($this->valid_to) ? new DateTime($this->valid_to) : $this->valid_to);

                    if ($validTo < $now) {
                        return false; // Expired
                    }
                }

                return true;
            } catch (\Exception $e) {
                // If parsing fails, log and fall through to old format check
                \Illuminate\Support\Facades\Log::warning('[Coupon] Failed to parse valid_from/valid_to', [
                    'coupon_code' => $this->code ?? 'unknown',
                    'error' => $e->getMessage()
                ]);
            }
        }

        // Check old format (promo_date_range) - for backward compatibility
        if ($this->promo_date_range) {
            // Handle BSON UTCDateTime (MongoDB format)
            if (isset($this->promo_date_range['end']) && $this->promo_date_range['end'] instanceof UTCDateTime) {
                if ($this->promo_date_range['end']->toDateTime() < $now) {
                    return false;
                }
            }

            if (
                isset($this->promo_date_range['start'])
                && $this->promo_date_range['start'] instanceof UTCDateTime
            ) {
                if ($this->promo_date_range['start']->toDateTime() > $now) {
                    return false;
                }
            }
        }

        return true;
    }

    public function isInArea(float $latitude, float $longitude): bool
    {
        $distance = directDistance($latitude, $longitude, $this->latitude, $this->longitude);

        return $distance <= $this->radius;
    }

    public function isForUser(string $userId): bool
    {
        $forUser = true;

        if ($this->users_id && is_array($this->users_id)) {
            $forUser = in_array($userId, $this->users_id, true) || in_array('all', $this->users_id, true);
        }

        $haveLimit = true;

        if ($this->limit_per_user !== null && intval($this->limit_per_user) > 0) {
            $userUse   =  array_count_values($this->used_by ?? [])[$userId] ?? 0;
            $haveLimit = $userUse < intval($this->limit_per_user);
        }

        return $haveLimit && $forUser;
    }

    public function isForPartner(string $partner_id): bool
    {
        if ($this->partner_ids && is_array($this->partner_ids)) {
            return in_array('all', $this->partner_ids, true) || in_array($partner_id, $this->partner_ids, true);
        }

        return true;
    }

    public function isForStore(string $store_id): bool
    {
        $store = Store::find($store_id);

        if (empty($store)) {
            return false;
        }

        if ($this->partner_ids && is_array($this->partner_ids)) {
            return in_array('all', $this->partner_ids, true) || in_array($store->partner_id, $this->partner_ids, true);
        }

        return false;
    }

    public function isForTotal(float $total): bool
    {
        return $total >= $this->minimum_amount;
    }

    public function markAsUsedForUser($userId): ?self
    {
        $this->push('used_by', $userId);
        $this->increment('global_use');
        $this->save();

        return $this;
    }

    public function calculateDiscount(float $sub_total, ?float $delivery_fee = null): float
    {
        return $this->type_discount === 'percentage' && $this->amount <= 100 ?
            $this->amount * $sub_total / 100 : ($this->type_discount === 'percentage_delivery' ? $this->amount * $delivery_fee / 100 : $this->amount);
    }
}
