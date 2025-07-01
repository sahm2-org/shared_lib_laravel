<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Models\Enums\OrderStatus;
use MongoDB\Laravel\Eloquent\Builder;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\StateMachines\OrderStatusMachine;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasStateMachines;

/**
 * Main Order model
 *
 * @property mixed $id 1000 occurrences
 * @property bool|null $app_accepts_cash 731 occurrences
 * @property bool|null $app_accepts_online 731 occurrences
 * @property bool|null $app_accepts_wallet 731 occurrences
 * @property bool|null $cash_paid 999 occurrences
 * @property string|null $coupon 951 occurrences
 * @property string|null $coupon_type_discount 314 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $deliver_type 1000 occurrences
 * @property float|null $delivery_fee 1000 occurrences
 * @property string|null $delivery_fee_after_discount 28 occurrences
 * @property float|null $delivery_fee_before_discount 9 occurrences
 * @property string|null $delivery_offer_id 9 occurrences
 * @property string|null $discount 316 occurrences
 * @property string|null $discount_type 316 occurrences
 * @property \Saham\SharedLibs\Models\Driver|null $driver 770 occurrences
 * @property string|null $driver_id 987 occurrences
 * @property string|null $gateway 760 occurrences
 * @property string|null $invoiceId 770 occurrences
 * @property string|null $invoiceURL 770 occurrences
 * @property string|null $invoice_image 48 occurrences
 * @property bool|null $is_referral 1 occurrences
 * @property string|null $items 66 occurrences
 * @property float|null $latitude 934 occurrences
 * @property float|null $latitude_from 66 occurrences
 * @property float|null $latitude_to 66 occurrences
 * @property float|null $longitude 934 occurrences
 * @property float|null $longitude_from 66 occurrences
 * @property float|null $longitude_to 66 occurrences
 * @property string|null $manager 770 occurrences
 * @property string|null $notes 986 occurrences
 * @property string|null $notes_history 14 occurrences
 * @property string|null $offer 731 occurrences
 * @property string|null $order_type 763 occurrences
 * @property \Saham\SharedLibs\Models\Partner|null $partner 770 occurrences
 * @property string|null $partner_id 934 occurrences
 * @property string|null $payment_gateway 789 occurrences
 * @property string|null $payment_id 43 occurrences
 * @property string|null $payment_type 1000 occurrences
 * @property string|null $ref_id 1000 occurrences
 * @property string|null $status 1000 occurrences
 * @property string|null $status_history 52 occurrences
 * @property bool|null $store_allowed_payment_cash 930 occurrences
 * @property bool|null $store_allowed_payment_online 930 occurrences
 * @property bool|null $store_allowed_payment_wallet 930 occurrences
 * @property string|null $store_id 934 occurrences
 * @property string|null $sub_total 1000 occurrences
 * @property float|null $system_driver_portion 989 occurrences
 * @property float|null $system_partner_portion 999 occurrences
 * @property float|null $tips 60 occurrences
 * @property float|null $total 1000 occurrences
 * @property string|null $type 960 occurrences
 * @property string|null $unit_id 720 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property \Saham\SharedLibs\Models\User|null $user 770 occurrences
 * @property bool|null $user_allowed_payment_cash 930 occurrences
 * @property bool|null $user_allowed_payment_online 930 occurrences
 * @property bool|null $user_allowed_payment_wallet 930 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property float|null $vat 934 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint> $complains
 * @property-read int|null $complains_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint> $complaints
 * @property-read int|null $complaints_count
 * @property-read \Saham\SharedLibs\Models\Coupon|null $couponDetails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\OrderDetail> $details
 * @property-read int|null $details_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Rating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Saham\SharedLibs\Models\Slot|null $slot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\StateHistory> $stateHistory
 * @property-read int|null $state_history_count
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\UserTransaction|null $transaction
 * @property-read \Saham\SharedLibs\Models\Unit|null $unit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\UserTransaction> $userOrderTransaction
 * @property-read int|null $user_order_transaction_count
 * @method static Builder<static>|Order addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static Builder<static>|Order aggregate($function = null, $columns = [])
 * @method static Builder<static>|Order currentStatus($status)
 * @method static \Saham\SharedLibs\Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static Builder<static>|Order getConnection()
 * @method static Builder<static>|Order insert(array $values)
 * @method static Builder<static>|Order insertGetId(array $values, $sequence = null)
 * @method static Builder<static>|Order newModelQuery()
 * @method static Builder<static>|Order newQuery()
 * @method static Builder<static>|Order query()
 * @method static Builder<static>|Order raw($value = null)
 * @method static Builder<static>|Order whereAppAcceptsCash($value)
 * @method static Builder<static>|Order whereAppAcceptsOnline($value)
 * @method static Builder<static>|Order whereAppAcceptsWallet($value)
 * @method static Builder<static>|Order whereCashPaid($value)
 * @method static Builder<static>|Order whereCoupon($value)
 * @method static Builder<static>|Order whereCouponTypeDiscount($value)
 * @method static Builder<static>|Order whereCreatedAt($value)
 * @method static Builder<static>|Order whereDeliverType($value)
 * @method static Builder<static>|Order whereDeliveryFee($value)
 * @method static Builder<static>|Order whereDeliveryFeeAfterDiscount($value)
 * @method static Builder<static>|Order whereDeliveryFeeBeforeDiscount($value)
 * @method static Builder<static>|Order whereDeliveryOfferId($value)
 * @method static Builder<static>|Order whereDiscount($value)
 * @method static Builder<static>|Order whereDiscountType($value)
 * @method static Builder<static>|Order whereDriver($value)
 * @method static Builder<static>|Order whereDriverId($value)
 * @method static Builder<static>|Order whereGateway($value)
 * @method static Builder<static>|Order whereId($value)
 * @method static Builder<static>|Order whereInvoiceId($value)
 * @method static Builder<static>|Order whereInvoiceImage($value)
 * @method static Builder<static>|Order whereInvoiceURL($value)
 * @method static Builder<static>|Order whereIsReferral($value)
 * @method static Builder<static>|Order whereItems($value)
 * @method static Builder<static>|Order whereLatitude($value)
 * @method static Builder<static>|Order whereLatitudeFrom($value)
 * @method static Builder<static>|Order whereLatitudeTo($value)
 * @method static Builder<static>|Order whereLongitude($value)
 * @method static Builder<static>|Order whereLongitudeFrom($value)
 * @method static Builder<static>|Order whereLongitudeTo($value)
 * @method static Builder<static>|Order whereManager($value)
 * @method static Builder<static>|Order whereNotes($value)
 * @method static Builder<static>|Order whereNotesHistory($value)
 * @method static Builder<static>|Order whereOffer($value)
 * @method static Builder<static>|Order whereOrderType($value)
 * @method static Builder<static>|Order wherePartner($value)
 * @method static Builder<static>|Order wherePartnerId($value)
 * @method static Builder<static>|Order wherePaymentGateway($value)
 * @method static Builder<static>|Order wherePaymentId($value)
 * @method static Builder<static>|Order wherePaymentType($value)
 * @method static Builder<static>|Order whereRefId($value)
 * @method static Builder<static>|Order whereStatus($value)
 * @method static Builder<static>|Order whereStatusHistory($value)
 * @method static Builder<static>|Order whereStoreAllowedPaymentCash($value)
 * @method static Builder<static>|Order whereStoreAllowedPaymentOnline($value)
 * @method static Builder<static>|Order whereStoreAllowedPaymentWallet($value)
 * @method static Builder<static>|Order whereStoreId($value)
 * @method static Builder<static>|Order whereSubTotal($value)
 * @method static Builder<static>|Order whereSystemDriverPortion($value)
 * @method static Builder<static>|Order whereSystemPartnerPortion($value)
 * @method static Builder<static>|Order whereTips($value)
 * @method static Builder<static>|Order whereTotal($value)
 * @method static Builder<static>|Order whereType($value)
 * @method static Builder<static>|Order whereUnitId($value)
 * @method static Builder<static>|Order whereUpdatedAt($value)
 * @method static Builder<static>|Order whereUser($value)
 * @method static Builder<static>|Order whereUserAllowedPaymentCash($value)
 * @method static Builder<static>|Order whereUserAllowedPaymentOnline($value)
 * @method static Builder<static>|Order whereUserAllowedPaymentWallet($value)
 * @method static Builder<static>|Order whereUserId($value)
 * @method static Builder<static>|Order whereVat($value)
 * @property bool|null $is_fake 1 occurrences
 * @method static Builder<static>|Order whereIsFake($value)
 * @mixin \Eloquent
 */
