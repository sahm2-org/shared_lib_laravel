<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;

/**
 * @property mixed $id 1000 occurrences
 * @property string|null $amount 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property string|null $order_id 1000 occurrences
 * @property string|null $partner_id 1000 occurrences
 * @property string|null $payment_id 1000 occurrences
 * @property string|null $payout_id 863 occurrences
 * @property string|null $reason 999 occurrences
 * @property string|null $ref_id 1000 occurrences
 * @property string|null $reward_id 661 occurrences
 * @property string|null $store_id 1000 occurrences
 * @property string|null $tag_id 994 occurrences
 * @property string|null $type 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereAmount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereOrderId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction wherePartnerId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction wherePaymentId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction wherePayoutId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereReason($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereRefId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereRewardId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereStoreId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereTagId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|PartnerTransaction whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PartnerTransaction extends BaseModel
{
    use HasFactory;

    protected $casts = [
        'ref' => 'string',
    ];
}
