<?php

namespace Saham\SharedLibs\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\UTCDateTime;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\HasMany;
use Saham\SharedLibs\Traits\Translatable;

/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\DriverReward> $driverReward
 * @property-read int|null $driver_reward_count
 * @property-read mixed $id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Saham\SharedLibs\Models\UserReward> $userReward
 * @property-read int|null $user_reward_count
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward newQuery()
 * @method static Builder<static>|Reward onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Reward raw($value = null)
 * @method static Builder<static>|Reward withTrashed()
 * @method static Builder<static>|Reward withoutTrashed()
 * @mixin \Eloquent
 */
class Reward extends BaseModel
{
    use HasFactory;
    use SoftDeletes ;
    use Translatable;
    protected $guarded = [];
    protected $table = 'rewards';
    protected $translatable = ['name'] ;


    public function userReward(): HasMany
    {
        return $this->hasMany(UserReward::class);
    }
    public function driverReward(): HasMany
    {
        return $this->hasMany(DriverReward::class);
    }


}
