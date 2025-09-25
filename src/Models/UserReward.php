<?php

namespace Saham\SharedLibs\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Saham\SharedLibs\Models\Abstracts\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use MongoDB\Laravel\Relations\BelongsTo;

/**
 * @property mixed                                $id
 * @property \Saham\SharedLibs\Models\Reward|null $reward
 * @property \Saham\SharedLibs\Models\User|null   $user
 *
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward aggregate($function = null, $columns = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward newQuery()
 * @method static Builder<static>|UserReward                           onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|UserReward raw($value = null)
 * @method static Builder<static>|UserReward                           withTrashed()
 * @method static Builder<static>|UserReward                           withoutTrashed()
 *
 * @mixin \Eloquent
 */
class UserReward extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table   = 'user_rewards';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reward(): BelongsTo
    {
        return $this->belongsTo(Reward::class, 'reward_id');
    }
}
