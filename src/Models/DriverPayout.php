<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property float|null $amount 1000 occurrences
 * @property string|null $confirmation_otp 554 occurrences
 * @property string|null $confirmed_amount 554 occurrences
 * @property string|null $confirmed_at 516 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $driver_id 1000 occurrences
 * @property string|null $gateway_payout_id 516 occurrences
 * @property string|null $invoice_id 10 occurrences
 * @property string|null $invoice_link 10 occurrences
 * @property string|null $partner_payout_id 10 occurrences
 * @property string|null $status 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereConfirmationOtp($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereConfirmedAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereConfirmedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereDriverId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereGatewayPayoutId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereInvoiceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereInvoiceLink($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout wherePartnerPayoutId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverPayout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DriverPayout extends BaseModel
{
    use HasFactory;

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
}
