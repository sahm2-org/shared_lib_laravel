<?php

namespace Saham\SharedLibs\Models;

use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\UTCDateTime;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use MongoDB\Laravel\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;
use MongoDB\Laravel\Relations\HasMany;

/**
 * @property-read mixed $id
 * @property-read \Saham\SharedLibs\Models\Reward|null $reward
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward newQuery()
 * @method static Builder<static>|UserReward onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward raw($value = null)
 * @method static Builder<static>|UserReward withTrashed()
 * @method static Builder<static>|UserReward withoutTrashed()
 * @mixin \Eloquent
 */
class UserReward  Extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'user_rewards';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }


}
