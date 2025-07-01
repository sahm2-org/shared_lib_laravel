<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use Saham\SharedLibs\Traits\HasNotes;

/**
 * Summary of Order.
 *
 * @property mixed $id 1000 occurrences
 * @property bool|null $app_accepts_cash 694 occurrences
 * @property bool|null $app_accepts_online 694 occurrences
 * @property bool|null $app_accepts_wallet 694 occurrences
 * @property bool|null $cash_paid 1000 occurrences
 * @property string|null $coupon 879 occurrences
 * @property string|null $coupon_type_discount 284 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $deliver_type 912 occurrences
 * @property float|null $delivery_fee 912 occurrences
 * @property string|null $delivery_fee_after_discount 15 occurrences
 * @property float|null $delivery_fee_before_discount 4 occurrences
 * @property string|null $delivery_offer_id 4 occurrences
 * @property string|null $discount 284 occurrences
 * @property string|null $discount_type 284 occurrences
 * @property string|null $driver_id 34 occurrences
 * @property string|null $entity_type 88 occurrences
 * @property string|null $gateway 984 occurrences
 * @property string|null $invoiceId 999 occurrences
 * @property string|null $invoiceURL 999 occurrences
 * @property string|null $invoice_image 34 occurrences
 * @property bool|null $is_referral 1 occurrences
 * @property string|null $items 34 occurrences
 * @property float|null $latitude 878 occurrences
 * @property float|null $latitude_from 34 occurrences
 * @property float|null $latitude_to 34 occurrences
 * @property float|null $longitude 878 occurrences
 * @property float|null $longitude_from 34 occurrences
 * @property float|null $longitude_to 34 occurrences
 * @property string|null $notes 905 occurrences
 * @property string|null $offer 694 occurrences
 * @property string|null $order_type 671 occurrences
 * @property string|null $payment_gateway 644 occurrences
 * @property string|null $payment_type 912 occurrences
 * @property string|null $products 878 occurrences
 * @property string|null $ref_id 912 occurrences
 * @property string|null $status 1000 occurrences
 * @property bool|null $store_allowed_payment_cash 878 occurrences
 * @property bool|null $store_allowed_payment_online 878 occurrences
 * @property bool|null $store_allowed_payment_wallet 878 occurrences
 * @property string|null $store_id 878 occurrences
 * @property string|null $sub_total 912 occurrences
 * @property float|null $system_driver_portion 34 occurrences
 * @property float|null $system_partner_portion 34 occurrences
 * @property float|null $tips 34 occurrences
 * @property string|null $total 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property string|null $unit_id 684 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property bool|null $user_allowed_payment_cash 878 occurrences
 * @property bool|null $user_allowed_payment_online 878 occurrences
 * @property bool|null $user_allowed_payment_wallet 878 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property float|null $vat 878 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Manager|null $manager
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereAppAcceptsCash($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereAppAcceptsOnline($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereAppAcceptsWallet($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereCashPaid($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereCoupon($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereCouponTypeDiscount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDeliverType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDeliveryFee($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDeliveryFeeAfterDiscount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDeliveryFeeBeforeDiscount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDeliveryOfferId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDiscount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDiscountType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereEntityType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereGateway($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereInvoiceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereInvoiceImage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereInvoiceURL($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereIsReferral($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereItems($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLatitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLatitudeFrom($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLatitudeTo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLongitude($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLongitudeFrom($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereLongitudeTo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereNotes($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereOffer($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereOrderType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder wherePaymentGateway($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder wherePaymentType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereProducts($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereStoreAllowedPaymentCash($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereStoreAllowedPaymentOnline($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereStoreAllowedPaymentWallet($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereSubTotal($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereSystemDriverPortion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereSystemPartnerPortion($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereTips($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereTotal($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUnitId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUserAllowedPaymentCash($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUserAllowedPaymentOnline($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUserAllowedPaymentWallet($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereUserId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PendingOrder whereVat($value)
 * @mixin \Eloquent
 */
class PendingOrder extends BaseModel
{
    use HasFactory;
    use HasNotes;

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

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
