<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $customComissionForShamFromPartnerInPercentage 1000 occurrences
 * @property string|null $invoiceDataFrom 1000 occurrences
 * @property string|null $invoiceDataTo 1000 occurrences
 * @property string|null $orderCompletedIds 1000 occurrences
 * @property string|null $partner_id 1000 occurrences
 * @property string|null $qrcode 900 occurrences
 * @property string|null $serialNumber 1000 occurrences
 * @property string|null $systemPartnerPortionForCompletedOrders 1000 occurrences
 * @property string|null $systemSubTotalCompletedOrders 1000 occurrences
 * @property int|null $totalNumberOfCompletedOrders 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property float|null $vatAmountForCustomComissionForShamFromPartner 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereCustomComissionForShamFromPartnerInPercentage($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereInvoiceDataFrom($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereInvoiceDataTo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereOrderCompletedIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereQrcode($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereSerialNumber($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereSystemPartnerPortionForCompletedOrders($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereSystemSubTotalCompletedOrders($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereTotalNumberOfCompletedOrders($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerVatInvoice whereVatAmountForCustomComissionForShamFromPartner($value)
 * @mixin \Eloquent
 */
class PartnerVatInvoice  extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'ref' => 'string',
    ];

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}
