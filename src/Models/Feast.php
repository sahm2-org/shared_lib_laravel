<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\StateMachines\FeastStatusMachine;
use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\HasStateMachines;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Saham\SharedLibs\Models\Enums\FeastStatus;
use MongoDB\Laravel\Eloquent\Builder;

/**
 * @property mixed $id 54 occurrences
 * @property bool|null $cash_paid 54 occurrences
 * @property string|null $coupon 39 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 54 occurrences
 * @property string|null $delivery_date 54 occurrences
 * @property float|null $delivery_fee 54 occurrences
 * @property string|null $driver_id 54 occurrences
 * @property string|null $feast_address 38 occurrences
 * @property float|null $feast_latitude 38 occurrences
 * @property float|null $feast_longitude 38 occurrences
 * @property string|null $feast_type 54 occurrences
 * @property string|null $history 16 occurrences
 * @property float|null $latitude 54 occurrences
 * @property float|null $longitude 54 occurrences
 * @property string|null $notes 43 occurrences
 * @property string|null $order_type 3 occurrences
 * @property string|null $partner_id 54 occurrences
 * @property string|null $ref_id 54 occurrences
 * @property string|null $status 54 occurrences
 * @property string|null $status_history 29 occurrences
 * @property string|null $store_id 54 occurrences
 * @property string|null $sub_total 54 occurrences
 * @property string|null $total 54 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 54 occurrences
 * @property string|null $user_id 54 occurrences
 * @property float|null $vat 54 occurrences
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint> $complains
 * @property-read int|null $complains_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Complaint> $complaints
 * @property-read int|null $complaints_count
 * @property-read \Saham\SharedLibs\Models\Coupon|null $couponDetails
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\FeastDetails> $details
 * @property-read int|null $details_count
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\Rating> $ratings
 * @property-read int|null $ratings_count
 * @property-read \Saham\SharedLibs\Models\Slot|null $slot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\StateHistory> $stateHistory
 * @property-read int|null $state_history_count
 * @property-read \Saham\SharedLibs\Models\Store|null $store
 * @property-read \Saham\SharedLibs\Models\UserTransaction|null $transaction
 * @property-read \Saham\SharedLibs\Models\Unit|null $unit
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\UserTransaction> $userFeastTransaction
 * @property-read int|null $user_feast_transaction_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\UserTransaction> $userOrderTransaction
 * @property-read int|null $user_order_transaction_count
 * @method static Builder<static>|Feast addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static Builder<static>|Feast aggregate($function = null, $columns = [])
 * @method static Builder<static>|Feast currentStatus($status)
 * @method static \Saham\SharedLibs\Database\Factories\FeastFactory factory($count = null, $state = [])
 * @method static Builder<static>|Feast getConnection()
 * @method static Builder<static>|Feast insert(array $values)
 * @method static Builder<static>|Feast insertGetId(array $values, $sequence = null)
 * @method static Builder<static>|Feast newModelQuery()
 * @method static Builder<static>|Feast newQuery()
 * @method static Builder<static>|Feast query()
 * @method static Builder<static>|Feast raw($value = null)
 * @method static Builder<static>|Feast whereCashPaid($value)
 * @method static Builder<static>|Feast whereCoupon($value)
 * @method static Builder<static>|Feast whereCreatedAt($value)
 * @method static Builder<static>|Feast whereDeliveryDate($value)
 * @method static Builder<static>|Feast whereDeliveryFee($value)
 * @method static Builder<static>|Feast whereDriverId($value)
 * @method static Builder<static>|Feast whereFeastAddress($value)
 * @method static Builder<static>|Feast whereFeastLatitude($value)
 * @method static Builder<static>|Feast whereFeastLongitude($value)
 * @method static Builder<static>|Feast whereFeastType($value)
 * @method static Builder<static>|Feast whereHistory($value)
 * @method static Builder<static>|Feast whereId($value)
 * @method static Builder<static>|Feast whereLatitude($value)
 * @method static Builder<static>|Feast whereLongitude($value)
 * @method static Builder<static>|Feast whereNotes($value)
 * @method static Builder<static>|Feast whereOrderType($value)
 * @method static Builder<static>|Feast wherePartnerId($value)
 * @method static Builder<static>|Feast whereRefId($value)
 * @method static Builder<static>|Feast whereStatus($value)
 * @method static Builder<static>|Feast whereStatusHistory($value)
 * @method static Builder<static>|Feast whereStoreId($value)
 * @method static Builder<static>|Feast whereSubTotal($value)
 * @method static Builder<static>|Feast whereTotal($value)
 * @method static Builder<static>|Feast whereUpdatedAt($value)
 * @method static Builder<static>|Feast whereUserId($value)
 * @method static Builder<static>|Feast whereVat($value)
 * @mixin \Eloquent
 */
class Feast extends Order
{
    use HasFactory;
    use HasNotes;
    use HasStateMachines;

    /**
     * `status` State Machines
     * @var array
     */
    public $stateMachines = [
        'status' => FeastStatusMachine::class
    ];
    protected $guarded = [];
    protected $table = 'feasts';

    public function details(): HasMany
    {
        return $this->hasMany(FeastDetails::class);
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

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'feast_id');
    }

    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class, 'feast_id');
    }

    public function complains(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    public function userFeastTransaction(): HasMany
    {
        return $this->hasMany(UserTransaction::class, 'feast_id');
    }
}
