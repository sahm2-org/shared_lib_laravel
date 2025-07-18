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
 * @property mixed $id 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $created_at 1000 occurrences
 * @property \Illuminate\Support\Carbon|null $updated_at 1000 occurrences
 * @property string|null $user_id 1000 occurrences
 * @property string|null $wallet 1000 occurrences
 * @property-read \Saham\SharedLibs\Models\User|null $user
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet addHybridHas(\Illuminate\Database\Eloquent\Relations\Relation $relation, string $operator = '>=', string $count = 1, string $boolean = 'and', ?\Closure $callback = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet aggregate($function = null, $columns = [])
 * @method static \Saham\SharedLibs\Database\Factories\WalletFactory factory($count = null, $state = [])
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet getConnection()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet insert(array $values)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet insertGetId(array $values, $sequence = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet newModelQuery()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet newQuery()
 * @method static Builder<static>|Wallet onlyTrashed()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet query()
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet raw($value = null)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet whereCreatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet whereId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet whereUpdatedAt($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet whereUserId($value)
 * @method static \MongoDB\Laravel\Eloquent\Builder<static>|Wallet whereWallet($value)
 * @method static Builder<static>|Wallet withTrashed()
 * @method static Builder<static>|Wallet withoutTrashed()
 * @mixin \Eloquent
 */
class Wallet  Extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $table = 'wallets';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

  


}
