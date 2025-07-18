<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed $id 34 occurrences
 * @property string|null $bank_account 1 occurrences
 * @property string|null $bank_account_holder_name 1 occurrences
 * @property string|null $bank_id 34 occurrences
 * @property string|null $commission_value 1 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 34 occurrences
 * @property string|null $email 1 occurrences
 * @property string|null $iban 34 occurrences
 * @property string|null $images 1 occurrences
 * @property string|null $mobile 1 occurrences
 * @property bool|null $percentage_net_value 1 occurrences
 * @property string|null $related_id 34 occurrences
 * @property string|null $related_type 34 occurrences
 * @property bool|null $set_default 34 occurrences
 * @property string|null $supplier_name 1 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 34 occurrences
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read \Saham\SharedLibs\Models\Partner|null $partner
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods newQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereBankAccount($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereBankAccountHolderName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereBankId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereCommissionValue($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereEmail($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereIban($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereImages($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereMobile($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods wherePercentageNetValue($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereRelatedId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereRelatedType($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereSetDefault($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereSupplierName($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CashoutMethods whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CashoutMethods extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'email',
        'mobile',
        'commission_value',
        'percentage_net_value',
        'bank_id',
        'bank_account_holder_name',
        'bank_account',
        'iban',
        'images',
        'set_default',
        'related_id',
        'related_type',
        'imgs',

    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