class Order extends BaseModel
{
    use HasFactory;
    use HasNotes;
    use HasStateMachines;

    /**
     * `status` State Machines
     * @var array
     */
    public $stateMachines = [
        'status' => OrderStatusMachine::class
    ];

    protected $guarded = [];
    protected $attributes = [
        'cash_paid' => false,
    ];

    protected $casts = [
        'ref_id' => 'string',
    ];

    public function scopeCurrentStatus($query, $status): Builder
    {
        if ($status === 'pending_driver') {
            $query->whereStatus('pending')
                ->whereNull('driver_id');
        } elseif ($status === 'pending_store') {
            $query->whereStatus('pending')
                ->whereNotNull('driver_id');
        } else {
            $query->where('status', $status);
        }

        return $query;
    }

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

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'order_id');
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    /*  public function coupon(): HasOne
      {
          return $this->hasOne(Coupon::class, 'coupon', 'code');
      }*/

    public function slot(): BelongsTo
    {
        return $this->belongsTo(Slot::class);
    }

    public function couponDetails(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'coupon', 'code');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'order_id');
    }

    public function complains(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(UserTransaction::class, 'order_id');
    }

    public function userOrderTransaction(): HasMany
    {
        return $this->hasMany(UserTransaction::class, 'order_id');
    }
}
