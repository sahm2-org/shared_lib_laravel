<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property-read \Saham\SharedLibs\Models\Driver|null $driver
 * @property-read mixed $id
 * @property-read \Saham\SharedLibs\Models\Reward|null $reward
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverReward onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|DriverReward raw($value = null)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverReward withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverReward withoutTrashed()
 * @mixin \Eloquent
 */
class DriverReward extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    protected $guarded = [];
    protected $table = 'deliver_rewards';

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }


}
