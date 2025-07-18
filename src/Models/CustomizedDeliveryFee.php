<?php

namespace Saham\SharedLibs\Models;

use Saham\SharedLibs\Traits\HasNotes;
use Saham\SharedLibs\Traits\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property mixed $id 55 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 55 occurrences
 * @property \Illuminate\Support\Carbon|null $deleted_at 7 occurrences
 * @property string|null $delivery_cost_per_kilo 55 occurrences
 * @property string|null $meter_opening_value 55 occurrences
 * @property string|null $min_delivery_distance 55 occurrences
 * @property string|null $name_ar 55 occurrences
 * @property string|null $name_en 55 occurrences
 * @property string|null $partner_ids 55 occurrences
 * @property bool|null $status 55 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 55 occurrences
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomizedDeliveryFee onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereDeletedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereDeliveryCostPerKilo($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereMeterOpeningValue($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereMinDeliveryDistance($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereNameAr($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereNameEn($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee wherePartnerIds($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereStatus($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|CustomizedDeliveryFee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomizedDeliveryFee withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CustomizedDeliveryFee withoutTrashed()
 * @mixin \Eloquent
 */
class CustomizedDeliveryFee extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    use Translatable;
    use HasNotes;

    protected $guarded      = [];
    protected $table        = 'customized_delivery_fees';
    protected $translatable = ['name'] ;
    protected $dates        = ['deleted_at'];
    protected $casts = [
          'deleted_at' => 'datetime',
      ];



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
}
