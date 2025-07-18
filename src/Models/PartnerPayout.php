<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property float|null $amount 1000 occurrences
 * @property string|null $confirmation_otp 568 occurrences
 * @property float|null $confirmed_amount 568 occurrences
 * @property string|null $confirmed_at 561 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $gateway_payout_id 561 occurrences
 * @property string|null $invoice_id 40 occurrences
 * @property string|null $invoice_link 40 occurrences
 * @property string|null $partner_id 1000 occurrences
 * @property string|null $partner_payout_id 40 occurrences
 * @property string|null $status 1000 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereConfirmationOtp($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereConfirmedAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereConfirmedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereGatewayPayoutId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereInvoiceId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereInvoiceLink($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout wherePartnerPayoutId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerPayout whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PartnerPayout extends BaseModel
{
    use HasFactory;

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
